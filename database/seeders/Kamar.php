<?php

namespace Database\Seeders;

use App\Models\Kamar as ModelsKamar;
use Illuminate\Database\Seeder;

class Kamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsKamar::truncate();
        $kmr = [
            [
                'id_tipe' => '1',
                'nomor' => '110',
                'status' => 'v',
            ],
            [
                'id_tipe' => '1',
                'nomor' => '111',
                'status' => 'v',
            ],
            [
                'id_tipe' => '1',
                'nomor' => '112',
                'status' => 'v',
            ],
            [
                'id_tipe' => '1',
                'nomor' => '113',
                'status' => 'v',
            ],
            [
                'id_tipe' => '1',
                'nomor' => '114',
                'status' => 'v',
            ],
            [
                'id_tipe' => '1',
                'nomor' => '115',
                'status' => 'v',
            ],
            [
                'id_tipe' => '2',
                'nomor' => '210',
                'status' => 'v',
            ],
            [
                'id_tipe' => '2',
                'nomor' => '211',
                'status' => 'v',
            ],
            [
                'id_tipe' => '2',
                'nomor' => '212',
                'status' => 'v',
            ],
            [
                'id_tipe' => '2',
                'nomor' => '213',
                'status' => 'v',
            ],
            [
                'id_tipe' => '2',
                'nomor' => '214',
                'status' => 'v',
            ],
            [
                'id_tipe' => '2',
                'nomor' => '215',
                'status' => 'v',
            ],
            [
                'id_tipe' => '3',
                'nomor' => '310',
                'status' => 'v',
            ],
            [
                'id_tipe' => '3',
                'nomor' => '311',
                'status' => 'v',
            ],
            [
                'id_tipe' => '3',
                'nomor' => '312',
                'status' => 'v',
            ],
            [
                'id_tipe' => '3',
                'nomor' => '313',
                'status' => 'v',
            ],
            [
                'id_tipe' => '3',
                'nomor' => '314',
                'status' => 'v',
            ],
            [
                'id_tipe' => '3',
                'nomor' => '315',
                'status' => 'v',
            ],
        ];

        foreach ($kmr as $key => $value){
            ModelsKamar::create($value);
        }
    }
}
