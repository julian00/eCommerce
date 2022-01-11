<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product, $sizes;
    public $size_id= "";
    public $colors = [];

    public function mount()
    {
        $this->sizes = $this->product->sizes;
    }
    //se mantiene a la escucha de la propiedad size_id para actualizar cuando esta se modifica
    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
    }


    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
