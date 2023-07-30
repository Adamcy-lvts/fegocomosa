@props([])

<section id="becomeamember" class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-col gap-2 text-center w-full mb-5 sm:mb-20">
            <h2 id="MembershipSteps" class="text-xs text-green-600 tracking-widest font-medium title-font mb-1">
                Membership Registration Steps
            </h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">How to Become a Member</h1>
        </div>

        <div class="flex flex-wrap w-full">
            <!-- Image in Mobile View -->
            <img class="lg:w-2.5/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-6 block sm:hidden mb-5 sm:mb-0"
                src="{{ asset('images/placeholder.jpg') }}" alt="step">

            <div class="lg:w-2.5/5 md:w-1/2 md:pr-10 md:py-6">
                <!-- Step 1 -->
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-0.5 bg-green-100 pointer-events-none"></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-10 h-10 rounded-full text-lg font-semibold bg-green-100 text-green-600 inline-flex items-center justify-center relative z-10">
                        <i class="fa-thin fa-arrow-right"></i>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                            STEP 1
                        </h2>
                        <p class="leading-relaxed">
                            Click on the register button or <a class="text-blue-500"
                                href="{{ route('register') }}">click here</a> to go to the registration page.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-0.5 bg-green-100 pointer-events-none"></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-10 h-10 text-lg font-semibold rounded-full bg-green-100 text-green-600 inline-flex items-center justify-center relative z-10">
                        <i class="fa-thin fa-circle-info"></i>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                            STEP 2
                        </h2>
                        <p class="leading-relaxed">
                            Complete the registration form in four simple sections: personal information, FGC
                            Maiduguri
                            details, professional information, and login details.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-0.5 bg-green-100 pointer-events-none"></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 inline-flex items-center justify-center  relative z-10">
                        <i class="fa-thin fa-user"></i>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                            STEP 3
                        </h2>
                        <p class="leading-relaxed">
                            Fill out every required field on the registration form and click on the submit button to
                            register. You will be redirected to a success message page.
                        </p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex relative pb-12">
                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                        <div class="h-full w-0.5 bg-green-100 pointer-events-none"></div>
                    </div>
                    <div
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 inline-flex items-center justify-center  relative z-10">
                        <i class="fa-thin fa-envelope"></i>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                            STEP 4
                        </h2>
                        <p class="leading-relaxed">
                            Check your registered email for the verification link. Click on the link to verify your
                            email and
                            access your dashboard.
                        </p>
                    </div>
                </div>

                <!-- Finish Step -->
                <div class="flex relative">
                    <div
                        class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 text-green-600 inline-flex items-center justify-center  relative z-10">
                        <i class="fa-light fa-circle-check"></i>
                    </div>
                    <div class="flex-grow pl-4">
                        <h2 class="font-medium title-font text-xs sm:text-sm text-gray-900 mb-1 tracking-wider">
                            FINISH
                        </h2>
                        <p class="leading-relaxed">
                            Proceed to the membership payment section on your dashboard. Choose your payment method
                            and make
                            the payment to activate your membership for the current year.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Image in Desktop View -->
            <img class="lg:w-2.5/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12 hidden sm:block"
                src="{{ asset('images/placeholder.jpg') }}" alt="step">
        </div>
    </div>
</section>
