<?php

namespace Database\Seeders;

use App\Models\Tipe;
use Illuminate\Database\Seeder;

class TipeKamar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipe::truncate();
        $tipe = [
            [
                'nama' => 'Standard',
                'harga' => '300000',
                'fasilitas' => 'AC, TV',
                'foto' => 'Standard room.jpg',
                'informasi' => 'Kamar dengan tipe menengah kebawah',
            ],
            [
                'nama' => 'Deluxe',
                'harga' => '600000',
                'fasilitas' => 'AC, TV, SOFA',
                'foto' => 'Deluxe room.jpg',
                'informasi' => 'Kamar dengan tipe kelas menengah',
            ],
            [
                'nama' => 'Superior',
                'harga' => '900000',
                'fasilitas' => 'AC, TV, SOFA, KULKAS',
                'foto' => 'Superior room.jpg',
                'informasi' => 'Kamar dengan tipe kelas tinggi',
            ],
        ];

        foreach($tipe as $key => $value){
            Tipe::create($value);
        }
    }
}
