<x-guest-layout>
    {{-- <x-jet-authentication-card> --}}
    {{-- <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot> --}}

    <x-jet-validation-errors class="mb-4" />
    <div x-data="app()" x-cloak>
        <div class="max-w-3xl mx-auto px-4 py-10">

            <!-- Top Navigation -->
            <div class="border-b-2 py-4">
                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                    x-text="`Step: ${step} of 4`"></div>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">

                    <div class="flex-1">
                        <div x-show="step === 1">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Profile</div>
                        </div>

                        <div x-show="step === 2">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Fegocomosa Infomation</div>
                        </div>

                        <div x-show="step === 3">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Professional Information
                            </div>
                        </div>

                        <div x-show="step === 4">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Login Details</div>
                        </div>
                    </div>

                    <div class="flex items-center md:w-64">
                        <div class="w-full bg-white rounded-full mr-2">
                            <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                :style="'width: ' + parseInt(step / 4 * 100) + '%'"></div>
                        </div>
                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 4 * 100) +'%'"></div>
                    </div>
                </div>
            </div>
            <!-- /Top Navigation -->



            <!-- PROFILE INFO -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div x-show.transition.in="step === 1">
                    <div class="mb-5 text-center">
                        <div class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                            <img id="image" class="object-cover w-full h-32 rounded-full" :src="image" />
                        </div>

                        <label for="fileInput" type="button"
                            class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path
                                    d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                            Browse Photo
                        </label>

                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add profile picture
                        </div>

                        <input name="photo" id="fileInput" accept="image/*" class="hidden" type="file"
                            @change="let file = document.getElementById('fileInput').files[0];
                            var reader = new FileReader();
                            reader.onload = (e) => image = e.target.result;
                            reader.readAsDataURL(file);">
                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div>
                                    <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                                    <x-jet-input id="firstname" class="block mt-1 w-full" type="text"
                                        name="first_name" :value="old('firstname')" autofocus autocomplete="name" />
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div>
                                    <x-jet-label for="middle_name" value="{{ __('Middle Name') }}" />
                                    <x-jet-input id="middlename" class="block mt-1 w-full" type="text"
                                        name="middle_name" :value="old('middlename')" autofocus autocomplete="name" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap">

                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div class="mt-4">
                                    <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                                    <x-jet-input id="lastname" class="block mt-1 w-full" type="text"
                                        name="last_name" :value="old('lastname')" />
                                </div>
                            </div>
                        </div>


                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div class="mt-4">
                                    <x-jet-label for="dateofbirth" value="{{ __('Date of Birth') }}" />
                                    <x-jet-input id="dateofbirth" class="block mt-1 w-full" type="date"
                                        name="date_of_birth" :value="old('dateofbirth')" />
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex flex-wrap">


                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div class="mt-4">
                                    <x-jet-label for="address" value="{{ __('Address') }}" />
                                    <x-jet-input id="address" class="block mt-1 w-full" type="text"
                                        name="address" :value="old('address')" />
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div class="mt-4">
                                    <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
                                    <x-jet-input id="phone" class="block mt-1 w-full" type="text"
                                        name="phone" :value="old('address')" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex flex-wrap">

                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div class="mt-4">
                                    <x-jet-label for="gender" value="{{ __('Gender') }}" />
                                    <select id="gender-id" name="gender_id"
                                        class="border-0 px-3 py-3  rounded text-sm shadow focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100  w-full ">
                                        <option value="" disabled selected>--Select Gender--</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-6/12 px-2">
                            <div class="relative w-full mb-3">
                                <div class="mt-4">
                                    <x-jet-label for="maritalstatus" value="{{ __('Marital Status') }}" />
                                    <select id="marital-status" name="marital_status_id"
                                        class="border-0 px-3 py-3  rounded text-sm shadow focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100  w-full ">
                                        <option value="" disabled selected>--Select Marital Status--</option>
                                        @foreach ($marital_statuses as $marital_status)
                                            <option value="{{ $marital_status->id }}">
                                                {{ $marital_status->marital_status }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    @livewire('state-city')

                </div> <!-- step 1 ending -->

                <!-- FEGOCOMOSA INFO -->
                <div x-show.transition.in="step === 2">

                    <div>
                        <x-jet-label for="year_of_entry" value="{{ __('  Year of Entry') }}" />
                        <x-jet-input id="yearofentry" class="block mt-1 w-full" type="date" name="year_of_entry"
                            :value="old('year_of_entry')" autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="year_of_graduation" value="{{ __('Year of Graduation') }}" />
                        <x-jet-input id="yearofgraduation" class="block mt-1 w-full" type="date"
                            name="graduation_year_id" :value="old('graduation_year_id')" autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="jss_class" value="{{ __('Jss Class') }}" />
                        <x-jet-input id="jssclass" class="block mt-1 w-full" type="text" name="jss_class"
                            :value="old('jss_class')" autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="sss_class" value="{{ __(' Sss Class') }}" />
                        <x-jet-input id="sssclass" class="block mt-1 w-full" type="text" name="sss_class"
                            :value="old('sss_class')" autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="addmission_number" value="{{ __('Addmission Number') }}" />
                        <x-jet-input id="addmission-number" class="block mt-1 w-full" type="text"
                            name="admission_number" :value="old('admission_number')" autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-jet-label for="house" value="{{ __('House') }}" />
                        <select id="house" name="house_id"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            {{-- <option value="" disabled selected>--Select House--</option> --}}
                            @foreach ($houses as $house)
                                <option value="{{ $house->id }}">{{ $house->name }}</option>
                            @endforeach

                        </select>
                    </div>


                </div><!-- END OF STEP 2 -->



                <!-- PROFESIONAL INFO -->
                <div x-show.transition.in="step === 3">

                    <div class="mb-5">

                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Profession
                        </label>
                        <input type="text" name="profession"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="">
                    </div>

                    <div class="mb-5">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Profession Category
                        </label>

                        <select name="profession_category" id="profession-category-id"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            <option value="" disabled selected>--Select Profession Category--</option>
                            @foreach ($proCategories as $proCategory)
                                <option value="{{ $proCategory->id }}">{{ $proCategory->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Work Place
                        </label>

                        <input type="text" name="workplace"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="">
                    </div>

                    <div class="mb-5">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            University Attended
                        </label>

                        <input type="text" name="university"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="">
                    </div>

                    <div class="mb-5">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Course of Study
                        </label>

                        <input type="text" name="course_of_study"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="">
                    </div>

                    <div class="mb-5">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            Potriate Image
                        </label>

                        <input type="file" name="potrait_image"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="">
                    </div>
                </div><!-- End of Step 3 -->


                <!-- LOGIN DETAILS -->
                <div x-show.transition.in="step === 4">
                    <div class="mb-5">



                        <div>
                            <x-jet-label for="name" value="{{ __('UserName') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="username"
                                :value="old('username')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                    </div>

                    <!-- / Step Content -->
                </div>



                <!-- Bottom Navigation -->
                <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
                    <div class="max-w-3xl mx-auto px-4">
                        <div class="flex justify-between">
                            <div class="w-1/2">
                                <button type="button" x-show="step > 1" @click="step--"
                                    class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Previous</button>
                            </div>

                            <div class="w-1/2 text-right">
                                <button type="button" x-show="step < 4" @click="step++"
                                    class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Next</button>

                                <x-jet-button x-show="step === 4"
                                    class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                                    Complete</x-jet-button>

                                {{-- <x-jet-button class="ml-4">
                    {{ __('Register') }}
                         </x-jet-button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->

            </form>

        </div>
    </div>
    {{-- </x-jet-authentication-card> --}}
</x-guest-layout>
