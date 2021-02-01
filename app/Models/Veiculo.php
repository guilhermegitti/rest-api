<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    /**
     * Campos a serem preenchidos para realizar o cadastro de um novo veiculo a um cliente.
     * O campo 'cliente_id' se refere ao ID do cliente que queira cadastrar um novo veiculo.
     * @var array
     */
    protected $fillable = [
        'cliente_id',
        'placa',
        'modelo',
        'marca',
        'cor'
    ];
}
