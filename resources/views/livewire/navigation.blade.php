
<header class="bg-trueGray-700 sticky top-0 z-50" x-data="{ open: false }">
    <div class="container flex items-center h-16 justify-between md:justify-items-start">
        <a  :class="{'bg-opacity-100 text-orange-500' : open}" {{--clase dinamica--}}
            x-on:click="open = !open"
            class="flex flex-col items-center justify-center order-last md:order-first px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            {{--menu desplegable--}}
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm">Categorias</span>
        </a>

        {{--logo  de jetstream--}}
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>

        {{--buscador lo mustro en pantallas grandes o mesianas--}}
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>

        {{--menu de usuario--}}
        <div class="mx-6 relative hidden md:block">
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
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>
        
    </div>

    {{--muestro el fondo con un gris claro y encima un cuadrado blanco--}}
    <nav id="navigation-menu" :class="{'block':open, 'hidden': !open}" class="bg-trueGray-700 bg-opacity-25 w-full absolute hidden">
        {{--menu pc--}}
        <div class="container h-full hidden md:block">
            <div x-on:click.away="open = false"
                class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                            <a href="" class="py-2 px-4 text-sm flex items-center">
                                
                                {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                                <span class="flex justify-center w-9">
                                    {!!$category->icon!!}
                                </span>

                                {{$category->name}}
                            </a>

                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category"/>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    {{--con el : paso un objeto--}}
                    <x-navigation-subcategories :category="$categories->first()"/>
                </div>
            </div>
        </div>

        {{--menu celu--}}
        <div class="bg-white h-full overflow-y-auto">
            <div class="container bg-gray-300 py-3 mb-2">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-trueGray-500 hover:bg-orange-500 hover:text-white">
                        <a href="" class="py-2 px-4 text-sm flex items-center">
                            
                            {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                            <span class="flex justify-center w-9">
                                {!!$category->icon!!}
                            </span>

                            {{$category->name}}
                        </a>
                    </li>
                @endforeach
            </ul>

            <p class="text-trueGray-500 px-6 my-2">Usuarios</p>

            @livewire('cart-movil')
            
            @auth
                <a href="{{ route('profile.show') }}" class="py-2 px-4 text-sm flex items-center navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                                    
                    {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                    <span class="flex justify-center w-9">
                        <i class="far fa-address-card"></i>
                    </span>
                    Perfil
                </a>

                <a href="" 
                    {{--cuando hago click evita que siga el enlace y me redirige al formulario --}}
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit() "
                    class="py-2 px-4 text-sm flex items-center navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                                    
                    {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                    <span class="flex justify-center w-9">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    Cerrar sesion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="py-2 px-4 text-sm flex items-center navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                                        
                    {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>
                    Iniciar sesion
                </a>

                <a href="{{ route('register') }}" class="py-2 px-4 text-sm flex items-center navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                                    
                    {{--muestro el icono lo pongo de esa forma para que no muestre la ruta--}}
                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>
                    Registrarse
                </a>
            @endauth
        </div>
    </nav>
</header>

