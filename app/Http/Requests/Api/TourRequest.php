<?php

namespace App\Http\Requests\Api;

class TourRequest extends BaseRequest
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
            'description' => 'required|max:250',
            'location' => 'required|max:250',
            'starts_at' => 'required',
            'ends_at' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
            'location' => 'Location',
            'starts_at' => 'Starts At',
            'ends_at' => 'Ends At',
        ];
    }
}
