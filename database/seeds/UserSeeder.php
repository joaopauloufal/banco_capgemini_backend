<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuário administrador
        $user = new User();
        $user->name = 'ADMINISTRADOR';
        $user->email = 'administrador@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('admin');

        // Usuário gerente
        $user = new User();
        $user->name = 'GERENTE';
        $user->email = 'gerente@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('gerente');

        // Usuário cliente
        $user = new User();
        $user->name = 'CLIENTE';
        $user->email = 'cliente@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user->assignRole('cliente');

    }

}
