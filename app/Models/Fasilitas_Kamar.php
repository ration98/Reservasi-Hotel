<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_Kamar extends Model
{
    use HasFactory;

    protected $table = 'Fasilitas_Kamar';

    protected $fillable = [
        'barang'
    ];
}
