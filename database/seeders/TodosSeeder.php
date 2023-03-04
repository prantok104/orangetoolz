<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $todos = [
            [
                'name' => 'Problem solving',
                'description' => 'Problem solving involves identifying, analyzing, and resolving issues that arisein various situations',
            ],
            [
                'name' => 'Daily work',
                'description' => 'Start by listing out all the task you need to accomplish for the day',
            ],
            [
                'name' => 'Learn Laravel 10',
                'description' => 'Self learning ablut laravel 10 new features',
            ],

        ];

        for ($i = 0; $i < count($todos); $i++) {
            $todo = Todo::create([
                'name' => $todos[$i]['name'],
                'creator_id' => 1,
                'category_id' => rand(1, 6),
                'description' => $todos[$i]['description'],
                'is_favourite' => ($i == 1 and $i == 3) ? 1 : 0
            ]);

            $todo->tags()->sync([rand(1, 16), rand(1, 16), rand(1, 16)]);
        }
    }
}
