<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partite;

class PartiteController extends Controller
{
    public function showPartite()
    {
        return view('partite');
    }
    public function cercaPartite(Request $request)
    {
        $squadra1 = $request->input('squadra1');
        $squadra2 = $request->input('squadra2');

        $squadra1 = str_replace(' ', '_', $squadra1);
        $squadra2 = str_replace(' ', '_', $squadra2);

        $partita = $squadra1 . '_vs_' . $squadra2;

        $url = "https://www.thesportsdb.com/api/v1/json/3/searchevents.php?e=" . urlencode($partita);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function cercaLikePartita(Request $request)
    {

        $idPartita = $request->query('id');
        $username = $request->session()->get('username');

        $row = Partite::where('idPartita', $idPartita)
            ->where('username', $username)
            ->first();

        return response()->json(['exists' => !is_null($row)]);
    }
    public function aggiungiLikePartite(Request $request)
    {
        $partitaId = $request->query('id');
        $squadra1 = $request->query('squadra1');
        $squadra2 = $request->query('squadra2');
        $casa = $request->query('casa');
        $ospite = $request->query('ospite');
        $competizione = $request->query('competizione');
        $stadio = $request->query('stadio');
        $orario = $request->query('orario');
        $dataPartita = $request->query('dataPartita');
        $username = $request->session()->get('username');

        $affected = DB::table('partite')->insert([
            'username' => $username,
            'idPartita' => $partitaId,
            'squadra1' => $squadra1,
            'squadra2' => $squadra2,
            'casa' => $casa,
            'ospite' => $ospite,
            'competizione' => $competizione,
            'stadio' => $stadio,
            'orario' => $orario,
            'dataPartita' => $dataPartita,
        ]);

        if ($affected) {
            return 'Like aggiunto con successo al database.';
        } else {
            return 'Errore nell\'esecuzione della query.';
        }
    }
    public function rimuoviLikePartite(Request $request)
    {
        $partitaId = $request->query('id');
        $username = $request->session()->get('username');

        $affected = Partite::where('idPartita', $partitaId)
            ->where('username', $username)
            ->delete();

        if ($affected) {
            return 'Like rimosso con successo.';
        } else {
            return 'Errore nell\'esecuzione della query.';
        }
    }

}