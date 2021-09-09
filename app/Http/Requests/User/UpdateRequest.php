<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'email' => 'max:255|required',
            'password' => 'max:255|required',
            'image' => 'max:2048',
        ];
    }
}
