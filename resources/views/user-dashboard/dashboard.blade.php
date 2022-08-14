<x-user-dashboard>

    <x-slot name="header">
        {{ __('Dasboard') }}
    </x-slot>


    <div class="flex flex-wrap w-full mt-6">
        <div class="font-sans w-full bg-grey-lighter flex flex-col min-h-screen">
            <div>

                <div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">
                    <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
                        <div class="border-b px-6">
                            <div class="flex justify-between -mb-px">
                                {{-- <div class="lg:hidden text-blue-600 py-4 text-lg">
                                    Your Stats
                                </div> --}}
                                <div class="hidden lg:flex">
                                    <button type="button"
                                        class="appearance-none py-4 text-blue-600 border-b border-blue-500 mr-6">
                                        Your Stats
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="flex md:flex-row flex-col">
                            <div class="w-full md:w-1/3 text-center md:border-0 border-b py-8">
                                <div class="md:border-r">
                                    <div class="text-gray-500 mb-2">
                                        <span class="text-5xl"> 5</span>
                                    </div>
                                    <div class="text-sm uppercase text-grey tracking-wide">
                                        Total Donation Count
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 text-center md:border-0 border-b py-8">
                                <div class="md:border-r">
                                    <div class="text-gray-500 mb-2">
                                        <span class="text-5xl">12</span>
                                    </div>
                                    <div class="text-sm uppercase text-grey tracking-wide">
                                        Profile Views
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 text-center py-8">
                                <div>
                                    <div class="text-gray-500 mb-2">
                                        <span class="text-5xl"><span> &#x20A6;</span>18,000</span>
                                        <span class="text-2xl text-green-400 align-top">Paid</span>
                                    </div>
                                    <div class="text-sm uppercase text-grey tracking-wide">
                                        Total Monthly/Yearly Dues
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
                            <div
                                class=" flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                                <div class="border-b">
                                    <div class="flex justify-between px-6 -mb-px">
                                        <h3 class="text-blue-600 py-4 font-normal text-lg">
                                            Notifications</h3>

                                    </div>
                                </div>
                                <div class=" px-6 py-6 text-gray-500  border-b -mx-4">
                                    <div class="flex gap-4 px-4 flex-row">

                                        <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                                            src="{{ asset('storage/photos/taylor_swift_4.jpg') }}" alt="Person" />

                                        <div class="flex w-full flex-col justify-center ">
                                            <p class="text-sm md:text-lg font-semibold"> Musa Abubakar Izghe </p>
                                            <p class="flex justify-between text-sm tracking-wide text-gray-800">
                                                <span> Posted New Article Titled: <span class="font-semibold">Party
                                                        Politics in Nigeria <a class="text-blue-500"
                                                            href="#">Read</a></span></span> <span
                                                    class="title-font text-sm text-gray-500">7 hours ago</span>
                                            </p>

                                        </div>
                                    </div>

                                </div>
                                <div class=" px-6 py-6 text-gray-500  border-b -mx-4">

                                    <div class="flex gap-4 px-4 flex-row">

                                        <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                                            src="{{ asset('storage/photos/taylor_swift_1.jpg') }}" alt="Person" />

                                        <div class="flex w-full flex-col justify-center ">
                                            <p class="text-sm md:text-lg font-semibold"><span
                                                    class="text-green-500 uppercase">Welcome,</span> Oliver
                                                Aguilerra <span class="text-xs">Class Of 1999</span></p>
                                            <p class="mb-2 text-xs text-gray-800">Product Manager</p>
                                            <p class="flex justify-between text-sm tracking-wide text-gray-800">
                                                <span> Registred as a New Member</span> <span
                                                    class="title-font text-sm text-gray-500">53 minutes ago</span>
                                            </p>

                                        </div>
                                    </div>

                                </div>
                                <div class=" px-6 py-6 text-gray-500  border-b -mx-4">
                                    <div class="flex gap-4 px-4 flex-row">

                                        <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                                            src="{{ asset('storage/photos/taylor_swift_4.jpg') }}" alt="Person" />

                                        <div class="flex w-full flex-col justify-center ">
                                            <p class="text-sm md:text-lg font-semibold"> Adamu Umar Bello </p>
                                            <p class="mb-2 text-xs text-gray-800">Medical Doctor</p>
                                            <p class="flex justify-between text-sm tracking-wide text-gray-800">
                                                <span> Donated : <span class="font-semibold"><span>
                                                            &#x20A6;</span>10,000 to the <a class="text-blue-500"
                                                            href="#">laptop for IDP school
                                                            children </a>Fundraiser</span></span> <span
                                                    class="title-font text-sm text-gray-500">2 hours ago</span>
                                            </p>

                                        </div>
                                    </div>

                                </div>

                                <div class=" px-6 py-6 text-gray-500  border-b -mx-4">

                                    <div class="flex gap-4 px-4 flex-row">

                                        <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                                            src="{{ asset('storage/photos/Taylor_Swift _1.jpg') }}" alt="Person" />

                                        <div class="flex w-full flex-col justify-center ">
                                            <p class="text-sm md:text-lg font-semibold"><span
                                                    class="text-green-500 uppercase">Congratulations!,</span> Elizabeth
                                                Ishaku </p>
                                            <p class="mb-2 text-xs text-indigo-400"> Set Ambassador class
                                                of 2010 </p>
                                            <p class="flex justify-between text-sm tracking-wide text-indigo-500">
                                                <span> Elected as Set Ambassador for class
                                                    of 2010</span> <span class="title-font text-sm text-gray-500">53
                                                    minutes ago</span>
                                            </p>

                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4">
                            <div class="bg-white border-t border-b sm:rounded mb-4 sm:border shadow">
                                <div class="border-b">
                                    <div class="flex justify-between px-6 -mb-px">
                                        <h3 class="text-blue-600 py-4 font-normal text-lg">Browser Sessions</h3>
                                    </div>
                                </div>
                                <div class="px-4 py-4">

                                    <div class="mt-10 sm:mt-0">
                                        @livewire('profile.logout-other-browser-sessions-form')
                                    </div>

                                </div>
                            </div>
                            <div class="w-full flex lg:flex-row gap-4 flex-col ">
                                <div class="bg-white border-t border-b sm:rounded sm:border shadow">
                                    <div class="border-b">
                                        <div class="flex justify-between px-6 -mb-px">
                                            <h3 class="text-blue-600 py-4 font-normal text-lg">Two Factor
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
                                            <h3 class="text-blue-600 py-4 font-normal text-lg">Delete Account
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
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

</x-user-dashboard>
