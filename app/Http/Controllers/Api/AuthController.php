<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;

use App\Models\User;

class AuthController extends ApiBaseController
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!$token = auth('api')->attempt($data)) {
            return $this->response
                ->setCode(401)
                ->setStatus(false)
                ->setMessage('Invalid Credentials')
                ->respond();
        }

        return $this->tokenResponse($token);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $token = auth('api')->attempt([
            'email' => $user->email,
            'password' => $request->input('password')
        ]);

        return $this->tokenResponse($token);
    }

    private function tokenResponse($token)
    {
        return $this->response
            ->setCode(200)
            ->setStatus(true)
            ->setData(['token' => $token])
            ->setMessage('Operation was successful!')
            ->respond();
    }
}
