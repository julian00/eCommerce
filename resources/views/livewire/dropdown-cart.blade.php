<div>
    {{-- dropdown con los componentes de jetstream --}}
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart color="white" size=30/>
{{--                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">99</span>
--}}                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
            </span>
        </x-slot>

        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        @php
                            $url= Str::substr($item->options->image, 21);  
                        @endphp
                        <img class="h-15 w-20 object-cover mr-4" src="{{$url}}" alt="">
                        
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <p>Cant: {{$item->qty }}</p>
                            <p>$ {{$item->price}}</p>
                        </article>
                    </li>
                @empty         
                    <li class="px-4 py-6">
                        <p class="text-center text-gray-700">No hay ningun item agregado</p>
                    </li>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="py-2 px-3">
                    <p class="text-lg text-gray-700 mt-2 mb-3">
                        <span class="font-bold">Total $ </span>
                        {{ Cart::subtotal() }}
                    </p>
                    <x-button-enlace color="orange" class="w-full">
                        ir al carrito de compras
                    </x-button-enlace>
                </div>
            @endif
        </x-slot>
    </x-jet-drpdown>
</div>
