<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    //hace qu la paginacion sea dinamica
    use WithPagination;
    
    //defino la variable para obtenes la informacion en la vista
    public $category, $subcategoria, $marca;
    public $view = "grid";

    public function clear()
    {
        $this->reset(['subcategoria','marca']);
    }
    public function render()
    {
        //recupero todos los productos correspondientes a la categoria
       /* $products =$this->category->products()
            ->where('status',2)->paginate(20);*/

        //consultas complejas
        $productsQuery = Product::query()->whereHas('sub_category.category',function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if($this->subcategoria)
        {
            $productsQuery = $productsQuery->whereHas('sub_category', function(Builder $query){
                $query->where('name', $this->subcategoria);
            });
        }

        if($this->marca)
        {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter',compact('products'));
    }
}
