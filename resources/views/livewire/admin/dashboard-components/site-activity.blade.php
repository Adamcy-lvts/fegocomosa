<div>
    @php
        $loginNotifications = auth()
            ->user()
            ->unreadNotifications->where('type', 'App\Notifications\LoginNotification');
    @endphp

    <div class="flex py-4 items-center pl-4 justify-between">
        <p class="text-xs text-gray-400 font-semibold">Logins Notifications</p>
        <x-button wire:click="markLoginNotesAsRead" mark xs flat label="Mark all as read" />
    </div>


    @foreach ($loginNotifications->sortByDesc('created_at') as $loginNotify)
        @php
            $member = App\Models\User::find($loginNotify->data['user_id']);
        @endphp
        <div class="flex px-4 py-2 flex-row gap-2 items-center">

            <img class=" object-cover object-center flex-shrink-0 w-9 h-9  rounded-full"
                src="{{ asset('storage/' . $member->profile_photo_path) }}" alt="Person" />

            <p class="flex flex-wrap text-gray-500 gap-2 text-xs tracking-wide">
                <span
                    class="font-semibold">{{ $loginNotify->data['first_name'] . ' ' . $loginNotify->data['last_name'] }}
                    logged in</span>
                <span> {{ Carbon\Carbon::parse($loginNotify->data['login_at'])->DiffForHumans() }}</span>
            </p>
        </div>
    @endforeach
    <div class="flex py-4 items-center pl-4 justify-end">

        <x-button wire:click=" deleteLoginNotifications" mark xs flat label="Delete All" />
    </div>



    @php
        $logoutNotifications = auth()
            ->user()
            ->unreadNotifications->where('type', 'App\Notifications\LogoutNotification');
    @endphp


    <div class="flex py-4 items-center pl-4 justify-between">
        <p class="text-xs text-gray-400 font-semibold">Logout Notifications</p>
        <x-button wire:click="markLogoutNotesAsRead" mark xs flat label="Mark all as read" />
    </div>

    @foreach ($logoutNotifications->sortByDesc('created_at') as $logoutNotify)
        @php
            $member = App\Models\User::find($logoutNotify->data['user_id']);
        @endphp
        <div class="flex px-4 py-2 flex-row gap-2 items-center">

            <img class=" object-cover object-center flex-shrink-0 w-9 h-9  rounded-full"
                src="{{ asset('storage/' . $member->profile_photo_path) }}" alt="Person" />


            <p class="flex flex-wrap text-gray-500 gap-2 text-xs tracking-wide">
                <span
                    class="font-semibold">{{ $logoutNotify->data['first_name'] . ' ' . $logoutNotify->data['last_name'] }}
                    logged out</span>
                <span> {{ Carbon\Carbon::parse($logoutNotify->data['logout_at'])->DiffForHumans() }}</span>
            </p>

        </div>
    @endforeach
    <div class="flex py-4 items-center pl-4 justify-end">

        <x-button wire:click=" deleteLogoutNotifications" mark xs flat label="Delete All" />
    </div>


</div>
