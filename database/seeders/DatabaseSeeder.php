<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Desfine base users
        $users = [
            [
                'name'     => 'Alex',
                'email'    => 'alex@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Jhon',
                'email'    => 'jhon@orangetoolz.com',
                'password' => Hash::make('password'),
            ]
        ];

        // Create base users
        for ($i = 0; $i < count($users); $i++) {
            User::create($users[$i]);
        }
    }
}
