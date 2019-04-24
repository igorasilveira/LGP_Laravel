<?php

use Illuminate\Database\Seeder;
use Visionarium\Role;
use Visionarium\Permission;
use Visionarium\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('slug', 'admin')->first();
        $editor_role = Role::where('slug', 'editor')->first();
        $monitor_role = Role::where('slug', 'monitor')->first();

        $admin = new User();
        $admin->name = 'Admin User';
        $admin->email = 'admin@visionarium.pt';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($admin_role);

        $editor = new User();
        $editor->name = 'Editor user';
        $editor->email = 'editor@visionarium.pt';
        $editor->password = bcrypt('secret');
        $editor->save();
        $editor->roles()->attach($editor_role);

        $monitor = new User();
        $monitor->name = 'Monitor user';
        $monitor->email = 'monitor@visionarium.pt';
        $monitor->password = bcrypt('secret');
        $monitor->save();
        $monitor->roles()->attach($monitor_role);
    }
}
