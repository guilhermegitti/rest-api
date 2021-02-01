<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Pega a coluna ID da tabela Usuários para ser usado na coluna 'user_id' da tabela Clientes
        $users_ids = User::all()->pluck('id');

        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->postcode,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'user_id' => $this->faker->randomElement($users_ids)
        ];
    }
}
