<form action="{{ route('pay') }}" method="post">
    @csrf
    <div x-cloak>
        {{-- DONATION FORM --}}
        <div id="donateform" class="mb-5" x-data="{ open: false }">
            <div class="mb-4 mt-12">
                <x-button x-on:click="open = ! open" x-text="open ? '{{ __('Donate Now') }}' : '{{ __('Donate Now') }}'"
                    class="w-full  py-2 px-8" green />
            </div>

            <div x-show="open" x-transition.duration.500ms class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                @auth
                    <div class="col-span-1 sm:col-span-2">
                        <x-input label="Full Name" placeholder="Full Name" value="{{ auth()->user()->first_name ?? '' }}"
                            name="fname" />
                        <x-input label="last Name" placeholder="Full Name" value="{{ auth()->user()->last_name ?? '' }}"
                            name="lname" />
                    </div>
                @endauth

                @guest
                    <x-input label="Full Name" placeholder="Full Name" name="fname" />
                    <x-input label="last Name" placeholder="Full Name" name="lname" />
                @endguest

                @auth
                    <x-input label="Email" placeholder="example@mail.com" name="email"
                        value="{{ auth()->user()->email ?? '' }}" />

                    @livewire('component.phone-mask')
                @endauth

                @guest
                    <x-input label="Email" placeholder="example@mail.com" name="email" />

                    @livewire('component.phone-mask')
                @endguest

                @auth
                    <div class="col-span-1 sm:col-span-2">
                        <x-input label="Address" placeholder="Address" name="address"
                            value="{{ auth()->user()->address ?? '' }}" />
                    </div>
                @endauth

                @guest
                    <div class="col-span-1 sm:col-span-2">
                        <x-input label="Address" placeholder="Address" name="address" />
                    </div>
                @endguest

                <div class="col-span-1 sm:col-span-2">
                    @livewire('state-city')
                </div>
                {{-- @livewire('component.currency') --}}
                <div class="col-span-1 sm:col-span-2">
                    <x-input label="Amount" placeholder="amount" name="amount" />
                </div>

                <input type="hidden" name="additional_info">

                <input type="hidden" name="metadata"
                    value="{{ json_encode($array = ['payment_for' => 'donation', 'member_id' => auth()->user()->id ?? '', 'campaign_id' => $campaign->id]) }}">

                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                <div class="col-span-1 sm:col-span-2">
                    <x-textarea label="Comment" placeholder="Comment" />
                </div>
                <div class="col-span-1 sm:col-span-2">
                    <x-button type="submit" label="Donate" class="w-full  py-2 px-8" green />
                </div>
            </div>
        </div>

</form>
