<div>
    <section>
        <div class="hero-slider" data-carousel>
            @foreach ($carousel as $slider)
                <div class="carousel-cell">
                    <img alt="content" class="carousel-cell-image block md:w-4/4  w-full"
                        src="{{ asset('images/' . $slider->feature_image) }}">
                    <div class="overlay"></div>
                    <div class="inner">
                        <h3 class="subtitle">{{ $slider->caption }}</h3>
                        <h2 class="title">{{ $slider->title }}</h2>
                        <a href="{{ $slider->link }}" target="_blank" class="btn">Tell me more</a>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <x-event-info-section :events="$events" />

    <x-project-info-section :projectsimages="$projectsimages" />
   
    <x-professional-category-section :procategory="$procategory" />
    

    <x-executive-member-card :members="$executives" />

</div>
@section('script')
    <script>
        window.addEventListener('load', () => {
            var options = {
                accessibility: true,
                prevNextButtons: true,
                wrapAround: true,
                pauseAutoPlayOnHover: false,
                pageDots: true,
                setGallerySize: false,
                autoPlay: true,
                imagesLoaded: true,
                arrowShape: {
                    x0: 10,
                    x1: 60,
                    y1: 50,
                    x2: 60,
                    y2: 45,
                    x3: 15
                }
            };

            var carousel = document.querySelector('[data-carousel]');
            var slides = document.getElementsByClassName('carousel-cell');
            var flkty = new Flickity(carousel, options);

            flkty.on('scroll', function() {
                flkty.slides.forEach(function(slide, i) {
                    var image = slides[i];
                    var x = (slide.target + flkty.x) * -1 / 3;
                    image.style.backgroundPosition = x + 'px';
                });
            });

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
@endsection
