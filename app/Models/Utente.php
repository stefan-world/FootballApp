<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected $fillable = ['Nome', 'Cognome', 'email', 'username', 'password'];
}