<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yaqeen',
            'email' => 'yaqeen@gmail.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => '123456',
        ]);
        User::create([
            'name' => 'Abood',
            'email' => 'abood@gmail.com',
            'password' => '123456',
        ]);
    }
}
