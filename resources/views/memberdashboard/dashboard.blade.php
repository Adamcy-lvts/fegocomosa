<x-user-dashboard>

    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>


    <div class="flex flex-wrap w-full mt-6">
        <div class="font-sans w-full bg-grey-lighter flex flex-col min-h-screen">
            <div>

                <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
                    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
                        <div class="border-b px-6">
                            <div class="flex justify-between -mb-px">
                                <div class="hidden lg:flex">
                                    <button type="button"
                                        class="appearance-none py-4 text-sm text-blue-600 border-b border-blue-500 mr-6">
                                        Your Stats
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="flex md:flex-row flex-col">
                            @livewire('user-dashboard.stats.donation-count')
                            @livewire('user-dashboard.stats.profile-views')
                            @livewire('user-dashboard.stats.membership-payment')
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 gap-4 flex flex-col">

                            @livewire('user-dashboard.notifications.post-notification')

                            @livewire('user-dashboard.notifications.new-members-notification')

                            @livewire('user-dashboard.notifications.donations-notification')

                        </div>



                        <div class="w-full lg:w-1/2 px-4 ">
                            @if (!auth()->user()->paid())
                                <div class="bg-white border-t border-b sm:rounded mb-4 sm:border shadow">
                                    <div class="border-b">
                                        <div class="flex justify-between px-6 -mb-px">
                                            <h3 class="text-blue-600 py-4 font-normal text-sm">Pay Your Dues
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="px-4 py-4">
                                        @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <p class="mb-4 text-sm">Pay your membership fee/dues for the year
                                            {{ now()->year }}
                                        </p>

                                        <form method="POST" action="{{ route('pay') }}">
                                            @csrf
                                            <div class="flex flex-col  md:flex-row gap-2">
                                                <h1 class="text-2xl sm:text-4xl text-gray-700">Yearly Membership Fee is
                                                    <span>
                                                        &#x20A6;</span>10,000
                                                </h1>
                                                <input type="hidden" name="fname"
                                                    value="{{ auth()->user()->first_name }}">
                                                <input type="hidden" name="lname"
                                                    value="{{ auth()->user()->last_name }}">
                                                <input type="hidden" name="phone"
                                                    value="{{ auth()->user()->phone }}">
                                                <input type="hidden" name="email"
                                                    value="{{ auth()->user()->email }}">
                                                <input type="hidden" name="amount" value="1000000">
                                                <input type="hidden" name="currency" value="NGN">
                                                <input type="hidden" name="metadata"
                                                    value="{{ json_encode($array = ['payment_for' => 'membership', 'member_id' => auth()->user()->id]) }}">


                                                <input type="hidden" name="reference"
                                                    value="{{ Paystack::genTranxRef() }}">


                                                <x-button type="submit" class="w-full sm:w-0 py-2 px-8" green
                                                    label="Pay" />
                                            </div>
                                        </form>
                                        <div class="flex justify-between ">


                                        </div>

                                    </div>
                                </div>
                            @endif
                            <div class="bg-white border-t border-b sm:rounded mb-4 sm:border shadow">
                                <div class="border-b">
                                    <div class="flex justify-between px-6 -mb-px">
                                        <h3 class="text-blue-600 py-4 font-normal text-sm">Browser Sessions</h3>
                                    </div>
                                </div>
                                <div class="px-4 py-4">

                                    <div class="mt-10 sm:mt-0">
                                        @livewire('profile.logout-other-browser-sessions-form')
                                    </div>

                                </div>
                            </div>
                            <div class="w-full flex mb-4 lg:flex-row gap-4 flex-col ">
                                <div class="bg-white border-t border-b sm:rounded sm:border shadow">
                                    <div class="border-b">
                                        <div class="flex justify-between px-6 -mb-px">
                                            <h3 class="text-blue-600 py-4 font-normal text-sm">Two Factor
                                                Authentication
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="px-4 py-4">

                                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                            <div class="mt-10 sm:mt-0">
                                                @livewire('profile.two-factor-authentication-form')
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="bg-white border-t border-b sm:rounded sm:border shadow">
                                    <div class="border-b">
                                        <div class="flex justify-between px-6 -mb-px">
                                            <h3 class="text-blue-600 py-4 font-normal text-sm">Delete Account
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="px-4 py-4">

                                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                            <div class="mt-10 sm:mt-0">
                                                @livewire('profile.delete-user-form')
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @livewire('user-dashboard.notifications.set-ambassadors-notification')
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

</x-user-dashboard>
