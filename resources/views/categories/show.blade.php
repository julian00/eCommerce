<x-app-layout>
    @php
        $url= Str::substr(Storage::url($category->image), 21)
    @endphp
    <div class="container py-8">
        <figure class="mb-4">
            <img class="h-80 w-full object-cover object-center" src="{{$url}}" alt="">
            {{--<img src="{{ Storage::url($category->image)}} " alt="">--}}
        </figure>

        @livewire('category-filter', ['category' => $category])
    </div>
</x-app-layout>