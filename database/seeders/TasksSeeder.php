<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'name' => 'Woke up at 5.30am',
            ],
            [
                'name' => 'Walking from 5.40am to 6.40am',
            ],
            [
                'name' => 'Breakfast at 7.20am',
            ],
            [
                'name' => 'Go to office'
            ],
            [
                'name' => 'Back to home'
            ],
            [
                'name' => 'Slef learning'
            ],
            [
                'name' => 'Dinner and Sleep'
            ],
            [
                'name' => 'Learn documentation'
            ],
            [
                'name' => 'Learn laravel pennant'
            ],
            [
                'name' => 'Learn laravel features'
            ],
            [
                'name' => 'Learn process interaction'
            ],
        ];

        $count  = 1;
        $orders = 1;
        for ($i = 0; $i < count($tasks); $i++) {
            if ($i <= 6) {
                $order = $count++;
            } else {
                $order = $orders++;
            }
            Task::create([
                'name' => $tasks[$i]['name'],
                'todo_id' => ($i <= 6) ? 2 : 3,
                'priority' => rand(1, 3),
                'status' => rand(1, 5),
                'order' => $order
            ]);
        }
    }
}
