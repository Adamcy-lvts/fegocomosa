@guest


    <header x-data="{ open: false }" class="text-gray-700 body-font border-b border-gray-200 bg-white ">
        <!-- Primary Navigation Menu -->
        <div class="container mx-auto flex justify-between flex-wrap md:flex-row items-center">

            <!-- Logo -->
            <div class="flex-shrink-0 flex ml-2 md:ml-0 items-center">
                <a href="{{ route('home') }}">
                    <img class="w-12 text-white p-2 " src="{{ asset('storage/svg_icons/Logo-min.svg') }}" alt="">
                </a>
                <span class="ml-3 text-xl">FEGOCOMOSA</span>
            </div>

            <!-- Navigation Links -->

            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center ">
                <div class="flex justify-between h-16">
                    <div class=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                            {{ __('Home') }}
                        </x-jet-nav-link>
                    </div>

                    <div class=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('aboutus') }}" :active="request()->routeIs('aboutus')">
                            {{ __('About Us') }}
                        </x-jet-nav-link>
                    </div>

                    <div class="  hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">
                            {{ __('Blog') }}
                        </x-jet-nav-link>
                    </div>

                    <div class=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('campaigns') }}" :active="request()->routeIs('campaigns*')">
                            {{ __('Donate') }}
                        </x-jet-nav-link>
                    </div>
                </div>
            </nav>
            <x-button xs href="{{ route('login') }}" outline green icon="arrow-circle-right" label="Sign In"
                class="hidden ml-4 sm:flex items-center  py-1 px-3  rounded text-base mt-4 md:mt-0" />

            <x-button xs href="{{ route('register') }}" outline green icon="arrow-circle-up" label="Register"
                class="hidden ml-4 sm:flex items-center  py-1 px-3  rounded text-base mt-4 md:mt-0" />

            <!-- Hamburger -->
            <div class="ml-2 md:ml-0 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            {{-- </div> --}}
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                    {{ __('Home') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts*')">
                    {{ __('Blog') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('campaigns') }}" :active="request()->routeIs('campaigns*')">
                    {{ __('Campaign') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('aboutus') }}" :active="request()->routeIs('aboutus')">
                    {{ __('About Us') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                    {{ __('Events') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                    <x-button xs href="{{ route('login') }}" outline green icon="arrow-circle-right" label="Sign In"
                        class=" ml-4 inline-flex items-center  py-1 px-3  rounded text-base mt-4 md:mt-0" />
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('events') }}" :active="request()->routeIs('events')">
                    <x-button xs href="{{ route('register') }}" outline green icon="arrow-circle-up" label="Register"
                        class=" ml-4 inline-flex items-center  py-1 px-3  rounded text-base mt-4 md:mt-0" />
                </x-jet-responsive-nav-link>




            </div>


        </div>
    </header>

@endguest
