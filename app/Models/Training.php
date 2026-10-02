<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
<<<<<<< HEAD
    // En la base de datos la tabla se llama "trainings", no "training_centers".
    protected $table = 'trainings';
=======
    use HasFactory;
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab

    protected $fillable = [
        'name',
        'location',
    ];
<<<<<<< HEAD
}
=======

    public function teachers()
    {
        return $this->hasMany('App\Models\Teacher');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
