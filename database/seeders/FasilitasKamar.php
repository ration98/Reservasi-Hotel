<?php

namespace Database\Seeders;

use App\Models\Fasilitas_Kamar;
use Illuminate\Database\Seeder;

class FasilitasKamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fasilitas_Kamar::truncate();
        $fasilitaskmr = [
            [
                'barang' => 'AC',
            ],
            [
                'barang' => 'TV',
            ],
            [
                'barang' => 'SOFA',
            ],
            [
                'barang' => 'KULKAS',
            ],
        ];

        foreach($fasilitaskmr as $key => $value){
            Fasilitas_Kamar::create($value);
        }
    }
}
