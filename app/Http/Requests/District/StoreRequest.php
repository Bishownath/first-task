<?php

namespace App\Http\Requests\District;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends BaseRequest
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
