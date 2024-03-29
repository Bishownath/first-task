<?php

namespace App\Http\Requests\State;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'max:255|required',
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
        ];
    }
}
