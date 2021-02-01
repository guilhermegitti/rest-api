<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    /**
     * Função que retorna todos os clientes de um determinado ID.
     * @param $id => ID referente ao ID do usuário
     * @return Cliente
     */
    public function show($id)
    {
        return Cliente::select('user_id', 'clientes.id', 'nome', 'cpf', 'clientes.email', 'telefone')
            ->join('users', function ($join) use ($id) {
                $join->on('clientes.user_id', '=', 'users.id')
                    ->where('users.id', '=', $id);
            })
            ->orderBy('nome', 'asc')
            ->get();
    }

    /**
     * Função que cria novos clientes a um usuário
     * @param Request $request
     * @return Cliente
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Cliente::create($data);

        return response('Cliente criado com sucesso!');
    }

    /**
     * Função que atualiza um cliente
     * @param $id => ID referente ao ID do cliente
     * @param Request $request
     * @return Cliente
     */
    public function update($id, Request $request)
    {
        $data = Cliente::findOrFail($id);
        $data->update($request->all());

        return response('Cliente atualizado com sucesso!');
    }

    /**
     * Função que deleta um cliente e seus veiculos de um usuário
     * @param Cliente $id
     * @return Cliente
     */
    public function delete(Cliente $id)
    {
        $id->delete();
        return response('O cliente ' . $id->nome . ' foi removido com sucesso!');
    }

}

