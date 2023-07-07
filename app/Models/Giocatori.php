<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giocatori extends Model
{
    use HasFactory;
    protected $table = 'giocatori';
    protected $fillable = ['username', 'giocatore', 'foto'];
}
