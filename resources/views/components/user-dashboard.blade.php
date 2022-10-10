<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Fegocomosa') }}</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-6/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/progressbar.css') }}">
    <link rel="stylesheet" type="text/css"
        href=" https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Scripts -->
    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body x-clock class=" font-family-karla flex">
    <x-notifications />

    <aside class="relative  border border-r bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/home" class="flex items-center md:justify-center text-gray-900">

                <img class="w-28 p-2" src="{{ asset('images/Logo-min.svg') }}" alt="">

            </a>

        </div>
        <nav class="text-gray-900 text-base font-sans pt-3 divide-y ">

            <a href="{{ route('member.dashboard') }}"
                class="flex border-t items-center {{ Request::is('member/dashboard') ? 'bg-gray-900 text-gray-100' : '' }}    py-4 pl-6 hover:bg-gray-600">
                <i class="fas fa-tachometer-alt"></i>
                <span class="ml-2">Dashboard</span>
            </a>
            <a href="{{ route('profile.show') }}"
                class="flex items-center   {{ Request::is('user/profile') ? 'bg-gray-900 text-gray-100' : '' }} hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fa-solid fa-user"></i>
                <span class="ml-2">Profile</span>
            </a>
            <a href="{{ route('update.password') }}"
                class="flex items-center   {{ Request::is('password-update') ? 'bg-gray-900 text-gray-100' : '' }} hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fa-solid fa-key"></i>
                <span class="ml-2">Change Password</span>
            </a>
            {{-- <a href="#"
                class="flex items-center cursor-not-allowed hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fas fa-shopping-cart"></i>
                <span class="ml-2">Orders</span>
            </a> --}}
            <div x-data="accordion" class="w-full max-w-lg mx-auto space-y-4">
                <!-- Accordion 1 -->
                <div class="w-full bg-white  rounded-md py-2">
                    <!-- Head -->
                    <div @click="selected != 1 ? selected = 1 : selected =null"
                        class="flex justify-between items-center  px-2">
                        <h1 class="font-medium text-gray-800 py-2 pl-6">Resume</h1>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            x-bind:class="selected == 1 ? 'transform rotate-180' : ''"
                            class="h-5 w-5 transition-all duration-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <!-- Content -->
                    <div class="max-h-0 overflow-hidden transition-all duration-300 pl-6" x-ref="tab1"
                        :style="selected == 1 ? 'max-height: ' + $refs.tab1.scrollHeight + 'px;' : ''">
                        <a href="{{ route('create.resume') }}"
                            class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">

                            Create Resume
                        </a>
                        <a href="{{ route('edit.resume') }}"
                            class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">

                            Edit Resume
                        </a>
                        <a href="{{ route('view.resume') }}"
                            class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">

                            View Resume
                        </a>
                    </div>
                </div>
            </div>
            {{-- <a href="#"
                class="flex border border-b items-center cursor-not-allowed opacity-75 hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fa-solid fa-id-card"></i>
                <span class="ml-2">ID Card</span>
            </a> --}}

        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="nav-list-link p-2 upgrade-btn bottom-0 absolute w-full border flex flex-row justify-center {{ Request::is('/logout') ? 'bg-gray-700' : '' }} hover:bg-gray-600"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          this.closest('form').submit();">
                <i class="fal fa-2x fa-sign-out-alt"></i>
                <div class=" mt-3 ml-3">Logout</div>
            </a>


        </form>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Dashboard Header -->
        <div x-data="{ open: false }">
            <div class="bg-green-600">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between py-4">
                        {{-- Mobile Navbar --}}

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center bg-white justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>


                        </div>

                        <div class="w-1/2 md:w-auto text-center text-white text-2xl font-medium">
                            <!-- Page Heading -->
                            @if (isset($header))
                                {{ $header }}
                            @endif
                        </div>
                        <div class="w-1/4 md:w-auto md:flex text-right">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <div class="flex justify-between">
                                        <button>
                                            <img class="inline-block h-10 w-10 rounded-full"
                                                src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                                                alt="">
                                        </button>
                                        <div class="hidden md:block cursor-pointer md:flex md:items-center ml-2">
                                            <span class="text-white text-sm mr-1">Welcome
                                                {{ auth()->user()->first_name }}</span>
                                            <div>
                                                <svg class="fill-current text-white h-4 w-4 block opacity-50"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot>
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

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
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Header & Nav -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">

                    <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('/home')">
                        {{ __('Home') }}
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('member.dashboard') }}" :active="request()->routeIs('member/dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('user/profile')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('update.password') }}" :active="request()->routeIs('password-update')">
                        {{ __('Change password') }}
                    </x-jet-responsive-nav-link>

                    <div x-data="accordion" class="w-full   space-y-4">
                        <!-- Accordion 1 -->
                        <div class="w-full bg-white cursor-pointer hover:bg-gray-100  rounded-md py-2">
                            <!-- Head -->
                            <div @click="selected != 1 ? selected = 1 : selected =null"
                                class="flex justify-between items-center pr-3">
                                <h1 class="font-medium text-gray-800 py-2 pl-4">Resume</h1>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    x-bind:class="selected == 1 ? 'transform rotate-180' : ''"
                                    class="h-5 w-5  transition-all duration-300" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <!-- Content -->
                            <div class="max-h-0 overflow-hidden transition-all duration-300 pl-6" x-ref="tab1"
                                :style="selected == 1 ? 'max-height: ' + $refs.tab1.scrollHeight + 'px;' : ''">
                                <a href="{{ route('create.resume') }}"
                                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">

                                    Create Resume
                                </a>
                                <a href="{{ route('edit.resume') }}"
                                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">

                                    Edit Resume
                                </a>
                                <a href="{{ route('view.resume') }}"
                                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">

                                    View Resume
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- <x-jet-responsive-nav-link href="{{ route('projects') }}" :active="request()->routeIs('projects')">
                        {{ __('Orders') }}
                    </x-jet-responsive-nav-link> --}}

                </div>
            </div>
        </div>


        <div class="hidden bg-blue-500 md:block md:bg-white md:border-b">
            <div class="container mx-auto px-4">
                <div class="md:flex">
                    <div class="flex -mb-px mr-8">
                        <a href="#"
                            class="no-underline text-white md:text-gray-500 flex items-center py-4 md:hover:border-b md:hover:border-gray-500 {{ Request::is('member/dashboard') ? 'border-b border-blue-500 md:text-blue-600' : '' }}">
                            <svg class="h-6 w-6 fill-gray-500 mr-2 {{ Request::is('member/dashboard') ? 'fill-blue-500' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z" />
                            </svg> Dashboard
                        </a>
                    </div>
                    <div class="flex -mb-px mr-8">
                        <a href="{{ route('profile.show') }}"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4  {{ Request::is('user/profile') ? 'border-b border-blue-500 md:text-blue-600' : '' }} md:hover:border-b md:hover:border-gray-500">

                            <i
                                class="fa-solid fa-user h-6 w-6 text-gray-500 mr-2 {{ Request::is('user/profile') ? 'fill-blue-500' : '' }}"></i>
                            Profile
                        </a>
                    </div>
                    {{-- <div class="flex -mb-px mr-8 cursor-not-allowed">
                        <a href="#"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-500">

                            <i
                                class="fas fa-shopping-cart h-6 w-6 text-gray-500 mr-2 {{ Request::is('orders*') ? 'fill-blue-500' : '' }}"></i>
                            Orders
                        </a>
                    </div> --}}
                    <div class="flex -mb-px mr-8">
                        <a href="{{ route('view.resume') }}"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4  {{ Request::is('resume*') ? 'border-b border-blue-500 md:text-blue-600' : '' }} md:hover:border-b md:hover:border-gray-500">
                            <svg class="h-6 w-6 fill-gray-500 mr-2 {{ Request::is('resume*') ? 'fill-blue-500' : '' }}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M11 12h2v2h9s-.149-4.459-.2-5.854C21.75 6.82 21.275 6 19.8 6h-3.208l-1.197-2.256C15.064 3.121 14.951 3 14.216 3H9.783c-.735 0-.847.121-1.179.744-.165.311-.7 1.318-1.196 2.256H4.199c-1.476 0-1.945.82-2 2.146C2.145 9.473 2 14 2 14h9v-2zM9.649 4.916c.23-.432.308-.516.817-.516h3.067c.509 0 .588.084.816.516L14.924 6h-5.85l.575-1.084zM13 17h-2v-2H2.5s.124 1.797.199 3.322c.031.633.218 1.678 1.8 1.678H19.5c1.582 0 1.765-1.047 1.8-1.678.087-1.568.2-3.322.2-3.322H13v2z"
                                    fill-rule="nonzero" />
                            </svg> Resume
                        </a>
                    </div>
                    @if (auth()->user()->hasRole('Super-Admin'))
                        <div class="flex -mb-px mr-8">
                            <a href="{{ route('view.pdf', auth()->user()->id) }}"
                                class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4  {{ Request::is('pdf/resume') ? 'border-b border-blue-500 md:text-blue-600' : '' }} md:hover:border-b md:hover:border-gray-500">
                                <svg class="h-6 w-6 fill-gray-500 mr-2 {{ Request::is('pdf/resume') ? 'fill-blue-500' : '' }}"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M11 12h2v2h9s-.149-4.459-.2-5.854C21.75 6.82 21.275 6 19.8 6h-3.208l-1.197-2.256C15.064 3.121 14.951 3 14.216 3H9.783c-.735 0-.847.121-1.179.744-.165.311-.7 1.318-1.196 2.256H4.199c-1.476 0-1.945.82-2 2.146C2.145 9.473 2 14 2 14h9v-2zM9.649 4.916c.23-.432.308-.516.817-.516h3.067c.509 0 .588.084.816.516L14.924 6h-5.85l.575-1.084zM13 17h-2v-2H2.5s.124 1.797.199 3.322c.031.633.218 1.678 1.8 1.678H19.5c1.582 0 1.765-1.047 1.8-1.678.087-1.568.2-3.322.2-3.322H13v2z"
                                        fill-rule="nonzero" />
                                </svg> Resume PDF View
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>{{-- End of dashboard header --}}




        <div class="w-full overflow-x-hidden border-t flex flex-col">

            <!-- Page Content -->
            <main class=" bg-gray-100 w-full flex-grow p-6">

                {{ $slot }}
            </main>

            <footer class="w-full bg-white inset-x-0 bottom-0 text-right bg-gray-200 ">
                <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                    @php
                        $year = Carbon\Carbon::now()->year;
                    @endphp
                    <p class="text-gray-500 text-sm text-center sm:text-left">© {{ $year }} <a
                            href="/home">Fegocomosa</a> —
                        <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-600 ml-1"
                            target="_blank">Made With <i class="fa-duotone fa-heart"></i> By Adamu Mohammed</a>
                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
                        <a href="#" class="text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-3 text-gray-500">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="ml-3 text-gray-500">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5"
                                    ry="5">
                                </rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a href="#" class="ml-3 text-gray-500">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </span>
                </div>
            </footer>
        </div>

    </div>


    @livewireScripts
    @stack('flatpicker')
    <script src="{{ asset('js/progressbar.js') }}"></script>

    <script>
        function accordion() {
            return {
                selected: null
            }
        }
    </script>
    <script>
        function app() {
            return {
                step: 1,
            }
        }
    </script>


</body>

</html>
