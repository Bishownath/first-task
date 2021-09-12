<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'max:255|required',
            'address' => 'max:255|required',
            'address_2' => 'max:255',
            'email' => 'max:255|required',
            'phone_number' => 'max:255|required',
            'mobile_number' => 'max:255',
            'age' => 'max:255|required',
            'gender' => 'max:255|required',
            'state_id' => 'max:255|required',
            'district_id' => 'max:255|required',
            'municipality_id' => 'max:255|required',
            'citizenship_number' => 'max:255|required',
            'passport_number' => 'max:255',
            'image' => 'max:255',
            'blood_group' => 'max:255',
            'date_of_birth' => 'max:255|required',
            'grandfather_name' => 'max:255|required',
            'father_name' => 'max:255|required',
            'issue_date' => 'max:255',
            'validity_date' => 'max:255|required',
            'issued_from' => 'max:255',
            'issued_by' => 'max:255',
        ];
    }

    public function data()
    {
        return [
            'name' => $this->input('name'),
            'address' => $this->input('address'),
            'address_2' => $this->input('address_2'),
            'email' => $this->input('email'),
            'phone_number' => $this->input('phone_number'),
            'mobile_number' => $this->input('mobile_number'),
            'age' => $this->input('age'),
            'gender' => $this->input('gender'),
            'state_id' => $this->input('state_id'),
            'district_id' => $this->input('district_id'),
            'municipality_id' => $this->input('municipality_id'),
            'citizenship_number' => $this->input('citizenship_number'),
            'passport_number' => $this->input('passport_number'),
            'image' => $this->input('image'),
            'blood_group' => $this->input('blood_group'),
            'date_of_birth' => $this->input('date_of_birth'),
            'grandfather_name' => $this->input('grandfather_name'),
            'father_name' => $this->input('father_name'),
            'issue_date' => $this->input('issue_date'),
            'validity_date' => $this->input('validity_date'),
            'issued_from' => $this->input('issued_from'),
            'issued_by' => $this->input('issued_by'),
        ];
    }
}
