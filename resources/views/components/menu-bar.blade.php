
<header class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-sm text-white hover:underline mr-4">Home</a>
        
        @auth
        <div class="flex items-center space-x-4">
            <span>{{ Auth::user()->name }}</span>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        <div>
            @if(Auth::user()->is_admin == 1)
                <a href="{{ route('product.create') }}" class="ml-4 text-sm text-white hover:underline">Add Product</a>
            @endif
        </div>
        @else
        <div class="flex">
            <a href="{{ route('login') }}" class="text-sm text-white hover:underline mr-4">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm text-white hover:underline">Register</a>
            @endif
        </div>
        @endauth
    </div>
</header>
