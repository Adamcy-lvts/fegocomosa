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
    <section class="text-gray-600 body-font border-t border-gray-200">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h2 id="ourmission" class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">Pro
                    Unitate
                </h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Our Mission</h1>
            </div>
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path
                        d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z">
                    </path>
                </svg>
                <p class="leading-relaxed text-sm sm:text-lg">Edison bulb retro cloud bread echo park, helvetica
                    stumptown taiyaki
                    taxidermy 90's cronut +1 kinfolk. Single-origin coffee ennui shaman taiyaki vape DIY tote bag
                    drinking vinegar cronut adaptogen squid fanny pack vaporware. Man bun next level coloring book
                    skateboard four loko knausgaard. Kitsch keffiyeh master cleanse direct trade indigo juice before
                    they sold out gentrify plaid gastropub normcore XOXO 90's pickled cindigo jean shorts. Slow-carb
                    next level shoindigoitch ethical authentic, yr scenester sriracha forage franzen organic drinking
                    vinegar.</p>
                <span class="inline-block h-1 w-10 rounded bg-green-500 mt-8 mb-6"></span>
                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">HOLDEN CAULFIELD</h2>
                <p class="text-gray-500">Senior Product Designer</p>
            </div>
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
                    <div class="p-4 md:w-1/3 ">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col shadow-lg">
                            <div class="flex items-center mb-3">
                                <div
                                    class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-green-600 text-white flex-shrink-0">
                                    <i class="fal fa-calendar-check"></i>
                                </div>
                                <h2 class="text-gray-900 text-sm md:text-lg title-font uppercase font-medium">
                                    {{ $event->title }}
                                </h2>
                            </div>
                            <div class="flex-grow">
                                <div class="flex flex-wrap mb-4 justify-between">
                                    <h1 class="text-4xl md:text-6xl ">{{ presentDay($event->event_date) }}</h1>
                                    <h3 class="text-3xl md:text-5xl ">{{ presentMonth($event->event_date) }}</h3>
                                </div>
                                <h3 class=""></h3>

                                <small class="text-sm md:text-lg">Time: {{ timeFormat($event->event_time) }}</small>
                                <p class="text-sm md:text-lg">Venue: {{ $event->event_venue }}
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
            <div class="slideshow-container lg:w-1/2 w-full  mb-8 lg:mb-0 rounded-lg overflow-hidden">
                @foreach ($projectsimages as $projectImage)
                    <div class="mySlides fade">
                        <div class="numbertext">{{ $projectImage->id }}/{{ $projectsimages->count() }}</div>
                        <img alt="feature" class=" object-center object-cover"
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
                        <p class="leading-relaxed text-sm md:text-base">Blue bottle crucifix vinyl post-ironic four
                            dollar toast
                            vegan taxidermy. Gastropub indxgo juice poutine.</p>
                        <a href="{{ url('projects#completed') }}"
                            class="mt-3 text-green-600 inline-flex items-center">Learn
                            More
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
                        <p class="leading-relaxed text-sm md:text-base">Blue bottle crucifix vinyl post-ironic four
                            dollar toast
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
                        <p class="leading-relaxed text-sm md:text-base">Blue bottle crucifix vinyl post-ironic four
                            dollar toast
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
    <section class="text-gray-600 body-font">


        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-col gap-2 text-center w-full mb-5 sm:mb-20">

                <h2 id="MembershipSteps" class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">
                    Membership Regisration
                    Steps
                </h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">How to
                    Become a Member
                </h1>
            </div>

            <div class="flex flex-wrap w-full ">
                <img class="lg:w-2.5/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-6 block sm:hidden mb-5 sm:mb-0"
                    src="https://dummyimage.com/1200x500" alt="step">
                <div class="lg:w-2.5/5 md:w-1/2 md:pr-10 md:py-6">
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full text-lg font-semibold bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                            <i class="fa-light fa-forward-step"></i>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                                STEP 1</h2>
                            <p class="leading-relaxed">Click on the register button at the top of this page or <a
                                    class="text-blue-500" href="{{ route('register') }}">click here</a> to go to the
                                registration page.</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 text-lg font-semibold rounded-full bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                            <i class="fa-light fa-circle-info"></i>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                                STEP 2</h2>
                            <p class="leading-relaxed">There is four steps in the registration form, first section
                                will require some of your persnal information, second step will require some of your FGC
                                maiduguri information, third step is for your preofessional information, then fourth
                                step for your logins details </p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                                STEP 3</h2>
                            <p class="leading-relaxed">Fill out every required field on the registration form and click
                                on the submit button, the system will logged you in and you will be redirect to a
                                registration success message page</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                            <i class="fa-regular fa-link"></i>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                                STEP 4</h2>
                            <p class="leading-relaxed">After succesfull registration, email verification link will be
                                sent to the email you registered with, go to your email and click
                                on the verification link, this will automatically open the site in your browser and that
                                means your email is verified and now you can access your dashboard.</p>
                        </div>
                    </div>
                    <div class="flex relative">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500 inline-flex items-center justify-center text-white relative z-10">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                <path d="M22 4L12 14.01l-3-3"></path>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                                FINISH</h2>
                            <p class="leading-relaxed">Go to your dashboard there is membership payment section, click
                                on the pay button, choose your payment methd and make the payment, if everything is
                                successful your membership payment will be loaded on your dashboard for the current
                                year. And that's all you have to do to become a member! </p>
                        </div>
                    </div>
                </div>
                <img class="lg:w-2.5/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12 hidden sm:block"
                    src="https://dummyimage.com/1200x500" alt="step">
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

                @foreach ($executives as $members)
                    <div class="p-4 lg:w-1/2">

                        <div
                            class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                            <a href="{{ route('member.profile', $members->user->username) }}">
                                <img alt="team"
                                    class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                                    src="{{ asset($members->user->profile_photo_url ?? '') }}">
                            </a>
                            <div class="flex-grow sm:pl-8">

                                <h2 class="title-font font-medium text-lg text-gray-900"> <a
                                        href="{{ route('member.profile', $members->user->username) }}">{{ ($members->user->first_name ?? '') . ' ' . ($members->user->last_name ?? '') }}
                                    </a>
                                </h2>
                                <h3 class="text-gray-500 mb-3">{{ $members->position }}</h3>
                                <p class="mb-4">DIY tote bag drinking vinegar cronut adaptogen squid fanny
                                    pack
                                    vaporware.</p>
                                <span class="inline-flex">
                                    <a href="https://{{ $members->user->socialMedia->facebook ?? '#' }}"
                                        class="text-gray-500">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://{{ $members->user->socialMedia->twitter ?? '#' }}"
                                        class="ml-2 text-gray-500">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://{{ $members->user->socialMedia->whatsapp ?? '#' }}"
                                        class="ml-2 text-gray-500">
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
@push('script-slider')
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
