<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
<<<<<<< HEAD
=======
    use HasFactory;

>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
    protected $fillable = [
        'name',
        'email',
        'area_id',
        'training_center_id',
    ];
<<<<<<< HEAD
}
=======

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function trainingCenter()
    {
        return $this->belongsTo('App\Models\TrainingCenter');
    }
}
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
