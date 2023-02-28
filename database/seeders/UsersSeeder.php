<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define base users
        $users = [
            [
                'name'     => 'Alex',
                'email'    => 'alex@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Jhon',
                'email'    => 'jhon@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Max',
                'email'    => 'max@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Leo farnandesh',
                'email'    => 'leo@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Kavin roof',
                'email'    => 'roof@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Leo Alexa',
                'email'    => 'alexa@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Linda',
                'email'    => 'linda@orangetoolz.com',
                'password' => Hash::make('password'),
            ], [
                'name'     => 'Mary',
                'email'    => 'mary@orangetoolz.com',
                'password' => Hash::make('password'),
            ]
        ];

        // Create base users
        for ($i = 0; $i < count($users); $i++) {
            User::create($users[$i]);
        }
    }
}
