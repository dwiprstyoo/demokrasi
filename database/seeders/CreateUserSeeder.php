<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Admin',
                'email' => 'admin@dwiprasetyo.com',
                'is_admin' => '1',
                'is_petugas' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'nama' => 'User',
                'email' => 'user@dwiprasetyo.com',
                'is_admin' => '0',
                'is_petugas' => '0',
                'password' => bcrypt('12345678'),
            ],
            [
                'nama' => 'Petugas',
                'email' => 'petugas@dwiprasetyo.com',
                'is_admin' => '0',
                'is_petugas' => '1',
                'password' => bcrypt('12345678'),
            ],

        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
