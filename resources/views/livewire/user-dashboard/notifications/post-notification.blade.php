<div>
    <div class=" flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
        <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
                <h3 class="text-blue-600 py-4 font-normal text-sm">
                    New Post</h3>
                <x-button flat label="Mark All As Read" wire:click="markAllAsRead" xs />

            </div>
        </div>
        @php
            $newPostNotification = auth()
                ->user()
                ->unreadNotifications->where('type', 'App\Notifications\NewPostNotification');
        @endphp
        @foreach ($newPostNotification->take(5) as $postNotification)
            <div class=" px-6 py-6 text-gray-500  border-b -mx-4">
                <div class="flex gap-4 px-4 flex-row">

                    <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                        src="{{ asset('storage/' . $postNotification->data['author_profile_photo']) }}" alt="Person" />

                    <div class="flex w-full flex-col justify-center ">
                        <p class="text-sm md:text-lg font-semibold">
                            {{ $postNotification->data['post_author'] }} </p>
                        <p class="flex justify-between text-sm tracking-wide text-gray-800">
                            <span> Posted New Article Titled: <span class="font-semibold"> <a class="text-blue-500"
                                        href="{{ route('posts.show', $postNotification->data['post_slug']) }}">{{ $postNotification->data['post_title'] }}

                                    </a></span></span>
                            <span
                                class="title-font text-sm text-gray-500">{{ Carbon\Carbon::parse($postNotification->data['created_at'])->DiffForHumans() }}</span>
                        </p>

                    </div>
                </div>

            </div>
        @endforeach

    </div>
</div>
