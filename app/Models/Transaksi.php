<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'Transaksi';
    protected $fillable = [
        'id_user',
        'id_kamar',
        'check_in',
        'check_out',
        'jumlah_pesanan',
        'status'
    ];

    public function Kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id');
    }

    public function Pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_transaksi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
