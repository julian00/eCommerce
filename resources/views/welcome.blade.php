<x-app-layout>
    {{--slider--}}
    <div class="container py-8">
       @foreach ($categories as $category)
        <section class="mb-6">
            <h1 class="text-lg uppercase font-semibold text-gray-700">
                {{ $category->name }}
            </h1>
            @livewire('category-products', ['category' => $category])
        </section>
       @endforeach
    </div>

    {{-- ejecuto el script al final del layout app en la etiqueta stack --}}
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 5.5,
                    draggable: true,
                    dots: '.dots',
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>
