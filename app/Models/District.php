<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_id',
    ];

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
