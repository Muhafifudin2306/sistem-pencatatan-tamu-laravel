<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = "visitors";

    protected $fillable = [
        'visitor_name',
        'nik',
        'address',
        'nik',
        'phone',
        'tanggal_masuk',
        'tanggal_keluar'
    ];
}
