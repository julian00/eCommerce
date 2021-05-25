<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //relacion 1:M 
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    //relacion 1:M inversa
    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //relacion M:M 
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    //relacion 1:M polimorfica
    public function images()
    {
                            //clase       , metodo
        return $this->morphTo(Image::class, 'imageable');
    }
}
