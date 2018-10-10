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
            'title' => 'Задача 1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'status' => 1,
            'created_at' => '2018-10-05 06:12:08',
            'updated_at' => '2018-10-05 06:14:23',
        ]);

        DB::table('tasks')->insert([
            'project_id' => 1,
            'urgency' => 'Быстрее',
            'start_at' => '2018-10-05 06:12:08',
            'finish_at' => '2018-10-07 06:12:08',
            'title' => 'Задача 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'status' => 2,
            'created_at' => '2018-10-05 06:12:08',
            'updated_at' => '2018-10-05 06:14:23',
        ]);

        DB::table('tasks')->insert([
            'project_id' => 1,
            'urgency' => 'Быстрее',
            'start_at' => '2018-10-05 06:12:08',
            'finish_at' => '2018-10-07 06:12:08',
            'title' => 'Задача 3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            'status' => 3,
            'created_at' => '2018-10-05 06:12:08',
            'updated_at' => '2018-10-05 06:14:23',
        ]);

        DB::table('prices')->insert([
            'project' => 100,
            'task' => 10,
        ]);
    }
}
