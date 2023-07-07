<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partite extends Model
{
    use HasFactory;
    protected $table = 'partite';
    protected $fillable = ['username', 'idpartita', 'squadra1', 'squadra2', 'casa', 'ospite', 'competizione', 'stadio', 'orario', 'datapartita'];
}
