<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //defino los valores del campo status
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id','created_at','updated_at'];

    //accesores
    public function getStockAttribute()
    {
        if ($this->sub_category->size) 
        {
            return Colorsize::whereHas('size.product', function(Builder $query){
                $query->where('id',$this->id);
            })->sum('quantity');
        }
        elseif($this->sub_category->color)
        {
          return ColorProduct::whereHas('product', function(Builder $query){
              $query->where('id',$this->id);
          })->sum('quantity');  
        }
        else
        {
            return $this->quantity;
        }
    }    

    //relacion 1:M 
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    //relacion 1:M inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //relacion M:M 
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    //relacion 1:M polimorfica
    public function images()
    {
                            //clase       , metodo
        return $this->morphMany(Image::class, "imageable");
    }

    //URL amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
