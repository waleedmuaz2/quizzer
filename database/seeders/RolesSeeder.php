<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=Role::count();
        if ($roles==0){
            $data=[
                //tabs
                ['name' => 'super admin', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name' => 'admin', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
                ['name' => 'user', 'guard_name' => 'web', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ];

            Role::insert($data);
        }
    }
}
