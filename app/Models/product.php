<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;

      protected $fillable = [
        'name',
        'price',
        'description',
        'weigth',
        'cant',
    ];
   /**
     * Obtiene el usuario dueño del producto.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}