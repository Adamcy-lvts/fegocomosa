<section class="text-gray-700 body-font border-t border-gray-200">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-col gap-2 text-center w-full mb-20">
            <a href="{{ route('projects.index') }}">
                <h2 class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">Check Out All Completed
                    Projects</h2>
            </a>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Learn More About Projects and
                Proposals
            </h1>
        </div>
        <div class="slideshow-container lg:w-1/2 w-full mb-8 lg:mb-0 rounded-lg overflow-hidden">
            @foreach ($projectImages as $projectImage)
                <div class="mySlides fade">
                    <div class="numbertext">{{ $projectImage->id }}/{{ $projectImages->count() }}</div>
                    <img alt="feature" class="object-cover object-center h-full w-full"
                        src="{{ asset('storage/photos/' . $projectImage->images) }}">
                    {{-- {{ dd($projectImage) }} --}}
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
