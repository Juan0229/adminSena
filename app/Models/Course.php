<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',
    ];
}
