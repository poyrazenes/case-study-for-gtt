<?php

namespace App\Http\Requests\Api;

use App\Support\Response\Response;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $error_list = (new ValidationException($validator))->errors();

        $data = [];

        foreach ($error_list as $field => $errors) {
            foreach ($errors as $error) {
                $data[] = [
                    'key' => $field,
                    'value' => $error
                ];
            }
        }

        $response = new Response(422, false, 'Unprocessable Entity', $data);

        throw new HttpResponseException(
            $response->respond()
        );
    }
}
