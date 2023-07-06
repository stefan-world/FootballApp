<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utente;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        if ($request->session()->has('username')) {
            return redirect('/home');
        }
    
        $username = $request->input('username');
        $password = $request->input('password');
    
        if (!empty($username) && !empty($password)) {
            $user = Utente::where('username', $username)->first();
    
            if ($user && password_verify($password, $user->password)) {
                $request->session()->put('username', $user->username);
                return redirect('/home');
            } else {
                return redirect()->back()->withErrors(['username' => 'Invalid username or password.']);
            }
        } else if (isset($username) || isset($password)) {
            return redirect()->back()->withErrors(['username' => 'Please enter your username and password.']);
        }
    }
}
