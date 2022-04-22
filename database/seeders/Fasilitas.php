<?php

namespace Database\Seeders;

use App\Models\Fasilitas as ModelsFasilitas;
use Illuminate\Database\Seeder;

class Fasilitas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsFasilitas::truncate();
        $fasilitas = [
            [
                'namaFasilitas' => 'Kolam Renang',
                'info' => 'Kolam renang yang aman untuk Anak-anak maupun Orang Dewasa',
            ],
            [
                'namafasilitas' => 'Wi-Fi',
                'info' => 'Internet Gratis',
            ],
            [
                'namaFasilitas' => 'Layanan Front Office 24 Jam',
                'info' => 'Pelayanan merupakan salah satu cara terbaik kami untuk memanjakan para pengunjung Hotel Hebat ini',
            ],
        ];

        foreach ($fasilitas as $key => $value){
            ModelsFasilitas::create($value);
        }
    }
}
