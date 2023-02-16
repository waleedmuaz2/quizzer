<?php

namespace Database\Seeders;

use App\Models\ModelHasRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AssignSuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (ModelHasRole::count()==0){
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            //assign super admin role to user 6
            $roleSuperAdmin=Role::findById(1);
            $user = User::find(6);
            $user->assignRole($roleSuperAdmin);

            //assign admin role to specific users in DB
            $users=User::whereIn('id', [4, 5, 254, 263, 276])->get();
            $roleAdmin=Role::findById(2);
            foreach ($users as $user){
                $user->assignRole($roleAdmin);
            }

            //assign user role to rest of users in DB
            $users=User::whereNotIn('id', [4, 5, 6, 254, 263, 276])->get();
            $roleUser=Role::findById(3);
            foreach ($users as $user){
                $user->assignRole($roleUser);
            }
        }
    }
}
