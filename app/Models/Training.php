<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    // En la base de datos la tabla se llama "trainings", no "training_centers".
    protected $table = 'trainings';

    protected $fillable = [
        'name',
        'location',
    ];
}
