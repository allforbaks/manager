<?php

namespace Modules\Profile\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Иванов Иван Иванович',
            'email' => 'info@demo.local',
            'password' => bcrypt('123456'),
            'confirmed_at' => '2018-10-05 06:11:53',
            'created_at' => '2018-10-05 06:12:08',
            'updated_at' => '2018-10-05 06:14:23',
            'remember_token' => str_random(10),
        ]);
    }
}
