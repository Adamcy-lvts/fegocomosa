<div>
    <section>
        <div class="event-slider" data-carousel>
            @foreach ($upComingEvents as $event)
                <div class="carousel-cell">
                    <img alt="content" class="carousel-cell-image block md:w-4/4  w-full"
                        src="{{ asset('storage/photos/' . $event->image) }}">
                    <div class="overlay"></div>
                    <div class="inner">
                        <h2 class="title">Up Coming Event</h2>


                        <div class="flex flex-col justify-center md:flex-row gap-2 w-2/3 sm:w-full">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 407.061 594"
                                    class="hidden md:block w-5 sm:w-7 fill-gray-100 hover:fill-green-600">
                                    <g>
                                        <path
                                            d="M269.579 206.276c0-36.487-29.58-66.05-66.042-66.05-36.474 0-66.042 29.563-66.042 66.05 0 36.471 29.568 66.034 66.042 66.034 36.462 0 66.042-29.563 66.042-66.034zM263.124 525.028c-15.166 16.068-28.266 28.804-37.352 37.347-6.318 5.933-13.922 9.065-22.004 9.065-5.859 0-14.687-1.709-23.382-9.92-8.904-8.395-21.643-20.83-36.435-36.492-31.503 6.608-52.457 18.299-52.457 31.625 0 20.625 50.161 37.347 112.042 37.347 61.871 0 112.031-16.722 112.031-37.347 0-13.326-20.945-25.007-52.443-31.625z" />
                                        <path
                                            d="M166.996 521.354c.008 0 .014.005.024.01 1.305 1.345 2.582 2.663 3.834 3.939.211.211.406.406.617.612a412.664 412.664 0 0 0 2.975 3.016c.295.307.593.602.889.896.915.918 1.813 1.819 2.692 2.695.243.231.475.475.712.701a573.742 573.742 0 0 0 6.259 6.159c.261.259.517.496.772.744.673.664 1.34 1.302 1.983 1.919.319.316.643.622.957.918.604.585 1.184 1.134 1.75 1.682.269.259.541.518.807.765.788.749 1.55 1.482 2.275 2.162.812.76 1.64 1.43 2.471 1.999.261.206.546.321.822.501.551.348 1.107.696 1.667.954.34.158.672.237 1.021.369.493.19.997.396 1.508.512.354.101.707.116 1.068.164.48.073.962.163 1.437.168.082 0 .163.032.232.032.377 0 .744-.085 1.115-.116.336-.031.673-.048 1.002-.105.47-.095.941-.259 1.406-.406.301-.105.614-.169.92-.301.512-.216 1.023-.517 1.514-.812.242-.147.501-.248.743-.401a19.812 19.812 0 0 0 2.167-1.729c.75-.701 1.541-1.455 2.363-2.241.174-.152.348-.332.517-.485.728-.69 1.487-1.402 2.257-2.151.148-.143.279-.274.433-.427a768.2 768.2 0 0 0 9.798-9.545c.037-.042.074-.085.115-.121a941 941 0 0 0 11.586-11.718c.117-.121.227-.243.354-.358h-.006c58.578-60.376 167.01-188.604 167.01-310.511C407.061 94.4 311.407 0 203.536 0 95.665 0 0 94.4 0 210.843c0 121.9 108.422 250.13 166.996 310.511zM94.007 206.276c0-60.492 49.032-109.529 109.529-109.529 60.478 0 109.517 49.038 109.517 109.529 0 60.486-49.039 109.524-109.517 109.524-60.497 0-109.529-49.038-109.529-109.524z" />
                                    </g>
                                </svg>
                            </div>
                            <h3 class="subtitle">{{ $event->event_venue }}</h3>
                        </div>


                        @php
                            $eventDate = Carbon\Carbon::parse($event->event_date);
                            $eventTime = Carbon\Carbon::parse($event->event_time);
                        @endphp

                        <h2 class="title">{{ $event->title }}</h2>
                        <h3 class="subtitle">{{ $eventDate->format('l jS \\of F Y') }}</h3>
                        <h3 class="subtitle">{{ $eventTime->format('h:i A') }}</h3>
                        <a href="{{ route('show.event', $event->slug) }}" target="_blank" class="btn">More
                            Details</a>
                    </div>


                </div>
            @endforeach

        </div>

    </section>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col mb-6 lg:justify-between lg:flex-row md:mb-8">
            <h2
                class="max-w-lg mb-5 font-sans text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl sm:leading-none md:mb-6 group">
                Check Recent Events
                <div
                    class="h-1 ml-auto duration-300 origin-left transform bg-deep-purple-accent-400 scale-x-30 group-hover:scale-x-100">
                </div>
            </h2>
            <p class="text-gray-700 lg:text-sm lg:max-w-md">
                "Catch up with the most recent event images "
            </p>
        </div>
        <div class="grid gap-6 row-gap-5 mb-8 lg:grid-cols-4 sm:row-gap-6 sm:grid-cols-2">
            @forelse ($recentEvents as $event)
                <a href="{{ route('show.event', $event->slug) }}" aria-label="View Item">
                    <div
                        class="relative overflow-hidden transition duration-200 transform rounded shadow-lg hover:-translate-y-2 hover:shadow-2xl">
                        <img class="object-cover w-full h-56 md:h-64 xl:h-80"
                            src="{{ asset('storage/photos/' . $event->image) }}" alt="" />
                        <div class="absolute inset-x-0 bottom-0 px-6 py-4 bg-black bg-opacity-75">
                            <h1 class="text-sm font-medium tracking-wide text-white">
                                {{ $event->title }}
                            </h1>
                            <h3 class="text-sm font-medium tracking-wide text-white">
                                {{ $event->venue }}
                            </h3>
                            @php
                                $recentEventDate = Carbon\Carbon::parse($event->event_date);
                            @endphp
                            <h3 class="text-sm font-medium tracking-wide text-white">
                                {{ $recentEventDate->toFormattedDateString() }}
                            </h3>
                        </div>
                    </div>
                </a>
            @empty

                <p>There are no recent events!</p>
            @endforelse

        </div>
    </div>
</div>
