<?php

namespace App\Models;

use App\Models\Family;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'son_name',
        'daughter_name',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
}
