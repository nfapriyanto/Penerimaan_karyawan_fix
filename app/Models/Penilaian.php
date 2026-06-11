<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'pelamar_id',
        'skill',
        'pengalaman',
        'pendidikan',
        'interview',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}