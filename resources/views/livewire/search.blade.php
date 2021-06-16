<div class="flex-1 relative">
    <x-jet-input type="text" class="w-full" placeholder="Buscar..."/>

    <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
        {{--llamo a un componente anonimo y le paso los valores de alto y ancho--}}
        <x-search size="35" color="white"/>
    </button>
</div>
