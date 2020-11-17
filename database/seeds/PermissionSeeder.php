<?php

use App\Entities\Permission;
use App\Entities\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gerentePermissions = ['gerenciar_contas', 'depositar', 'sacar', 'consultar_saldo'];
        $clientePermissions = ['depositar', 'sacar', 'consultar_saldo'];

        $roleGerente = Role::where('name', 'gerente')->first();
        $roleCliente = Role::where('name', 'cliente')->first();

        foreach ($gerentePermissions as $permission) {
            Permission::create(['name'=>$permission]);
            $roleGerente->givePermissionTo($permission);
        }

        foreach ($clientePermissions as $permission) {
            $roleCliente->givePermissionTo($permission);
        }


    }
}
