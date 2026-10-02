<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'name',
    ];
}
=======
    use HasFactory;

    protected $fillable = [
        'name',
    ];

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
