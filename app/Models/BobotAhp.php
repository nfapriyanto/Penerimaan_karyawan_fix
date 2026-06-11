<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotAhp extends Model
{
    protected $table = 'bobot_ahp';

    protected $fillable = [
        'kriteria',
        'nilai'
    ];
}