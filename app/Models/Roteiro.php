<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roteiro extends Model
{
    protected $casts = [
        'pontos' => 'array',
    ];

    protected $fillable = ['pontos'];
}
