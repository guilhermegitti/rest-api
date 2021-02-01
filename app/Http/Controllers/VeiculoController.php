<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Função que retorna os veiculos de um determinado cliente.
     * @param $id
     * @return Veiculo
     */
    public function show($id)
    {
        return Veiculo::select('cliente_id', 'clientes.nome', 'veiculos.id', 'placa', 'marca', 'modelo', 'cor')
            ->join('clientes', function ($join) use ($id) {
                $join->on('veiculos.cliente_id', '=', 'clientes.id')
                    ->where('clientes.id', '=', $id);
            })
            ->orderBy('nome', 'asc')
            ->get();
    }

    /**
     * Função que cria novos veiculos a um cliente.
     * @param Request $request
     * @return Veiculo
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Veiculo::create($data);

        return response('Veiculo cadastrado com sucesso!', 201);
    }

    /**
     * Função que apaga um veiculo de um cliente
     * @param Veiculo $id
     * @return Veiculo
     */
    public function delete(Veiculo $id)
    {
        $id->delete();
        return response('O veiculo ' . $id->modelo . ' foi removido com sucesso!');
    }
}
