<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'file_name',
        'file_type',
        'student_id',
        'date'
    ];

    // Accesseur et mutateur pour 'title' (JSON)
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    // Relation avec Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
