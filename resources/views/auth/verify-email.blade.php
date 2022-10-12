<x-guest-layout>





    <!-- REGISTRATION COMPLETED  -->
    <div class="max-w-3xl mx-auto px-4 py-10">
        <div x-show.transition="step === 'complete'">
            <div class="bg-white rounded-lg p-5 sm:p-10 flex items-center shadow justify-between">
                <div>
                    <svg class="animate__animated animate__bounceIn mb-4 sm:h-36 h-24 w-24 sm:w-36 text-green-500 mx-auto"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>

                    <h2 class="text-lg sm:text-2xl mb-4 text-gray-800 text-center font-bold">Registration Successful</h2>

                    <div class="text-gray-600 mb-8">
                        Thanks for registering! Before getting started, could you verify your email address by clicking
                        on the link we just emailed to you? If you didn't receive the email, we will gladly send you
                        another.
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif


                    <div class="mt-4 flex flex-col  sm:flex-row items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div>
                                <x-button
                                    class=" mb-4 sm:mb-0 w-full sm:w-50 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                    label="{{ __('Resend Verification Email') }}" flat type="submit" />
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-button
                                class="w-full sm:w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                                label="{{ __('Log Out') }}" type="submit" flat />
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-guest-layout>
