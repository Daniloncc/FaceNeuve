<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'student_id'
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    // Accesseur et mutateur pour 'description'
    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    public function student()
    {
        //cest pour faire une jointure, a chaque fois que jappelle la class 
        return $this->belongsTo(Student::class);
    }
}
