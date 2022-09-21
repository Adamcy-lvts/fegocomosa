<div>
    <section class="text-gray-600 body-font">
        <div class="container md:w-8/12 px-5 py-24 mx-auto flex flex-col">
            {{-- <div class="lg:w-4/6 mx-auto"> --}}
            <h1 class="text-lg md:text-2xl mb-4">{{ $event->title }}</h1>
            <div class="rounded-lg ">
                <div class="showevent-slider mb-5" data-carousel>
                    @forelse ($event->images as $image)
                        <div class="carousel-cell">
                            <img alt="content" class="carousel-cell-image block md:w-4/4  w-full"
                                src="{{ asset('storage/events_images/' . $image->images) }}">
                            <div></div>
                            {{-- <div class="inner">
                                    <h2 class="title">{{ $image->caption }}</h2>
                                </div> --}}
                        </div>
                    @empty
                        <p>No images for this event yet!</p>
                    @endforelse
                </div>
                <div class="grid gap-5 row-gap-8 sm:grid-cols-1">
                    <div class="bg-white border-l-4 border-green-600 shadow-sm border-deep-purple-accent-400">
                        <div class="h-full p-5 border border-l-0 rounded-r">
                            <div class="flex md:gap-5 flex-col text-sm">
                                <div class="flex flex-col gap-4 mb-4 md:mb-0 ">
                                    <div class="flex justify-between">
                                        <h3 class="font-medium text-sm md:text-3xl mr-2">Venue:</h3>
                                        <h3 class="font-medium text-sm md:text-3xl">{{ $event->event_venue }}</h3>
                                    </div>

                                    <div class="flex justify-between">
                                        @php
                                            $eventDate = Carbon\Carbon::parse($event->event_date);
                                        @endphp
                                        <h3 class="font-medium text-sm md:text-3xl mr-2">Date:</h3>
                                        <h3 class="font-medium text-sm md:text-3xl">
                                            {{ $eventDate->format('l, jS F Y') }}
                                        </h3>
                                    </div>
                                    <div class="flex justify-between">
                                        <h3 class="font-medium text-sm md:text-3xl mr-2">Time:</h3>
                                        <h3 class="font-medium text-sm md:text-3xl">{{ $event->event_time }}</h3>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 ">
                                    <div class="flex justify-between">
                                        <h3 class="font-medium text-sm md:text-3xl mr-2">Host/Speaker:</h3>
                                        <h3 class="font-medium text-sm md:text-3xl"></h3>
                                    </div>

                                    <div class="flex justify-between">
                                        <h3 class="font-medium text-sm md:text-3xl mr-2">Organizer:</h3>
                                        <h3 class="font-medium text-sm md:text-3xl"></h3>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- </div> --}}
        </div>
    </section>
    @push('flickty-scripts')
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
            });
            // HERO SLIDER
        </script>
    @endpush
</div>
