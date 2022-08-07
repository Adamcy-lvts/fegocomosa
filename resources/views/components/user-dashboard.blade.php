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
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-1 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-gray-900">Account</a>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </div>
            </div>
        </header>

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
            <main class="w-full flex-grow p-6">

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
