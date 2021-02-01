<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Função que retorna todos os usuários
     * @return User
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Função que retorna apenas um usuário
     * @param User $id
     * @return User
     */
    public function show(User $id)
    {
        return $id;
    }

    /**
     * Função que cria novos usuários
     * @param Request $request
     * @return User
     */
    public function store(Request $request)
    {
        $data = $request->all();
        User::create($data);

        return response('Usuário criado com sucesso!');
    }

}
