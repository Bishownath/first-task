<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'state_id',
        'status',
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

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class, 'person_id');
    }
}
