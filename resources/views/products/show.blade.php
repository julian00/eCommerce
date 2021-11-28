<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            @php
                                $url= Str::substr(Storage::url($product->images->first()->url), 21)
                            @endphp
                            <li data-thumb="{{$url}}">
                                <img src="{{$url}}" alt="">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold text-trueGray-700">{{ $product->name }}</h1>
                <div class="flex">
                    <p class="text-trueGray-700">Marca: <a class="underline capitalize hover:text-orange-500" href="">{{ $product->brand->name }}</a></p>
                    <p class="text-trueGray-700 mx-6">5 <i class="fas fa-star text-sm text-yellow-400"></i></p>
                    <a class="text-orange-500 hover:text-orange-600 underline" href="">39 reseñas</a>
                </div>
                
                <p class="text-2xl font-semibold text-trueGray-700 my-4">$ {{$product->price}}</p>

                {{--tarjeta de camioncito--}}
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-greenLime-500">
                            <i class="fas fa-truck text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-greenLime-500">Se hacen envios a todo el pais</p>
                            {{--now() devuelve la fecha y hora actual--}}
                            <p>Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush

</x-app-layout>