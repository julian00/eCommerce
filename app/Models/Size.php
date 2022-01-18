<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id'];

    //relacion 1:M inversa
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    //relacion M:M 
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }
}
