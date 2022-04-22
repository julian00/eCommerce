<x-app-layout>
    <div class="container py-8">
        <ul>
            @forelse ($products as $product)
                    <x-product-list :product="$product">
                    </x-product-list>
            @empty
                    <li class="bg-white rounded-lg shadow-2xl">
                        <div class="p-4">
                            <p class="text-lg text-gray-700">Ningun producto coincide con la busqueda</p>
                        </div>
                    </li>
            @endforelse
        </ul>
    </div>
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</x-app-layout>