<?php

namespace App\Models;

use App\Models\Child;
use App\Models\State;
use App\Models\Family;
use App\Models\District;
use Illuminate\Support\Str;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'people';

    protected $fillable = [
        'name',
        'slug',
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
        'issue_date',
        'validity_date',
        'status',
        'issued_by',
    ];


    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

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

    public function family()
    {
        return $this->hasOne(Family::class, 'people_id');
    }
    public function children()
    {
        return $this->hasMany(Child::class, 'people_id');
    }

    public function images()
    {
        return $this->hasMany(PersonImage::class, 'people_id');
    }
}
