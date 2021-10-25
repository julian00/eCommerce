<x-app-layout>
    {{--slider--}}
    <div class="container py-8">
       @foreach ($categories as $category)
        <section class="mb-6">
            <div class="flex items-center mb-2">
                <h1 class="text-lg uppercase font-semibold text-gray-700">
                    {{ $category->name }}
                </h1>
                <a href="{{ route('categories.show', $category) }}" class="text-orange-500 hover:text-orange-400 hover:underline ml-2 font-semibold">Ver mas</a>
            </div>
            @livewire('category-products', ['category' => $category])
        </section>
       @endforeach
    </div>

    {{-- ejecuto el script al final del layout app en la etiqueta stack --}}
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                                {
                                // screens greater than >= 640px
                                breakpoint: 640,
                                settings: {
                                    // Set to `auto` and provide item width to adjust to viewport
                                    slidesToShow: 'auto',
                                    slidesToScroll: 'auto',
                                    itemWidth: 150,
                                    duration: 0.25
                                }
                                },
                    ]
                });
            });
        </script>
    @endpush

</x-app-layout>
