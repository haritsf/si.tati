<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    protected $fillable = [
        'nim', 'tema', 'judul', 'dosen', 'berkas', 'status', 'seminar', 'sidang',
    ];
}
