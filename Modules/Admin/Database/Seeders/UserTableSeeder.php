<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Entities\User;
use Modules\Admin\Entities\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Иванов Иван Иванович';
        $user->email = 'info@demo.local';
        $user->balance = 110;
        $user->password = bcrypt('123456');
        $user->image = 'uploads/avatar.png';
        $user->save();
        $user->role()->attach($role_user);

        $admin = new User();
        $admin->name = 'Админов Админ Админович';
        $admin->email = 'admin@demo.local';
        $admin->balance = 999999;
        $admin->password = bcrypt('123456');
        $admin->image = 'uploads/avatar.png';
        $admin->save();
        $admin->role()->attach($role_admin);
    }
}
