<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'images',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
}
