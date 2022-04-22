<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'Customer';

    protected $fillable = [
        'nama',
        'alamat',
        'gender',
        'pekerjaan',
        'tgl_lahir',
        'id_user',
    ];
}
