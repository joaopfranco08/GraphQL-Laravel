<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letra extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'musica'
    ];
}
