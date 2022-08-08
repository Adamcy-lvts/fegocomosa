<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Spatie') }}</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-6/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/progressbar.css') }}">
    <link rel="stylesheet" type="text/css"
        href=" https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">

    <!-- Scripts -->
    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body x-clock class=" font-family-karla flex">
    <x-notifications />

    <aside class="relative  border border-r bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="/home" class="flex items-center md:justify-center text-gray-900">

                <img class="w-28 p-2" src="{{ asset('storage/svg_icons/Logo-min.svg') }}" alt="">

            </a>

        </div>
        <nav class="text-gray-900 text-base font-sans pt-3 divide-y ">
            <a href="{{ route('user.dashboard') }}"
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
            <a href="forms.html" class="flex items-center  hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fas fa-shopping-cart"></i>
                <span class="ml-2">Orders</span>
            </a>
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
            <a href="calendar.html"
                class="flex border border-b items-center  opacity-75 hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fa-solid fa-id-card"></i>
                <span class="ml-2">ID Card</span>
            </a>
            <a href="{{ route('more.info') }}"
                class="flex border border-b items-center  opacity-75  hover:opacity-100 py-4 pl-6 hover:bg-gray-600">
                <i class="fa-solid fa-id-card"></i>
                <span class="ml-2">Add Info</span>
            </a>
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
        <div class="bg-green-600">
            <div class="container mx-auto px-4">
                <div class="flex items-center md:justify-between py-4">
                    <div class="w-1/4 md:hidden">
                        <svg class="fill-current text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z" />
                        </svg>
                    </div>
                    <div class="w-1/2 md:w-auto text-center text-white text-2xl font-medium">
                        Dashboard
                    </div>
                    <div class="w-1/4 md:w-auto md:flex text-right">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <div class="flex">
                                    <button>
                                        <img class="inline-block h-10 w-10 rounded-full"
                                            src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                                            alt="">
                                    </button>
                                    <div class="hidden md:block cursor-pointer md:flex md:items-center ml-2">
                                        <span class="text-white text-sm mr-1">{{ auth()->user()->first_name }}</span>
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
        <div class="hidden bg-blue-500 md:block md:bg-white md:border-b">
            <div class="container mx-auto px-4">
                <div class="md:flex">
                    <div class="flex -mb-px mr-8">
                        <a href="#"
                            class="no-underline text-white md:text-blue-600 flex items-center py-4 border-b border-blue-500">
                            <svg class="h-6 w-6 fill-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z" />
                            </svg> Dashboard
                        </a>
                    </div>
                    <div class="flex -mb-px mr-8">
                        <a href="#"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-500">
                            <svg class="h-6 w-6 fill-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path d="M8 7h10V5l4 3.5-4 3.5v-2H8V7zm-6 8.5L6 12v2h10v3H6v2l-4-3.5z"
                                    fill-rule="nonzero" />
                            </svg> Buy/Sell
                        </a>
                    </div>
                    <div class="flex -mb-px mr-8">
                        <a href="#"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-500">
                            <svg class="h-6 w-6 fill-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M18 8H5.5v-.5l11-.88v.88H18V6c0-1.1-.891-1.872-1.979-1.717L5.98 5.717C4.891 5.873 4 6.9 4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-1.5 7.006a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"
                                    fill-rule="nonzero" />
                            </svg> Accounts
                        </a>
                    </div>
                    <div class="flex -mb-px mr-8">
                        <a href="#"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-500">
                            <svg class="h-6 w-6 fill-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M11 12h2v2h9s-.149-4.459-.2-5.854C21.75 6.82 21.275 6 19.8 6h-3.208l-1.197-2.256C15.064 3.121 14.951 3 14.216 3H9.783c-.735 0-.847.121-1.179.744-.165.311-.7 1.318-1.196 2.256H4.199c-1.476 0-1.945.82-2 2.146C2.145 9.473 2 14 2 14h9v-2zM9.649 4.916c.23-.432.308-.516.817-.516h3.067c.509 0 .588.084.816.516L14.924 6h-5.85l.575-1.084zM13 17h-2v-2H2.5s.124 1.797.199 3.322c.031.633.218 1.678 1.8 1.678H19.5c1.582 0 1.765-1.047 1.8-1.678.087-1.568.2-3.322.2-3.322H13v2z"
                                    fill-rule="nonzero" />
                            </svg> Tools
                        </a>
                    </div>
                    <div class="flex -mb-px">
                        <a href="#"
                            class="no-underline text-white opacity-50 md:text-gray-500 md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-gray-500">
                            <svg class="h-6 w-6 fill-gray-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path
                                    d="M18.783 12c0-1.049.646-1.875 1.617-2.443a8.932 8.932 0 0 0-.692-1.672c-1.089.285-1.97-.141-2.711-.883-.741-.74-.968-1.621-.683-2.711a8.732 8.732 0 0 0-1.672-.691c-.568.97-1.595 1.615-2.642 1.615-1.048 0-2.074-.645-2.643-1.615-.58.172-1.14.403-1.671.691.285 1.09.059 1.971-.684 2.711-.74.742-1.621 1.168-2.711.883A8.797 8.797 0 0 0 3.6 9.557c.97.568 1.615 1.394 1.615 2.443 0 1.047-.645 2.074-1.615 2.643.173.58.404 1.14.691 1.672 1.09-.285 1.971-.059 2.711.682.741.742.969 1.623.684 2.711.532.288 1.092.52 1.672.693.568-.973 1.595-1.617 2.643-1.617 1.047 0 2.074.645 2.643 1.617a8.963 8.963 0 0 0 1.672-.693c-.285-1.088-.059-1.969.683-2.711.741-.74 1.622-1.166 2.711-.883.287-.532.52-1.092.692-1.672-.973-.569-1.619-1.395-1.619-2.442zM12 15.652a3.653 3.653 0 1 1 0-7.306 3.653 3.653 0 0 1 0 7.306z"
                                    fill-rule="nonzero" />
                            </svg> Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>{{-- End of dashboard header --}}


        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-gr bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-gray-900 text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex' : 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center active-nav-link text-gray-900 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Profile
                </a>
                <a href="tables.html"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Change Password
                </a>
                <a href="forms.html"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Orders
                </a>
                <div x-data="accordion" class="w-full max-w-lg mx-auto space-y-4">
                    <!-- Accordion 1 -->
                    <div class="w-full bg-white shadow-md rounded-md">
                        <!-- Head -->
                        <div @click="selected != 1 ? selected = 1 : selected =null"
                            class="flex justify-between items-center shadow-md px-2">
                            <h1 class="font-medium text-gray-800 py-2">Accordion 1</h1>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                x-bind:class="selected == 1 ? 'transform rotate-180' : ''"
                                class="h-5 w-5 transition-all duration-300" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <!-- Content -->
                        <div class="max-h-0 overflow-hidden transition-all duration-300" x-ref="tab1"
                            :style="selected == 1 ? 'max-height: ' + $refs.tab1.scrollHeight + 'px;' : ''">
                            <a href="tabs.html"
                                class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                                <i class="fas fa-tablet-alt mr-3"></i>
                                Resume
                            </a>
                        </div>
                    </div>
                </div>

                <a href="calendar.html"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    ID Card
                </a>
                <a href="#"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#"
                    class="flex items-center text-gray-900 opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button
                    class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <!-- Page Content -->
            <main class=" bg-gray-100 w-full flex-grow p-6">

                {{ $slot }}
            </main>

            <footer class="w-full bg-white fixed inset-x-0 bottom-0 text-right bg-gray-200 ">
                <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                    @php
                        $year = Carbon\Carbon::now()->year;
                    @endphp
                    <p class="text-gray-500 text-sm text-center sm:text-left">© {{ $year }} Fegocomosa —
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
