<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD:app/Models/Category.php
class Category extends Model
{
    protected $fillable = ['name'];
}
=======
class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'brand',
    ];

    public function apprentices()
    {
        return $this->hasMany('App\Models\Apprentice');
    }
}
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab:app/Models/computer.php
