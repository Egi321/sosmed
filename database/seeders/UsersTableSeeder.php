<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Contoh menggunakan Query Builder
        User::create([
            'name' => 'egi',
            'email' => 'egi@gmail.com',
            'password' => bcrypt('egi1234'),
        ]);

        // Atau contoh menggunakan model Eloquent
        User::create([
            'name' => 'ganis',
            'email' => 'ganis@gmail.com',
            'password' => bcrypt('ganis1234'),
        ]);
    }
}