<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemSize extends Component
{
    public $product, $sizes;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $size_id = "";
    public $colors = [];
    public $options = [];

    public function mount()
    {
        $this->sizes = $this->product->sizes;
        $this->options['image']  = Storage::url($this->product->images->first()->url);
    }

    //se mantiene a la escucha de la propiedad size_id para actualizar cuando esta se modifica
    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->options['size'] = $size->name;
    }

    public function updatedColorId($value)
    {
        $size = Size::find($this->size_id);
        $color = $size->colors->find($value);
        $this->quantity = $this->quantity = qty_available($this->product->id,$color->id, $size->id);
        $this->options['color'] = $color->name;
    }

    public function decrement()
    {
        $this->qty--;
    }

    public function increment()
    {
        $this->qty++;
    }

    public function addItem()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->quantity = $this->quantity = qty_available($this->product->id, $this->color_id, $this->size_id);
        $this->reset('qty');
        
        //emito un evento para que ejecute el metodo render del componente y se actualize cuando agrego al carrito
        $this->emitTo('dropdown-cart', 'render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
