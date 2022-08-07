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
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
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
