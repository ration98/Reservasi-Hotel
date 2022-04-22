<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'Kamar';
    protected $fillable = [
        'id_tipe',
        'nomor',
        'status',
    ];

    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe', 'id');
    }
}
