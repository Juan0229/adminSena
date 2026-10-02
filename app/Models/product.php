<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Relations\BelongsTo;

>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
class Product extends Model
{
    use HasFactory;

<<<<<<< HEAD
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
=======
    protected $fillable = [
        'name',
        'price',
        'description',
        'weight',
        'cant',
    ];

    public function user(): BelongsTo
>>>>>>> ebd95b3b89663c18ce92987a657560c954f2e6ab
    {
        return $this->belongsTo(User::class);
    }
}