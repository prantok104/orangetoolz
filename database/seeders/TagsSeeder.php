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
            Tag::create([
                'creator_id' => 1,
                'name'       => $tags[$i],
                'status'     => ($i == 3 || $i == 8) ? 0 : 1
            ]);
        }
    }
}
