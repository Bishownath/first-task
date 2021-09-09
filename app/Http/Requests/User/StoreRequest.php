<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'email' => 'max:255|required',
            'password' => 'max:255|required',
            'image' => 'max:2048|mimes:jpeg,jpg,svg,png',
        ];
    }
}
