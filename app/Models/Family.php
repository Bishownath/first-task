<?php

namespace App\Models;

use App\Models\Child;
use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_id',
        'father_name',
        'grandfather_name',
        'grandmother_name',
        'mother_name',
        'wife_name',
        
    ];

    public function people()
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
}
