<?php

use App\Entities\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin', 'guard_name'=>'web']);
        Role::create(['name' => 'gerente', 'guard_name'=>'web']);
        Role::create(['name' => 'cliente', 'guard_name'=>'web']);
    }
}
