<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class Logout extends Controller
{
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
