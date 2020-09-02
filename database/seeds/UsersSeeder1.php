<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $numbersOfUser = 20;

        $usersIds = array();
        $statusIds = array();

        $faker = Faker::create();

        /* create admin */
        $superAdminRole = Role::create(['name' => 'super-admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $client = Role::create(['name' => 'client', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 

        $CreateUserPerm = Permission::create(['name' => 'create-user', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $EditUserPerm = Permission::create(['name' => 'edit-user', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $DeleteUserPerm = Permission::create(['name' => 'delete-user', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 

        $CreateRolePerm = Permission::create(['name' => 'create-role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $EditRolePerm = Permission::create(['name' => 'edit-role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $DeleteRolePerm = Permission::create(['name' => 'delete-role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        
        $CreatePermissionPerm = Permission::create(['name' => 'create-role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $EditPermissionPerm = Permission::create(['name' => 'edit-role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $DeletePermissionPerm = Permission::create(['name' => 'delete-role', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 

        $ClientCreatePerm = Permission::create(['name' => 'create-client', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $ClientEditPerm = Permission::create(['name' => 'edit-client', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 
        $ClientDeletePerm = Permission::create(['name' => 'delete-client', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]); 

        $superAdminRole->givePermissionTo($CreateUserPerm);
        $superAdminRole->givePermissionTo($EditUserPerm);
        $superAdminRole->givePermissionTo($DeleteUserPerm);
        
        $superAdminRole->givePermissionTo($CreateRolePerm);
        $superAdminRole->givePermissionTo($EditRolePerm);
        $superAdminRole->givePermissionTo($DeleteRolePerm);
        
        $superAdminRole->givePermissionTo($CreatePermissionPerm);
        $superAdminRole->givePermissionTo($EditPermissionPerm);
        $superAdminRole->givePermissionTo($DeletePermissionPerm);
        
        $superAdminRole->givePermissionTo($CreatePermissionPerm);
        $superAdminRole->givePermissionTo($EditPermissionPerm);
        $superAdminRole->givePermissionTo($DeletePermissionPerm);

        $superAdminRole->givePermissionTo($ClientCreatePerm);
        $superAdminRole->givePermissionTo($ClientEditPerm);
        $superAdminRole->givePermissionTo($ClientDeletePerm);

        $adminRole->givePermissionTo($ClientCreatePerm);
        $adminRole->givePermissionTo($ClientEditPerm);
        $adminRole->givePermissionTo($ClientDeletePerm);
        
        // faker insert here

        $user = User::create([ 
            'firstname' => 'super',
            'lastname' => 'admin',
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' =>now(),
            'updated_at' =>now()            
        ]);

        $user->assignRole($superAdminRole);

    }
}
