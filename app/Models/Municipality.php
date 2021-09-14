<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'ward_number',
        'district_id',
        'slug',
        'status',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class, 'person_id');
    }
}
