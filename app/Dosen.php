<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'nip', 'name', 'kode', 'address', 'contact',
    ];
}
