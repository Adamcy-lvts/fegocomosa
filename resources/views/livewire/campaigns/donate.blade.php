<div>
    {{-- <button wire:click="DonateModal({{ $campaign->id ?? $campaignId }})"
        class="text-white w-full bg-green-500 border-0 py-2 focus:outline-none hover:bg-green-600 rounded text-base">Donate
        Now</button> --}}

    <div x-cloak>
        {{-- DONATION FORM --}}
        <div id="donateform" class="mb-5" x-data="{ open: false }">
            <div class="mb-4 mt-12">
                <x-button x-on:click="open = ! open" x-text="open ? '{{ __('Donate Now') }}' : '{{ __('Donate Now') }}'"
                    class="w-full  py-2 px-8" green />
            </div>

            <div x-show="open" x-transition.duration.500ms class="grid grid-cols-1 sm:grid-cols-2 gap-4">

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
                <div class="col-span-1 sm:col-span-2">
                    <x-button wire:click="Donate" label="Donate" class="w-full  py-2 px-8" wire:loading.attr="disabled"
                        green />
                </div>
            </div>
        </div>
        {{-- FEEDBACK MESSAGE --}}

        <div id="donationFeedback"
            class="hidden bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md"
            role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold"> Thank You! </p>
                    <p class="text-sm"><span class="font-semibold"><span>
                                &#x20A6;</span>{{ $amount }} Donation Receivied!</p>
                </div>
            </div>
        </div>

    </div>
</div>

@section('donationFormScript')
    <script>
        Livewire.on('DonationfeedbackMessage', () => {

            var donationForm = document.getElementById("donateform");
            donationForm.classList.add("animate__animated", "animate__zoomOut");



            setTimeout(function() {
                donationForm.classList.add("hidden", "animate__animated", "animate__zoomOut",
                    "animate__delay-4s");
            }, 1000); //wait 1 seconds


            var feedBack = document.getElementById("donationFeedback");

            feedBack.classList.remove("hidden");

            feedBack.classList.add("animate__animated", "animate__backInUp", "animate__zoomIn",
                "animate__delay-1s");


        })
    </script>
@endsection
