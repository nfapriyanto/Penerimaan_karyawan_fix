<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'bobot'
    ];
}