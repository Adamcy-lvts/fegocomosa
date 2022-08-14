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
