<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Database\Seeder;

class VeiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veiculo::factory(100)->create();
    }
}
