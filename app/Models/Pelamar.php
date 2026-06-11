<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'pendidikan',
        'telepon',
        'alamat'
    ];
}