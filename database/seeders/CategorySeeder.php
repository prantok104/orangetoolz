<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Web Design',
                'description' => 'Design like concept by typography and Interactive design'
            ],
            [
                'name' => 'Web Development',
                'description' => 'Design backend architechture and relational database'
            ],
            [
                'name' => 'Graphics',
                'description' => 'Typography and Illustrate'
            ],
            [
                'name' => 'Daily',
                'description' => 'Define for the daily task or workout'
            ],
            [
                'name' => 'Programming',
                'description' => 'To join the problem solving competition or self development'
            ],
            [
                'name' => 'Apps',
                'description' => 'Design or development Android or ISO platform'
            ],
        ];

        for ($i = 0; $i < count($categories); $i++) {
            if ($i == 3) {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::create([
                'name' => $categories[$i]['name'],
                'description' => $categories[$i]['description'],
                'status' => $status
            ]);
        }
    }
}
