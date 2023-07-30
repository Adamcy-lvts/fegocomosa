@props(['projectsimages'])

<section class="text-gray-700 body-font border-t border-gray-200">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-col gap-2 text-center w-full mb-20">
            <a href="{{ route('projects') }}">
                <h2 class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">Check Out All
                    Completed Projects</h2>
            </a>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Learn More About Projects and
                Proposals</h1>
        </div>
        <div class="slideshow-container lg:w-1/2 w-full mb-8 lg:mb-0 rounded-lg overflow-hidden relative">
            @foreach ($projectsimages as $projectImage)
                <div class="mySlides fade">
                    <div class="numbertext">{{ $projectImage->id }}/{{ $projectsimages->count() }}</div>
                    <img alt="{{ $projectImage->caption }}" class="w-full object-cover object-center h-"
                        src="{{ asset('storage/projects_images/' . $projectImage->images) }}">
                    <div class="lg:block lg:top-0 lg:left-0 lg:w-full bg-green-100 py-2 text-green-900 ">
                        <p class="text-center">{{ $projectImage->caption }}</p>
                    </div>
                    <div class="lg:hidden absolute bottom-0 w-full bg-black opacity-50 py-2 text-white">
                        <p class="text-center">{{ $projectImage->caption }}</p>
                    </div>
                </div>
            @endforeach
        
            <!-- Next and previous buttons -->
            <a class="prev absolute bottom-0 left-0 cursor-pointer py-2 px-4 text-white" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next absolute bottom-0 right-0 cursor-pointer py-2 px-4 text-white" onclick="plusSlides(1)">&#10095;</a>
        </div>
        

        <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
            <div class="flex flex-col mb-10 lg:items-start items-center">
                <div
                    class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-5">
                    <i class="fa-thin fa-compass-drafting fa-2xl"></i>
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Completed Projects</h2>
                    <p class="leading-relaxed text-sm md:text-base">Explore our successful completed projects,
                        showcasing innovative solutions and transformative impacts. Discover how our dedicated teams
                        have made a difference in various fields, from education to infrastructure.</p>
                    <a href="{{ url('projects#completed') }}"
                        class="mt-3 text-green-600 inline-flex items-center">Learn More
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
                    <p class="leading-relaxed text-sm md:text-base">Get a glimpse into our ongoing projects that
                        are shaping the future. Witness our dedicated teams in action as they work tirelessly to
                        bring visions to reality, creating sustainable and positive change.</p>
                    <a href="{{ 'project#inprogress' }}"
                        class="mt-3 text-green-600 inline-flex items-center">Learn More
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
                    <p class="leading-relaxed text-sm md:text-base">Discover our exciting proposed projects,
                        envisioned to push boundaries and make a lasting impact. Join us on our journey of exploring
                        new opportunities and ideas that can drive progress and improve communities.</p>
                    <a href="#" class="mt-3 text-green-600 inline-flex items-center">Learn More
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
