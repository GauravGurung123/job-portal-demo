<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
/**
     * Crud list
     */
    protected $crudList=[
        'view-',
        'create-',
        'update-',
        'delete-',
    ];
    /**
     * Permission slugs
     */
    protected $permissionSlugs=[
        'admins',
        'jobseekers',
        'employers',
        'roles',
        'permissions',
        'jobs',
        'industries',
        'locations',
        'skills'
        
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        foreach ($this->permissionSlugs as $slug){
            foreach($this->crudList as $index => $crud){
                $result = DB::table('permissions')->insert(['name'=>$crud.$slug,'guard_name'=>'web']);
                if (!$result) {
                    $this->command->info("Insert failed at record $index.");
                    return;
                }
                $role->givePermissionTo($crud.$slug);
            }
        }
        $this->command->info('Inserted '.count($this->crudList)*count($this->permissionSlugs).' records.');

        // create roles and assign created permissions
        Role::create(['name' => 'jobseeker']);
        Role::create(['name' => 'employer']);
    }
}
