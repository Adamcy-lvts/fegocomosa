<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">Fegocomosa Excutives
                </h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon
                    brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard
                    of them.</p>
            </div>

            <div class="flex flex-wrap -m-4">

                @foreach ($positions as $position)
                    <div class="p-4 lg:w-1/2">
                        {{-- {{ dd($position->user->first_name) }} --}}
                        <div
                            class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">

                            <img alt="team"
                                class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                                src="{{ asset($position->user->profile_photo_url ?? '') }}">
                            <div class="flex-grow sm:pl-8">
                                <h2 class="title-font font-medium text-lg text-gray-900"> <a
                                        href="#">{{ ($position->user->first_name ?? '') . ' ' . ($position->user->last_name ?? '') }}
                                    </a>
                                </h2>
                                <h3 class="text-gray-500 mb-3">{{ $position->name }}</h3>
                                <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny
                                    pack
                                    vaporware.</p>
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

        @livewire('contact-us-form')
    </section>

</div>
