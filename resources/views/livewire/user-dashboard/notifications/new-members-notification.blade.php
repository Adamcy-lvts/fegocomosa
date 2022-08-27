<div>
    <div class=" flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
        <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
                <h3 class="text-blue-600 py-4 font-normal text-sm">
                    New Members</h3>
                <x-button flat label="Mark All As Read" wire:click="markAllAsRead" xs />
            </div>
        </div>

        @php
            $newMemberNotification = auth()
                ->user()
                ->unreadNotifications->where('type', 'App\Notifications\NewRegisteredMember');
        @endphp
        @foreach ($newMemberNotification->take(5) as $notification)
            <div class=" px-6 py-6 text-gray-500  border-b -mx-4">

                <div class="flex gap-4 px-4 flex-row">
                    {{-- {{ dd($notification->data['graduationYear']) }} --}}
                    <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                        src="{{ asset('storage/' . $notification->data['profile_photo']) }}" alt="Person" />

                    <div class="flex w-full flex-col justify-center ">
                        <p class="text-sm md:text-lg font-semibold"><span
                                class="text-green-500 uppercase">Welcome,</span>
                            {{ $notification->data['first_name'] . ' ' . $notification->data['last_name'] }}
                            <span class="text-xs">Class of
                                {{ $notification->data['graduationYear'] }}</span>
                        </p>
                        {{-- <p class="mb-2 text-xs text-gray-800">Product Manager</p> --}}
                        <p class="flex justify-between text-sm tracking-wide text-gray-800">
                            <span>Is our New Member Added to the family</span> <span
                                class="title-font text-sm text-gray-500">{{ Carbon\Carbon::parse($notification->data['created_at'])->DiffForHumans() }}</span>
                        </p>

                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>
