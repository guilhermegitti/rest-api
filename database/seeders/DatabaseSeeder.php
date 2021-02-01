<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(VeiculoTableSeeder::class);
    }
}
