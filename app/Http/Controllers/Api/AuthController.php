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
        $data['status'] = true;
        $data['is_deleted'] = false;

        if (!$token = auth('api')->attempt($data)) {
            return $this->response
                ->setCode(401)
                ->setStatus(false)
                ->setMessage('Invalid Credentials')
                ->respond();
        }

        return $this->response->setCode(200)
            ->setStatus(true)
            ->setMessage('Operation was successful!')
            ->setData(['token' => $token])
            ->respond();
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        $token = auth('api')->attempt([
            'email' => $user->email,
            'password' => $request->input('password')
        ]);

        return $this->response->setCode(200)
            ->setStatus(true)
            ->setMessage('Operation was successful!')
            ->setData(['token' => $token])
            ->respond();
    }
}
