<div>
    <div class=" flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
        <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
                <h3 class="text-blue-600 py-4 font-normal text-sm">
                    New Set Ambassadors</h3>
                <x-button flat label="Mark All As Read" wire:click="markAllAsRead" xs />
            </div>
        </div>
        @php
            $setAmbassadorNotifications = auth()
                ->user()
                ->unreadNotifications->where('type', 'App\Notifications\NewSetAmbassadorNotification');
            
        @endphp
        @foreach ($setAmbassadorNotifications->take(5) as $ambassadorNotification)
            @php
                
                $newAmbassador = App\Models\User::find($ambassadorNotification->data['user_id']);
                
                if ($newAmbassador) {
                    $ambassadorFullName = $newAmbassador->first_name . ' ' . $newAmbassador->last_name;
                }
                
            @endphp
            <div class=" px-6 py-6 text-gray-500  border-b -mx-4">

                <div class="flex gap-4 px-4 flex-row">

                    <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                        src="{{ asset('storage/' . $newAmbassador->profile_photo_path) }}" alt="Person" />

                    <div class="flex w-full flex-col justify-center ">
                        <p class="text-sm md:text-lg font-semibold"><span
                                class="text-green-500 uppercase">Congratulations!,</span>
                            {{ $ambassadorFullName }} </p>
                        <p class="mb-2 text-xs text-indigo-400"> Set Ambassador class
                            of {{ $ambassadorNotification->data['year'] }} </p>
                        <p class="flex justify-between text-sm tracking-wide text-indigo-500">
                            <span> Elected as Set Ambassador for class
                                of {{ $ambassadorNotification->data['year'] }}</span> <span
                                class="title-font text-sm text-gray-500">{{ Carbon\Carbon::parse($ambassadorNotification->data['created_at'])->DiffForHumans() }}</span>
                        </p>

                    </div>
                </div>

            </div>
        @endforeach

    </div>
</div>
