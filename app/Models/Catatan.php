<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tanggal',
        'waktu',
        'lokasi',
        'suhu'
    ];
}
