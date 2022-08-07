<section id="section-1">

    <div class="content-slider">
        <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
        <input type="radio" id="banner2" class="sec-1-input" name="banner">
        <input type="radio" id="banner3" class="sec-1-input" name="banner">
        <input type="radio" id="banner4" class="sec-1-input" name="banner">
        <div class="slider">
            @foreach ($textsSlider as $slider)
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

<section class="text-gray-700 body-font">
    @foreach ($membershipInfo as $meminfo)
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1
                    class=" animate__animated animate__zoomIn animate__slow title-font sm:text-4xl text-3xl mb-4 text-gray-900">
                    {{ $meminfo->h1 }}
                </h1>
                <p class="animate__animated animate__zoomIn animate__slow mb-8 leading-relaxed">
                    {{ $meminfo->info1 }}</p><br>
                <p class="animate__animated animate__zoomIn animate__slow mb-8 leading-relaxed">
                    Already a Member? Sign In</p>

                <div
                    class="animate__animated animate__backInLeft animate__delay-2s animate__slow  flex justify-center mb-10">
                    {{-- <a href="{{ route('login') }}"
                            class="inline-flex text-white bg-green-600 border-0 py-2 px-6 focus:outline-none hover:bg-green-700 rounded text-lg">Sign
                            In</a> --}}
                    <div class="flex gap-3">
                        <x-button href="{{ route('login') }}" lg outline squared positive label="Sign In" />
                        <x-button href="{{ route('register') }}" lg outline squared positive label="Sign Up" />
                    </div>
                    {{-- <a href="{{ route('register') }}"
                            class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Sign
                            Up</a> --}}
                </div>


                <h1
                    class="animate__animated animate__zoomIn animate__slow  title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                    {{ $meminfo->h2 }}
                </h1>
                <p class="animate__animated animate__zoomIn animate__slow  mb-8 leading-relaxed">Benefits
                </p>
                <ul>
                    <li>{{ $meminfo->info2 }}</li>

                </ul>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero"
                    src="https://dummyimage.com/720x600/edf2f7/a5afbd">
                <img class=" text-white p-2 " src="{{ asset('storage/svg_icons/Logo-min.svg') }}" alt="">
            </div>
        </div>
    @endforeach
</section>
@section('script')
    <script>
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
    </script>
@endsection
