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
     * Admin Permission slugs
     */
    protected $permissionSlugs=[
        'users',
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
     * Jobseeker permissionSlugs
     *
     * @var array
     */
    protected $jobseekerPermissionSlugs=[
        'jobs',
        'skills'
    ];
    
    /**
     * Employer permissionSlugs
     *
     * @var array
     */
    protected $employerPermissionSlugs=[
        'jobs',
        'locations',
        'industries',
        'skills'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        // create roles and assign created permissions
        $admin = Role::create(['name' => 'admin']);
        foreach ($this->permissionSlugs as $slug){
            foreach($this->crudList as $index => $crud){
                $result = DB::table('permissions')->insert(['name'=>$crud.$slug,'guard_name'=>'web']);
                if (!$result) {
                    $this->command->info("Insert failed at record $index.");
                    return;
                }
                $admin->givePermissionTo($crud.$slug);
            }
        }
        $this->command->info('Inserted '.count($this->crudList)*count($this->permissionSlugs).' admin permission records.');

        $jobseeker = Role::create(['name' => 'jobseeker']);
        foreach ($this->jobseekerPermissionSlugs as $jSlug){
            foreach($this->crudList as $index => $crud){
                $jobseeker->givePermissionTo($crud.$jSlug);
            }
        }
        $this->command->info('Inserted '.count($this->crudList)*count($this->jobseekerPermissionSlugs).' jobseeker permission records.');

        $employer = Role::create(['name' => 'employer']);
        foreach ($this->employerPermissionSlugs as $eSlug){
            foreach($this->crudList as $index => $crud){                
                $employer->givePermissionTo($crud.$eSlug);
            }
        }
        $this->command->info('Inserted '.count($this->crudList)*count($this->employerPermissionSlugs).' employer permission records.');


    }
}
