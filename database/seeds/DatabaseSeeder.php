<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgenciaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ContaSeeder::class);
    }
}
