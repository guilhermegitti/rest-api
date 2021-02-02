<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Validação JWT login
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'    => 'required|email',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity = (24 * 60);

        $this->guard()->factory()->setTTL($token_validity);

        if (!$token = $this->guard()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

    }

    /**
     * Return do token JWT
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json(
            [
                'token'          => $token,
                'token_type'     => 'bearer',
                'token_validity' => ($this->guard()->factory()->getTTL() * 60),
            ]
        );
    }


    protected function guard()
    {
        return Auth::guard();
    }

}
