<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $products = [];

    public function loadPosts()
    {
        //traigo los productos que solo tienen el status 2
        $this->products = $this->category->products()->where('satus', 2)->take(10)->get();
        $this->emit('glider',$this->category->id);
    }
    
    public function render()
    {
        return view('livewire.category-products');
    }
}
