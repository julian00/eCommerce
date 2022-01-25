<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemColor extends Component
{
    public $product, $colors;
    
    public $color_id="";

    public $qty = 1;
    public $quantity = 0;
    public $options= [
        'size_id' =>null
    ];
    
    public function mount()
    {
        $this->colors = $this->product->colors;
        $this->quantity = $this->product->quantity;      
        $this->options['image']  = Storage::url($this->product->images->first()->url);
    }
    
        public function updatedColorId($value)
        {
            $color = $this->product->colors->find($value);
            //con el metodo pivot accedo a la tabla intermedia color-product
            $this->quantity = $color->pivot->quantity;
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
        Cart::add(['id' => $this->product->id,
                    'name' => $this->product->name,
                    'qty' => $this->qty,
                    'price' =>$this->product->price,
                    'weight' => 550,
                    'options' => $this->options
                ]);
        //emito un evento para que ejecute el metodo render del componente y se actualize cuando agrego al carrito
        $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
