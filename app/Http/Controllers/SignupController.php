<?php

namespace App\Http\Controllers;
use App\Models\Utente;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
    // Check if the user is already logged in
    if ($request->session()->has('username')) {
        return redirect('/dashboard');
    }

    // Validate the request data
    $validatedData = $request->validate([
        'nome' => 'required',
        'cognome' => 'required',
        'e-mail' => 'required|email|unique:utenti,email',
        'username' => 'required|regex:/^[\w\-]{7,16}$/|unique:utenti,username',
        'password' => 'required|min:10|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/',
        'conferma_password' => 'required|same:password',
    ], [
        'e-mail.unique' => 'Email già utilizzata',
        'username.regex' => 'Username non valido',
        'username.unique' => 'Username già utilizzato',
        'password.regex' => 'La password deve contenere almeno una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale. Lunghezza minima: 10 caratteri.',
        'conferma_password.same' => 'Le password non coincidono',
    ]);

    // Create a new user
    $user = new Utente();
    $user->nome = $validatedData['nome'];
    $user->cognome = $validatedData['cognome'];
    $user->email = strtolower($validatedData['e-mail']);
    $user->username = $validatedData['username'];
    $user->password = bcrypt($validatedData['password']);
    $user->save();

    // Set the session variable
    $request->session()->put('username', $validatedData['username']);

    // Redirect the user to the home page
    return redirect('/home');
    }

        // Authentication succeeded, create a session or token to keep the user authenticated

        // return redirect()->intended('/dashboard');
    
}
