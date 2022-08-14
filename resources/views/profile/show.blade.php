<x-user-dashboard>

    <x-slot name="header">
        {{ __('Profile') }}
    </x-slot>

    <div>
        <div class="">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

        </div>
    </div>

</x-user-dashboard>
