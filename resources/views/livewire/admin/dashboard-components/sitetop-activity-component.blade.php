<div class="chart-container-wrapper big">
    <div class="chart-container">
        <div class="chart-container-header">
            <h2>Top Active Jobs</h2>
            <span>Last 30 days</span>
        </div>



        @foreach ($newPostNotification->take(5) as $postNotification)
            <div class="flex gap-4 px-4 w-full mb-4 flex-row">

                <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                    src="{{ asset('storage/' . $postNotification->data['author_profile_photo']) }}" alt="Person" />

                <div class="flex w-full flex-col justify-center ">
                    <p class="text-sm text-gray-500 md:text-lg font-semibold"></span>
                        {{ $postNotification->data['post_author'] }}

                    </p>

                    <p class="flex justify-between text-xs tracking-wide text-gray-500">
                        <span> Posted New Article Titled: <span
                                class="font-semibold">{{ $postNotification->data['post_title'] }}
                                <a class="text-blue-500"
                                    href="{{ route('posts.show', $postNotification->data['post_slug']) }}">
                                    Read</a></span></span>
                        <span
                            class="title-font text-xs text-gray-500">{{ Carbon\Carbon::parse($postNotification->data['created_at'])->DiffForHumans() }}</span>
                    </p>

                </div>
            </div>
        @endforeach


        @foreach ($setAmbassadorNotes->take(5) as $ambassadorNotification)
            <div class="flex gap-4 px-4 w-full flex-row">

                <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                    src="{{ asset('storage/' . $newAmbassador->profile_photo_path) }}" alt="Person" />

                <div class="flex w-full flex-col justify-center ">
                    <p class="text-sm text-gray-500 md:text-lg font-semibold"></span>
                        {{ $AmbassadorFullName }}

                    </p>
                    <p class="flex justify-between text-xs tracking-wide text-green-500">
                        <span> Elected as Set Ambassador for class
                            of {{ $ambassadorNotification->data['year'] }}</span> <span
                            class="title-font text-xs text-gray-500">{{ Carbon\Carbon::parse($ambassadorNotification->data['created_at'])->DiffForHumans() }}</span>
                    </p>

                </div>
            </div>
        @endforeach
    </div>
</div>
