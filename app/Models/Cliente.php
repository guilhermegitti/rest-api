<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Campos a serem preenchidos para realizar o cadastro de um novo cliente a um usuário.
     * O campo 'user_id' se refere ao ID do usuário que queira cadastrar o cliente.
     * @var array
     *
     */
    protected $fillable = [
        'user_id',
        'nome',
        'cpf',
        'email',
        'telefone',
    ];
}
