<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Model;
use App\Models\User;
use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Pega a coluna ID da tabela Clientes para ser usado na coluna 'cliente_id' da tabela Veiculos
        $clientes_ids = Cliente::all()->pluck('id');

        return [
            'placa' => $this->faker->postcode,
            'marca' => $this->faker->userName,
            'modelo' => $this->faker->title,
            'cor' => $this->faker->colorName,
            'cliente_id' => $this->faker->randomElement($clientes_ids)
        ];
    }
}
