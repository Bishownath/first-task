<?php

namespace App\Models;

use App\Models\District;
use App\Models\State;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    
    protected $fillable = [
        'name',
        'address',
        'address_2',
        'email',
        'phone_number',
        'mobile_number',
        'age',
        'gender',
        'state_id',
        'district_id',
        'municipality_id',
        'citizenship_number',
        'passport_number',
        'image',
        'blood_group',
        'date_of_birth',
        'grandfather_name',
        'father_name',
        'issue_date',
        'validity_date',
        'issued_from',
        'issued_by',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
