<?php
# @Author: maerielbenedicto
# @Date:   2019-10-22T00:43:56+01:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-10-22T00:48:26+01:00



use App\Role;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An administrator user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();
    }
}
