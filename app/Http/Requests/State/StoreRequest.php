<?php

namespace App\Http\Requests\State;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends BaseRequest
{

    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'slug' => 'max:255|required|unique:states'
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
            'slug' => $this->input('slug'),
        ];
    }
}
