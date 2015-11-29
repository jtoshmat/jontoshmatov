<?php

use Illuminate\Database\Seeder;
use app\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {

        DB::table('roles')->delete();

        $super_admin = Role::create(array(
                'id' => 1,
                'title' => 'super_admin',
            ));

        $admin = Role::create(array(
                'id' => 2,
                'title' => 'admin',
            ));

        $member = Role::create(array(
                'id' => 3,
                'title' => 'member',
            ));
    }
}
