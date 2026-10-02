<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // En la base de datos la tabla se llama "apprendices", no "apprentices".
    protected $table = 'apprendices';

=======
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
    protected $fillable = [
        'name',
        'email',
        'cell_number',
        'course_id',
        'computer_id',
    ];

<<<<<<< HEAD
    // Un aprendiz pertenece a un curso
=======
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function computer()
    {
        return $this->belongsTo('App\Models\Computer');
    }
}