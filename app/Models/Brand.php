<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //relacion 1:M
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //relacion M:M
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
