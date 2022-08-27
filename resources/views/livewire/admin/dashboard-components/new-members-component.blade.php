<div>
    <div class="chart-container-header">
        <h2>New Members</h2>
        <span>Today</span>
    </div>

    @foreach ($newMemberNotification->take(5) as $notification)
        <div class="flex gap-4 px-4 mb-4 w-full flex-row">

            <img class=" object-cover object-center flex-shrink-0 w-10 h-10  rounded-full"
                src="{{ asset('storage/' . $notification->data['profile_photo']) }}" alt="Person" />

            <div class="flex w-full flex-col justify-center ">
                <p class="text-xs text-gray-500 md:text-lg font-semibold"></span>
                    <a href="{{ route('member.profile', $notification->data['user_id']) }}">
                        {{ $notification->data['first_name'] . ' ' . $notification->data['last_name'] }}
                    </a>
                    <span class="text-xs align-top">
                        {{ $notification->data['graduationYear'] }}</span>
                </p>

                <p class="flex text-gray-500 justify-between text-xs tracking-wide">
                    <span>Registered to become part of the family</span> <span
                        class="title-font text-xs text-gray-500">{{ Carbon\Carbon::parse($notification->data['created_at'])->DiffForHumans() }}</span>
                </p>

            </div>
        </div>
    @endforeach
</div>
