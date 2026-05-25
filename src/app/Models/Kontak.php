<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_telpon',
        'github',
        'deskripsi',
        'tech_stack',
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}