<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;

    // Un aprendiz pertenece a un curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Un aprendiz usa un computador
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
