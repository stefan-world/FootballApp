<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $table = 'utenti';
    protected $fillable = ['nome', 'cognome', 'email', 'username', 'password'];
}