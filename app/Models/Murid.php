<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = "murid";
    protected $primarykey = "id";
    protected $fillable = [
        'id','nama','jk','umur','suhu'
    ];
}
