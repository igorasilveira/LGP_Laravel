<?php

use Illuminate\Database\Seeder;
use Visionarium\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //RoleTableSeeder.php
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Administrador de Sistema';
        $admin_role->save();

        $editor_role = new Role();
        $editor_role->slug = 'editor';
        $editor_role->name = 'Editor';
        $editor_role->save();

        $monitor_role = new Role();
        $monitor_role->slug = 'monitor';
        $monitor_role->name = 'Monitor';
        $monitor_role->save();
    }
}
