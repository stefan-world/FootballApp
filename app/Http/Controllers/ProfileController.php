<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $username ='asdfasdfsadfasdfasdfasdfasdfasdfasdf';
        return view('profile',compact('username'));
    }
    public function getStadi(Request $request)
    {
        $username = $request->session()->get('username');

        $stadiArray = DB::table('stadi')
            ->select('stadio', 'foto')
            ->where('username', $username)
            ->get()
            ->toArray();

        $jsonResponse = json_encode($stadiArray);

        return response($jsonResponse)->header('Content-Type', 'application/json');
    }
    public function getGiocatori(Request $request)
    {
        $username = $request->session()->get('username');

        $giocatoriArray = DB::table('giocatori')
            ->select('giocatore', 'foto')
            ->where('username', $username)
            ->get()
            ->toArray();

        $jsonResponse = json_encode($giocatoriArray);

        return response($jsonResponse)->header('Content-Type', 'application/json');
    }
    public function getPartite(Request $request)
    {
        $username = $request->session()->get('username');

        $partiteArray = DB::table('partite')
            ->select('idPartita', 'username', 'squadra1', 'squadra2', 'casa', 'ospite', 'competizione', 'stadio', 'orario', 'dataPartita')
            ->where('username', $username)
            ->get()
            ->toArray();

        $jsonResponse = json_encode($partiteArray);

        return response($jsonResponse)->header('Content-Type', 'application/json');
    }
}
