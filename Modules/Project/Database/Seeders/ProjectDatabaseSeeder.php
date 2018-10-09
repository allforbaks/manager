<?php

namespace Modules\Project\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'user_id' => 1,
            'title' => 'Ишли мишки по лесу',
            'created_at' => '2018-10-05 06:12:08',
            'updated_at' => '2018-10-05 06:14:23',
        ]);

        DB::table('tasks')->insert([
            'project_id' => 1,
            'urgency' => 'Быстрее',
            'start_at' => '2018-10-05 06:12:08',
            'finish_at' => '2018-10-07 06:12:08',
            'title' => 'Помочь мишке найти грибы',
            'description' => 'Мишка не может найти грибы, помоги ему, иначе прийдет Маша!',
            'created_at' => '2018-10-05 06:12:08',
            'updated_at' => '2018-10-05 06:14:23',
        ]);

        DB::table('prices')->insert([
            'project' => 100,
            'task' => 10,
        ]);
    }
}
