<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@fegocomosa" />
    <meta name="twitter:title" content="Fegocomosa" />
    <meta name="twitter:description" content="Federal Government College Maiduguri Old Student Association " />
    <meta name="twitter:image" content="{{ url('images/ariana_grande_.jpg') }}" />

    <meta property="og:title" content="Fegocomosa">
    <meta property="og:description" content="Federal Governement College Maiduguri Old Student Association">
    <meta property="og:image" content="{{ url('images/Logo-min.svg') }}">
    <meta property="og:url" content="https://fegocomosa.live">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    {{-- {!! SEO::generate() !!} --}}



    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('fontawesome-pro-5.10.2-web/css/all.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('fontawesome-6/css/all.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize-card.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/image-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/event-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/showevent-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/progressbar.css') }}">




    @livewireStyles

    <!-- Scripts -->

    @wireUiScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>

</head>

<body class="font-raleway antialiased">

    <x-notifications />
    <x-jet-banner />
    @stack('blog-styles')
    <div class="min-h-screen ">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <x-footer />
    </div>

    @stack('modals')

    @livewireScripts
    @stack('flickty-scripts')
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    @stack('donation-script')
    {{-- @stack('script-slider') --}}
    <script src="{{ asset('js/progressbar.js') }}"></script>
    @yield('script')

    @yield('contactScript')
    @yield('contactOrganizerScript')
    @yield('donationFormScript')

</body>

</html>
