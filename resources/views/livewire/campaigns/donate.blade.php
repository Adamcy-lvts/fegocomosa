<div>
    <button wire:click="DonateModal({{ $campaign->id ?? $campaignId }})"
        class="text-white w-full bg-green-500 border-0 py-2 focus:outline-none hover:bg-green-600 rounded text-base">Donate
        Now</button>



    <x-modal.card title="Donation" blur wire:model="showDonationForm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div class="col-span-1 sm:col-span-2">
                <x-input label="Full Name" placeholder="Full Name" wire:model.defer="fullName" />
            </div>

            <x-input label="Email" placeholder="example@mail.com" wire:model.defer="email" />

            <x-inputs.phone mask="(###)-####-####" label="Phone" placeholder="Phone" wire:model.defer="phone" />
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Address" placeholder="Address" wire:model.defer="address" />
            </div>
            <x-native-select label="State" placeholder="State" wire:model="selectedState">

                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach

            </x-native-select>

            <x-native-select label="City" placeholder="City" wire:model="selectedCity">
                @if (!is_null($cities))
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                @endif
            </x-native-select>
            <div class="col-span-1 sm:col-span-2">
                <x-inputs.currency label="Amount" placeholder="Amount" wire:model.lazy="currency" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-textarea label="Comment" placeholder="Comment" wire:model.defer="comment" />
            </div>

        </div>
        {{-- {{ dd($campaign->id) }} --}}
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    @if ($donationId)
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="Update" label="Update" wire:loading.attr="disabled" primary />
                        </div>
                    @else
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="Donate" label="Donate" wire:loading.attr="disabled" primary />
                        </div>
                    @endif

                </div>
            </div>

        </x-slot>
    </x-modal.card>
</div>
