<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $Admin = [
            [
                'name' => 'Admin',
                'alamat' => 'Puncak',
                'phone' => '123456789',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'level' => 'Admin',
            ],
            [
                'name' => 'Resepsionis',
                'alamat' => 'Garut',
                'phone' => '123456789',
                'email' => 'resepsionis@gmail.com',
                'password' => bcrypt('123456789'),
                'level' => 'Resepsionis',
            ],
        ];

        foreach ($Admin as $key => $value)
            User::create($value);
    }
}
