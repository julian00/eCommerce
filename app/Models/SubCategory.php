<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    //deifo los campos que quiero deshabilitar de la asignacion masiba
    protected $guarded = ['id','created_at','updated_at'];

    //relacion 1:M
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //relacion 1:M inversa, traigo una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
