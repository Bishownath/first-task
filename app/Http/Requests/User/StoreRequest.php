<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Hash;

class StoreRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'email' => 'max:255|required',
            'password' => 'max:255|required',
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
            // 'address' => $this->input('address'),
            'email' => $this->input('email'),
            'password' => Hash::make($this->input('password')),
        ];
    }
}
