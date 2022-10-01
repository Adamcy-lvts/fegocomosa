@if (auth()->user())
    <form action="{{ route('pay') }}" method="post">
        @csrf
        <div x-cloak>
            {{-- DONATION FORM --}}
            <div id="donateform" class="mb-5" x-data="{ open: false }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Donate Now') }}' : '{{ __('Donate Now') }}'" class="w-full  py-2 px-8"
                        green />
                </div>

                <div x-show="open" x-transition.duration.500ms>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">

                        <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="First Name" placeholder="First Name*" value="{{ auth()->user()->first_name }}"
                            name="fname" />
                        <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="Last Name" placeholder="Last Name*" value="{{ auth()->user()->last_name }}"
                            name="lname" />


                        <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="Email*" placeholder="example@mail.com" name="email"
                            value="{{ auth()->user()->email }}" />

                        @livewire('component.phone-mask')
                    </div>

                    <div>

                        <div class="flex flex-row gap-3 mb-4">

                            <button type="button" value="500"
                                class="button p-4 flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;500</span></button>

                            {{-- x-on:click="amount = '1000'*100; open = !open" --}}
                            <button type="button" value="1000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;1000</span></button>


                            <button type="button" value="5000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;5,000</span></button>
                        </div>
                        <div class="flex flex-row gap-3 mb-4">
                            <button type="button" value="10000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;10,000</span></button>

                            <button type="button" value="20000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;20,000</span></button>

                            <button type="button" value="50000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;50,000</span></button>
                        </div>

                        <div class="col-span-1 sm:col-span-2 mb-4">
                            <x-input type="hidden"
                                class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                x-model.number='amount' name="amount" />

                            <x-input x-show="open" type="number"
                                class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                placeholder="Amount" name="input-amount" x-model.number='amount' id="amount" />
                        </div>
                    </div>

                    <input type="hidden" name="metadata"
                        value="{{ json_encode($array = ['payment_for' => 'donation', 'member_id' => auth()->user()->id ?? '', 'campaign_id' => $campaign->id]) }}">

                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                    <div class="col-span-1 sm:col-span-2 mb-4">
                        <x-textarea class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="Comment" placeholder="Comment" />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-button id="displayAmount" type="submit" label="Donate" class="w-full  py-2 px-8" green />
                    </div>
                </div>
            </div>

    </form>
@else
    <form action="{{ route('pay') }}" method="post">
        @csrf
        <div x-cloak>
            {{-- DONATION FORM --}}
            <div id="donateform" class="mb-5" x-data="{ open: false }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Donate Now') }}' : '{{ __('Donate Now') }}'" class="w-full  py-2 px-8"
                        green />
                </div>

                <div x-show="open" x-transition.duration.500ms>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                        <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="First Name" placeholder="First Name*" name="fname" />
                        <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="Last Name" placeholder="Last Name*" name="lname" />

                        <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="Email*" placeholder="example@mail.com" name="email" />

                        @livewire('component.phone-mask')

                    </div>


                    <div>

                        <div class="flex flex-row gap-3 mb-4">

                            <button type="button" value="500"
                                class="button p-4 flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;500</span></button>

                            {{-- x-on:click="amount = '1000'*100; open = !open" --}}
                            <button type="button" value="1000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;1000</span></button>


                            <button type="button" value="5000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;5,000</span></button>
                        </div>
                        <div class="flex flex-row gap-3 mb-4">
                            <button type="button" value="10000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;10,000</span></button>

                            <button type="button" value="20000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;20,000</span></button>

                            <button type="button" value="50000"
                                class="p-4 button flex-grow border focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded"><span>
                                    &#x20A6;50,000</span></button>
                        </div>

                        <div class="col-span-1 sm:col-span-2 mb-4">
                            <x-input type="hidden"
                                class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                x-model.number='amount' name="amount" />

                            <x-input x-show="open" type="number"
                                class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                                placeholder="Amount" name="input-amount" x-model.number='amount' id="amount" />
                        </div>
                    </div>
                    <input type="hidden" name="metadata"
                        value="{{ json_encode($array = ['payment_for' => 'donation', 'campaign_id' => $campaign->id, 'member_id' => '']) }}">

                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                    {{-- required --}}

                    <div class="col-span-1 sm:col-span-2 mb-4">
                        <x-textarea
                            class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                            label="Comment" placeholder="Comment" />
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <x-button id="displayAmount" type="submit" label="Donate" class="w-full  py-2 px-8"
                            green />
                    </div>

                </div>

    </form>
@endif

@push('donation-script')
    <script>
        $('.button').on("click", function() {
            amount = $(this).val();
            // alert(amount);
            $('input[name=input-amount]').val(amount);
            inputvalue = $('input[name=input-amount]').val();
            // console.log(inputvalue);
            amountInNaira = inputvalue * 100;
            $('input[name=amount]').val(amountInNaira);
            // console.log(amountInNaira);
            reach = amount * 22;
            $('#confirm .amount').text("NGN" + amount);
            $('#check span').text("NGN" + amount);

            $('#displayAmount').text("Donate" + " " + "₦" + inputvalue);

        });

        $('#amount').on("keyup", function() {

            inputvalue = $('input[name=input-amount]').val();

            // console.log(inputvalue);

            amountInNaira = inputvalue * 100;

            $('input[name=amount]').val(amountInNaira);

            // console.log(amountInNaira);

            $('#displayAmount').text("Donate" + " " + "₦" + inputvalue);


        });
    </script>
@endpush
