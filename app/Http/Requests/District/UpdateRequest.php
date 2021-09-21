<?php

namespace App\Http\Requests\District;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'state_id' => 'max:255'
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
            'state_id' => $this->input('state_id'),
        ];
    }
}
