<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    protected $fillable = [
        'tanggal',
        'waktu',
        'lokasi',
        'suhu'
    ];
}
