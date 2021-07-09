<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    //habilito la asignacion masiva
    protected $fillable = ['name','slug','image','icon'];
    
    //creo la relacion 1:M
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    //relacion M:M
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    //relacion 1:M a travez de otra relacion categories-subcategories-products
    public function products()
    {
        return $this->hasManyThrough(Product::class,SubCategory::class);
    }
}
