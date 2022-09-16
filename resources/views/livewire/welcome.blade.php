<div>

    <section id="section-1">

        <div class="content-slider">
            <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
            <input type="radio" id="banner2" class="sec-1-input" name="banner">
            <input type="radio" id="banner3" class="sec-1-input" name="banner">
            <input type="radio" id="banner4" class="sec-1-input" name="banner">
            <div class="slider">
                @foreach ($textsslider as $slider)
                    <div id="{{ $slider->banner_id }}" class="banner">

                        <div class="banner-inner-wrapper ">
                            <h2>{{ $slider->caption }}</h2>
                            <div class="md:w-1/2 sm:mx-auto">
                                <h1>{{ $slider->title }}</h1>
                            </div>
                            <div class="line"></div>

                            <x-button href="{{ $slider->link1 }}" squared lg outline green label="Learn More" />

                        </div>

                    </div>
                @endforeach

            </div>
            <nav>

                <div class="controls">
                    <label for="banner1"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span>01</span> Welcome</label>
                    <label for="banner2"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span>02</span> Our Mission</label>
                    <label for="banner3"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span>03</span> About Us</label>
                    <label for="banner4"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span>04</span> Membership</label>
                </div>
            </nav>
        </div>

    </section>

    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class=" container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">Check Out All Previous
                    Events</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Learn More About Upcoming Events
                </h1>
            </div>
            <div class="animate__animated animate__slideInRight animate__slower flex flex-wrap -m-4">
                @foreach ($events as $event)
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-green-600 text-white flex-shrink-0">
                                    <i class="fal fa-calendar-check"></i>
                                </div>
                                <h2 class="text-gray-900 text-lg title-font font-medium">{{ $event->title }}</h2>
                            </div>
                            <div class="flex-grow">
                                <div class="flex mb-4 justify-between">
                                    <h1 class="text-6xl ">{{ presentDay($event->event_date) }}</h1>
                                    <h3 class="text-5xl ">{{ presentMonth($event->event_date) }}</h3>
                                </div>
                                <h3 class=""></h3>

                                <small class="text-lg">Time: {{ timeFormat($event->event_time) }}</small>
                                <p class="text-lg">Venue: {{ $event->event_venue }}
                                </p>
                                <a class="mt-3 text-green-600 inline-flex items-center">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                        viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-col gap-2 text-center w-full mb-20">
                <a href="{{ route('projects') }}">
                    <h2 class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">Check Out All
                        Completed
                        Projects</h2>
                </a>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Learn More About Projects and
                    Proposals
                </h1>
            </div>
            <div class="slideshow-container lg:w-1/2 w-full mb-8 lg:mb-0 rounded-lg overflow-hidden">
                @foreach ($projectsimages as $projectImage)
                    <div class="mySlides fade">
                        <div class="numbertext">{{ $projectImage->id }}/{{ $projectsimages->count() }}</div>
                        <img alt="feature" class="object-cover object-center h-full w-full"
                            src="{{ asset('storage/projects_images/' . $projectImage->images) }}">

                        <div class="text">{{ $projectImage->caption }}</div>

                    </div>
                @endforeach

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>


            <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                <div class="flex flex-col mb-10 lg:items-start items-center">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5">

                        <i class="fa-thin fa-compass-drafting fa-2xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Completed Projects</h2>
                        <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast
                            vegan taxidermy. Gastropub indxgo juice poutine.</p>
                        <a class="mt-3 text-green-600 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col mb-10 lg:items-start items-center">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5">
                        <i class="fa-thin fa-badge-percent fa-2xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Projects In Progress</h2>
                        <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast
                            vegan taxidermy. Gastropub indxgo juice poutine.</p>
                        <a class="mt-3 text-green-600 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col mb-10 lg:items-start items-center">
                    <div
                        class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5">
                        <i class="fa-thin fa-pen-nib fa-2xl"></i>
                    </div>
                    <div class="flex-grow">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Proposed Projects</h2>
                        <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast
                            vegan taxidermy. Gastropub indxgo juice poutine.</p>
                        <a class="mt-3 text-green-600 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Find Fegomite by
                    Professional
                    Category</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-base">Fegocomosa has wide a range professionals and
                    Businnes Moguls working from all over the world</p>
            </div>

            <div class="flex flex-wrap -m-4">
                @foreach ($procategory as $category)
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <a href="{{ route('category', $category->slug) }}">

                            <div class="border border-gray-300 p-6 rounded-lg">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-4">
                                    <i class="{{ $category->icon }} fa-2xl"></i>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $category->name }}
                                </h2>
                                <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist
                                    co,
                                    subway
                                    tile poke farm.</p>
                            </div>
                    </div>
                @endforeach

            </div>

        </div>
        <div class="mx-auto container flex justify-center">
            <x-button green href="{{ route('category.index') }}" label="Checkout more Professional Categories" />
        </div>



    </section>
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

                        <div
                            class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                            <a href="{{ route('member.profile', $position->user->id) }}">
                                <img alt="team"
                                    class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                                    src="{{ asset($position->user->profile_photo_url ?? '') }}">
                            </a>
                            <div class="flex-grow sm:pl-8">
                                <a href="{{ route('member.profile', $position->user->id) }}">
                                    <h2 class="title-font font-medium text-lg text-gray-900"> <a
                                            href="#">{{ ($position->user->first_name ?? '') . ' ' . ($position->user->last_name ?? '') }}
                                        </a>
                                    </h2>
                                </a>
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
            @livewire('contact-us-form')
        </div>


    </section>

</div>
@push('script')
    <script>
        window.addEventListener('load', () => {
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                slides[slideIndex - 1].style.display = "block";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }

            ///// Section-1 CSS-Slider /////
            // Auto Switching Images for CSS-Slider
            function bannerSwitcher() {
                next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
                if (next.length) next.prop('checked', true);
                else $('.sec-1-input').first().prop('checked', true);
            }

            var bannerTimer = setInterval(bannerSwitcher, 5000);

            $('nav .controls label').click(function() {
                clearInterval(bannerTimer);
                bannerTimer = setInterval(bannerSwitcher, 5000)
            });
        });
    </script>
@endpush
