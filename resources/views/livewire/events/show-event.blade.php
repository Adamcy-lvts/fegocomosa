<div>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid gap-5 row-gap-8 lg:grid-cols-2">
            <div class="flex flex-col justify-center">
                <div class="max-w-xl mb-6">
                    <h2
                        class="max-w-lg mb-3 font-sans text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl sm:leading-none">
                        {{ $event->title }}<br class="hidden md:block" />

                    </h2>

                </div>
                <div class="grid gap-5 row-gap-8 sm:grid-cols-1">
                    <div class="bg-white border-l-4 border-green-600 shadow-sm border-deep-purple-accent-400">
                        <div class="h-full p-5 border border-l-0 rounded-r">
                            {{-- <h6 class="mb-2 font-semibold leading-5">
                                I'll be sure to note that in my log
                            </h6> --}}
                            <div class="flex md:gap-5 flex-col text-sm">
                                <div class="flex flex-col gap-4 mb-4 md:mb-0 ">
                                    <div class="flex justify-between">
                                        <div>Venue</div>
                                        <div>{{ $event->event_venue }}</div>
                                    </div>

                                    <div class="flex justify-between">
                                        @php
                                            $eventDate = Carbon\Carbon::parse($event->event_date);
                                        @endphp
                                        <div>Date</div>
                                        <div>{{ $eventDate->format('l, jS F Y') }}</div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>Time</div>
                                        <div>{{ $event->event_time }}</div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 ">
                                    <div class="flex justify-between">
                                        <div>Host/Speaker</div>
                                        <div></div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div>Organizer</div>
                                        <div></div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div>

                <div class="showevent-slider" data-carousel>
                    @forelse ($event->images as $image)
                        <div class="carousel-cell">
                            <img alt="content" class="carousel-cell-image block object-cover  w-full"
                                src="{{ asset('storage/events_images/' . $image->images) }}">
                            <div class="overlay"></div>
                            <div class="inner">
                                <h2 class="title">{{ $image->caption }}</h2>
                            </div>
                        </div>
                    @empty
                        <p>No images for this event yet!</p>
                    @endforelse

                </div>
                <p class="text-base text-gray-700 md:text-lg">
                    {!! $event->body !!}
                </p>
            </div>

        </div>
    </div>
</div>
