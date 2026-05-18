<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'link',
        'status_progress',
        'laporan_pdf',
    ];
}