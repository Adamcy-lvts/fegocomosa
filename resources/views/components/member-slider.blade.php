<section>
    <div class="hero-slider" data-carousel>
        @foreach ($carousel as $slider)
            <div class="carousel-cell"
                style="background-image:url({{ asset('storage/photos/' . $slider->image_background) }});">
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle">{{ $slider->caption_2 }}</h3>
                    <h2 class="title">{{ $slider->caption }}</h2>
                    <a href="{{ $slider->link }}" target="_blank" class="btn">Tell me more</a>
                </div>
            </div>
        @endforeach
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
