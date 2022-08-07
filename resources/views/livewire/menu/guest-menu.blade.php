<div>

    @guest
        <header class="text-gray-700 body-font border-b border-gray-200 bg-white ">
            <div class="container mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ route('welcome') }}"
                    target="_blank">
                    <img class="w-12 text-white p-2 " src="{{ asset('storage/svg_icons/Logo-min.svg') }}" alt="">

                    <span class="ml-3 text-xl">FEGOCOMOSA</span>
                </a>
                <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center ">
                    <div class="flex justify-between h-16">
                        <div class=" space-x-8 sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                                {{ __('Home') }}
                            </x-jet-nav-link>
                        </div>

                        <div class=" space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('aboutus') }}" :active="request()->routeIs('aboutus')">
                                {{ __('About Us') }}
                            </x-jet-nav-link>
                        </div>

                        <div class="  space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">
                                {{ __('Blog') }}
                            </x-jet-nav-link>
                        </div>

                        <div class=" space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="{{ route('campaigns') }}" :active="request()->routeIs('campaigns')">
                                {{ __('Donate') }}
                            </x-jet-nav-link>
                        </div>
                    </div>
                </nav>
                <x-button href="{{ route('login') }}" icon="arrow-circle-right" label="Sign In"
                    class=" ml-4 inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" />

            </div>
        </header>
    @endguest
</div>
