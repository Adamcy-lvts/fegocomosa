<div>
    <x-guest-menu />
    @auth
        @livewire('navigation-menu')
    @endauth
    <div class="container mx-auto w-8/12">
        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                    src="{{ asset('storage/svg_icons/Logo-min.svg') }}">
                <div class="text-center lg:w-2/3 w-full">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">What is Fegocomosa ? and
                        What is it about?</h1>
                    <p class="mb-8 leading-relaxed">Meggings kinfolk echo park stumptown DIY, kale chips beard jianbing
                        tousled. Chambray dreamcatcher trust fund, kitsch vice godard disrupt ramps hexagon mustache
                        umami
                        snackwave tilde chillwave ugh. Pour-over meditation PBR&B pickled ennui celiac mlkshk freegan
                        photo
                        booth af fingerstache pitchfork.</p>
                    <div class="flex justify-center gap-2">
                        <x-button label="Register" green href="{{ route('register') }}" />
                        <x-button label="SignIn" outline green href="{{ route('login') }}" />
                    </div>
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">



            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">Fegocomsa Executives</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon
                        brooklyn
                        asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of
                        them.
                    </p>
                </div>
                <div class="flex flex-wrap -m-4">
                    @foreach ($positions as $position)
                        <div class="p-4 lg:w-1/4 md:w-1/2">
                            <div class="h-full flex flex-col items-center text-center">
                                <img alt="team"
                                    class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4"
                                    src="{{ asset($position->user->profile_photo_url) }}">
                                <div class="w-full">
                                    <h2 class="title-font font-medium text-lg text-gray-900">
                                        {{ $position->user->first_name . ' ' . $position->user->last_name }}</h2>
                                    <h3 class="text-gray-500 mb-3">{{ $position->name }}</h3>
                                    <span class="inline-flex">
                                        <a href="#" class="text-gray-500">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-500">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="ml-2 text-gray-500">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">

                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Set Ambassadors</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">You can also foward your suggestions and
                        complain through your set ambassadors, sometimes important info will be pass to your set
                        ambassadors
                    </p>
                </div>

                <div class="flex flex-wrap -m-2">
                    @foreach ($ambassadors as $ambassador)
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">


                            <div class="h-full flex flex-row items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-20 h-20 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="{{ asset($ambassador->user->profile_photo_url) }}">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">
                                        {{ $ambassador->user->first_name . ' ' . $ambassador->user->last_name }}</h2>
                                    {{-- <p class="text-gray-500">Civil Engineer</p> --}}
                                    <p class="text-gray-500">{{ $ambassador->year }} Set Ambassador</p>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </section>

    </div>
</div>
