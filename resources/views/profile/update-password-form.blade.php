<x-slot name="header">
    {{ __('Password') }}
</x-slot>
<x-jet-form-section submit="updatePassword">
    <div class="flex flex-wrap">
        <div>
            <x-slot name="title">
                {{ __('Update Password') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </x-slot>
        </div>

        <div>
            <x-slot name="form">
                <div class="grid grid-cols-1  gap-6">
                    <x-input type="password" label="Current Password" placeholder="Current Password"
                        wire:model.defer="state.current_password" />
                    <x-input type="password" label="New Password" placeholder="New Password"
                        wire:model.defer="state.password" />
                    <x-input type="password" label="Confirm Password" placeholder="Confirm Password"
                        wire:model.defer="state.password_confirmation" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                {{-- <x-jet-button>
                    {{ __('Save') }}
                </x-jet-button> --}}
                <x-button type="submit" label="Save" wire:loading.attr="disabled" primary />
            </x-slot>

        </div>
    </div>
</x-jet-form-section>
