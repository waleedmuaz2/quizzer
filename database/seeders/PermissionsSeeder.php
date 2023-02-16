<?php

namespace Database\Seeders;

use App\Models\RoleHasPermission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Permission::count()==0){
            $data=[
                //tabs
                ['name' => 'dashboard', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name' => 'avatars', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name' => 'events', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name' => 'settings', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ];
            Permission::insert($data);

            //assign permissions to super admin
            $permissions=Permission::all();
            foreach ($permissions as $permission){
                RoleHasPermission::insert([
                    'permission_id'=> $permission->id,
                    'role_id'=> 1
                ]);
            }

            //same as above comment
            //$role=Role::findById(1);
            //$role->syncPermissions($permissions);
        }
    }
}
