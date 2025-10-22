<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'name',
        'email',
        'phone',
        'address',
        'birthday',
        'city_id',
    ];

    public function city()
    {
        //cest pour faire une jointure, a chaque fois que jappelle la class 
        return $this->belongsTo(City::class);
    }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }
}
