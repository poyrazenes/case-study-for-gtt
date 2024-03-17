<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseRequest;
use App\Support\Utils\Constant;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:250',
            'email' => 'required|email|max:250|unique:users,email',
            'password' => 'required|min:6|max:50|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
