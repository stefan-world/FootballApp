<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadi extends Model
{
    protected $table = 'stadi';
    protected $fillable = ['username', 'stadio', 'foto'];
}
