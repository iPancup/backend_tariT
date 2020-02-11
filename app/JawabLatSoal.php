<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabLatSoal extends Model
{
    protected $fillable = [
        'user_answer',
    ];

    protected $table = 'lat_soal';
}