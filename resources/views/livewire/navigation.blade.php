<style>
    #navigation-menu{
        height: calc(100vh - 4rem);
    }
</style>
<header class="bg-trueGray-700 sticky top-0">
    <div class="container flex items-center h-16">
        <a class="flex flex-col items-center justify-center px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            {{--menu desplegable--}}
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categorias</span>
        </a>

        {{--logo  de jetstream--}}
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>

        {{--buscador--}}
        @livewire('search')

        {{--menu de usuario--}}
        <div class="mx-6 relative">
            @auth
                <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}
    
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>
    
                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
    
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>
    
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif
    
                            <div class="border-t border-gray-100"></div>
    
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>
    
                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>
    
                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        {{--logo carrito--}}
        @livewire('dropdown-cart')
        
    </div>

    {{--muestro el fondo con un gris claro y encima un cuadrado blanco--}}
    <nav id="navigation-menu" class="bg-trueGray-700 bg-opacity-25 w-full absolute">
        <div class="container h-full">
            <div class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $item)
                        <li class="text-trueGray-500 hover:bg-orange-500 hover:text-white">
                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                
                                {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                                <span class="flex justify-center w-9">
                                    {!!$item->icon!!}
                                </span>

                                {{$item->name}}
                            </a>

                            <div class="bg-red-500 absolute w-3/4 h-full top-0 right-0 hidden">

                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <div class="grid grid-cols-4 p-4">
                        <div>
                            <p class="text-lg font-bold text-center text-gray-500 mb-3">Subcategorias</p>
                            <ul>
                                @foreach ($categories->first()->subcategories as $item)
                                <li>
                                    <a href="" class="text-trueGray-500 font-semibold inline-block py-1 px-4 hover:text-orange-500">
                                        {{$item->name}}
                                    </a>
                                </li>
                                    
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-span-3">
                            {{Storage::url($categories->first()->image)}}
                            <img class="h-64 w-full object-cover object-center" src="/storage/categories/e7f45245fe57016e115f675b7d23f582.png" alt="">
                            <img class="h-64 w-full object-cover object-center" src="{{Storage::url($categories->first()->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
