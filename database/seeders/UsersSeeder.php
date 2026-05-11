<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' => 'Daniel',
            'lastName' => 'Rocha',
            'email' => 'teste@daniel.com',
            'password' => bcrypt('123456')
        ]);
    }
}
