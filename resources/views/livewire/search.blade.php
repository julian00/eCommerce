<div class="flex-1 relative" x-data>
    <x-jet-input wire:model="search" type="text" class="w-full" placeholder="Buscar..."/>

    <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
        {{--llamo a un componente anonimo y le paso los valores de alto y ancho--}}
        <x-search size="35" color="white"/>
    </button>

    <div class="absolute w-full">                                                           <!--click fuera del componente con alpine-->
        <div class="bg-white rounded-lg shadow mt-1 hidden" :class="{ 'hidden' : !$wire.open}" @click.away="$wire.open = false">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    @php
                        $url= Str::substr(Storage::url($product->images->first()->url), 21)
                    @endphp
                    <a href="{{ route('products.show', $product)}}" class="flex">   
                        <img class="w-16 h-12 object-cover" src="{{ $url }}" alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p>Categorias: {{ $product->sub_category->category->name}}</p>
                        </div>
                    </a>
                @empty
                <p class="text-lg leading-5">NO EXISTE NINGUN REGISTRO COINCIDENTE</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
