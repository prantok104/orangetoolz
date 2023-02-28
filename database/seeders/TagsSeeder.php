<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Laravel', 'PHP', 'Javascript', 'React', 'Vue', 'jQuery', 'HTML', 'Wake up', 'Sleep', 'Route', 'Controller', 'Rest API', 'Navbar', 'Drawer', 'Python', 'Flex', 'Tailwind'];

        for ($i = 0; $i < count($tags); $i++) {
            if ($i == 3 || $i == 8) {
                $status = 0;
            } else {
                $status = 1;
            }
            Tag::create([
                'creator_id' => rand(1, 8),
                'name'       => $tags[$i],
                'status'     => $status
            ]);
        }
    }
}
