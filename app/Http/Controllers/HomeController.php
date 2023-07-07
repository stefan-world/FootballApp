<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stadi;
use App\Models\Giocatori;

class HomeController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function cercaStadio(Request $request)
    {
        $API_KEY = "55068989789c93a8435d6e1c2fc66e9d";
        $opzione = $request->seleziona;

        if ($opzione === 'Serie A') {
            $url = "https://v3.football.api-sports.io/teams?league=135&season=2022";
        } elseif ($opzione === 'Premier League') {
            $url = "https://v3.football.api-sports.io/teams?league=39&season=2022";
        } elseif ($opzione === 'Bundesliga') {
            $url = "https://v3.football.api-sports.io/teams?league=78&season=2022";
        } elseif ($opzione === 'Ligue 1') {
            $url = "https://v3.football.api-sports.io/teams?league=61&season=2022";
        } elseif ($opzione === 'Liga BBVA') {
            $url = "https://v3.football.api-sports.io/teams?league=140&season=2022";
        }

        $headers = array(
            "x-rapidapi-host: v3.football.api-sports.io",
            "x-rapidapi-key: " . $API_KEY
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        curl_close($ch);
        return $response;
    }
    public function cercaLikeStadio(Request $request)
    {
        $username = $request->session()->get('username');

        if ($request->has('stadio')) {
            $stadio = $request->input('stadio');
            $exists = Stadi::where('stadio', $stadio)
                ->where('username', $username)
                ->exists();

            return response()->json(['exists' => $exists]);
        }

        return response()->json(['error' => 'Missing stadio parameter']);
    }

    public function cercaGiocatore(Request $request)
    {
        if ($request->has('nome') && $request->has('cognome')) {
            $nome = $request->input('nome');
            $cognome = $request->input('cognome');

            $url = "https://www.thesportsdb.com/api/v1/json/3/searchplayers.php?p=" . urlencode($nome . " " . $cognome);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }
    }
    public function cercaLike(Request $request)
    {
        $username = $request->session()->get('username');

        if ($request->has('giocatore')) {
            $giocatore = $request->input('giocatore');

            $exists = Giocatori::where('giocatore', $giocatore)
                ->where('username', $username)
                ->exists();

            return response()->json(['exists' => $exists]);
        }

        return response()->json(['error' => 'Missing giocatore parameter']);
    }

    public function aggiungiLikeStadio(Request $request)
    {
        $username = $request->session()->get('username');


        if ($request->has('stadio') && $request->has('foto')) {
            $stadioName = $request->input('stadio');
            $foto = $request->input('foto');

            // Esegui la query di inserimento
            $stadio = new Stadi;
            $stadio->foto = $foto;
            $stadio->stadio = $stadioName;
            $stadio->username = $username;
            $stadio->save();

            return response()->json(['message' => 'Dati inseriti con successo nel database.']);
        }
    }

    public function rimuoviLikeStadio(Request $request)
    {
        $username = $request->session()->get('username');

        if ($request->has('stadio')) {
            $stadio = $request->input('stadio');

            // Esegui la query di eliminazione
            Stadi::where('stadio', $stadio)
                ->where('username', $username)
                ->delete();

            return response()->json(['message' => 'Riga rimossa con successo dal database.']);
        }
    }

    public function aggiungiLike(Request $request)
    {
        $username = $request->session()->get('username');

        if ($request->has('giocatore') && $request->has('foto')) {
            $giocatore = $request->input('giocatore');
            $foto = $request->input('foto');

            // Esegui la query di inserimento
            $giocatore = new Giocatori;
            $giocatore->foto = $foto;
            $giocatore->giocatore = $giocatore;
            $giocatore->username = $username;
            $giocatore->save();

            return response()->json(['message' => 'Dati inseriti con successo nel database.']);
        }
    }

    public function rimuoviLike(Request $request)
    {
        $username = $request->session()->get('username');

        if ($request->has('giocatore')) {
            $giocatore = $request->input('giocatore');

            // Esegui la query di eliminazione
            Giocatori::where('giocatore', $giocatore)
                ->where('username', $username)
                ->delete();

            return response()->json(['message' => 'Riga rimossa con successo dal database.']);
        }
    }
}