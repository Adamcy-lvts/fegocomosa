<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-0 sm:mx-auto">
                <h1 class="text-lg md:text-2xl mb-4">{{ $project->title }}</h1>
                <div class="rounded-lg ">
                    <div class="project-slider" data-carousel>
                        @forelse ($project->images as $image)
                            <div class="carousel-cell">
                                <img alt="content" class="carousel-cell-image block md:w-4/4  w-full"
                                    src="{{ asset('storage/projects_images/' . $image->images) }}">
                                <div></div>
                                <div class="inner">
                                    <h2 class="title">{{ $image->caption }}</h2>
                                </div>
                            </div>
                        @empty
                            <p>No images for this project yet!</p>
                        @endforelse
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:w-2/3 text-center sm:pr-8 sm:py-8">
                            <!-- Project Info -->
                            <h1 class="text-sm md:text-2xl mb-4">Project Details</h1>
                            <div class="flex md:gap-5 flex-col text-left text-sm sm:text-lg">
                                <div class="flex flex-col gap-4 mb-4 md:mb-0 ">
                                    <div class="flex justify-between">
                                        <div class="text-left">Proposed By:</div>
                                        <div class="text-left">{{ $project->proposed_by }}</div>
                                    </div>

                                    @php
                                        $startingDate = Carbon\Carbon::parse($project->starting_date);
                                        $completionDate = Carbon\Carbon::parse($project->completion_date);
                                    @endphp
                                    <div class="flex justify-between">
                                        <div class="text-left">Executed By:</div>
                                        <div class="text-left">{{ $project->executed_by }}</div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>Staring Date:</div>
                                        <div>{{ $startingDate->format('jS F Y') }}</div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-4 ">
                                    <div class="flex justify-between">
                                        <div>Completion Date:</div>
                                        @if ($completionDate)
                                            <div>{{ $completionDate->format('jS F Y') }}</div>
                                        @else
                                            <p>--</p>
                                        @endif

                                    </div>

                                    <div class="flex justify-between">
                                        <div>Budget:</div>
                                        <div><span> &#x20A6;</span>{{ number_format($project->budget) }}</div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div>Status:</div>
                                        <div>{{ $project->status }}</div>
                                    </div>


                                </div>

                                <!--progress bar-->
                                <div class="progress-container mt-4 text-sm sm:text-lg pr-3">
                                    <h4>Progress:</h4>
                                    <div class="progress-bar w-full " data-effect="1"
                                        data-value="{{ $project->progress_indicator }}" data-skill="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div
                            class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="leading-relaxed text-base mb-4">{{ $project->body }}</p>

                            </a>
                        </div>
                    </div>
                </div>
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
</div>
