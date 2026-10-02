<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;

    // En la base de datos la tabla se llama "apprendices", no "apprentices".
    protected $table = 'apprendices';

    protected $fillable = [
        'name',
        'email',
        'cell_number',
        'course_id',
        'computer_id',
    ];

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
