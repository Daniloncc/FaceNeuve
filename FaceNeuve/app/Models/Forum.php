<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

     // les infos qu'on permet le formulaire de saisir
     protected $fillable = [
        'title',
        'description',
        'due_date',
        'student_id'
    ];

    public function student()
    {
        //cest pour faire une jointure, a chaque fois que jappelle la class task je retourne aussi les infos du utilisateur
        return $this->belongsTo(Student::class);
    }


}
