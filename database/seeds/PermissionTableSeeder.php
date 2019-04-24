<?php

use Illuminate\Database\Seeder;
use Visionarium\Role;
use Visionarium\Permission;

class PermissionTableSeeder extends Seeder
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

        /**
         * EXPERIENCES PERMISSIONS
         */

        // Create Categories Permission
        $createTasks = new Permission();
        $createTasks->slug = 'create-categories';
        $createTasks->name = 'Create Categories';
        $createTasks->save();
        $createTasks->roles()->attach($admin_role);

        // Delete Categories Permission
        $createTasks = new Permission();
        $createTasks->slug = 'delete-categories';
        $createTasks->name = 'Delete Categories';
        $createTasks->save();
        $createTasks->roles()->attach($admin_role);

        // Create Experiences Permission
        $createExperiences = new Permission();
        $createExperiences->slug = 'create-experiences';
        $createExperiences->name = 'Create Experiences';
        $createExperiences->save();
        $createExperiences->roles()->attach($editor_role); // editor can
        $createExperiences->roles()->attach($admin_role); // admin can

        // Edit Experiences Permission
        $createExperiences = new Permission();
        $createExperiences->slug = 'edit-experiences';
        $createExperiences->name = 'Edit Experiences';
        $createExperiences->save();
        $createExperiences->roles()->attach($editor_role); // editor can
        $createExperiences->roles()->attach($admin_role); // admin can

        // Delete Experiences Permission
        $createExperiences = new Permission();
        $createExperiences->slug = 'delete-experiences';
        $createExperiences->name = 'Delete Experiences';
        $createExperiences->save();
        $createExperiences->roles()->attach($editor_role); // editor can
        $createExperiences->roles()->attach($admin_role); // admin can

        // Read Experiences Info Permission
        $createExperiences = new Permission();
        $createExperiences->slug = 'read-experiences';
        $createExperiences->name = 'read Experiences';
        $createExperiences->save();
        $createExperiences->roles()->attach($monitor_role); // monitor can
        $createExperiences->roles()->attach($editor_role); // editor can
        $createExperiences->roles()->attach($admin_role); // admin can

        /**
         * GROUPS PERMISSIONS
         */

        // Create Groups Permission
        $createGroups = new Permission();
        $createGroups->slug = 'create-groups';
        $createGroups->name = 'Create Groups';
        $createGroups->save();
        $createGroups->roles()->attach($monitor_role); // monitor can
        $createGroups->roles()->attach($admin_role); // admin can

        // Edit Groups Permission
        $createGroups = new Permission();
        $createGroups->slug = 'edit-groups';
        $createGroups->name = 'Edit Groups';
        $createGroups->save();
        $createGroups->roles()->attach($monitor_role); // monitor can
        $createGroups->roles()->attach($admin_role); // admin can

        // Delete Groups Permission
        $createGroups = new Permission();
        $createGroups->slug = 'delete-groups';
        $createGroups->name = 'Delete Groups';
        $createGroups->save();
        $createGroups->roles()->attach($monitor_role); // monitor can
        $createGroups->roles()->attach($admin_role); // admin can
    }
}
