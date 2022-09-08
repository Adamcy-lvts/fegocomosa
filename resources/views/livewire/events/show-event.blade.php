<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <h1 class="text-lg md:text-2xl mb-4">{{ $event->title }}</h1>
                <div class="rounded-lg ">
                    <div class="image-slider mb-5" data-carousel>
                        @forelse ($event->images as $image)
                            <div class="carousel-cell">
                                <img alt="content" class="carousel-cell-image block md:w-4/4  w-full"
                                    src="{{ asset('storage/events_images/' . $image->images) }}">
                                <div class="overlay"></div>
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
                                            <h3 class="font-medium text-3xl">Venue:</h3 class="font-medium text-3xl">
                                            <h3 class="font-medium text-3xl">{{ $event->event_venue }}</h3>
                                        </div>

                                        <div class="flex justify-between">
                                            @php
                                                $eventDate = Carbon\Carbon::parse($event->event_date);
                                            @endphp
                                            <h3 class="font-medium text-3xl">Date:</h3>
                                            <h3 class="font-medium text-3xl">{{ $eventDate->format('l, jS F Y') }}</h3>
                                        </div>
                                        <div class="flex justify-between">
                                            <h3 class="font-medium text-3xl">Time:</h3>
                                            <h3 class="font-medium text-3xl">{{ $event->event_time }}</h3>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-4 ">
                                        <div class="flex justify-between">
                                            <h3 class="font-medium text-3xl">Host/Speaker:</h3>
                                            <h3 class="font-medium text-3xl"></h3>
                                        </div>

                                        <div class="flex justify-between">
                                            <h3 class="font-medium text-3xl">Organizer:</h3>
                                            <h3 class="font-medium text-3xl"></h3>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
</div>
