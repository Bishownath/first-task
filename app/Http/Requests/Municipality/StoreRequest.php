<?php

namespace App\Http\Requests\Municipality;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends BaseRequest
{
    
    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'code' => 'max:255|required',
            'ward_number' => 'max:255|required',
            'district_id' => 'max:255|required'
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
            'code' => $this->input('code'),
            'ward_number' => $this->input('ward_number'),
            'district_id' => $this->input('district_id'),
        ];
    }
}
