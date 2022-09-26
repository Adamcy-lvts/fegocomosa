<x-guest-layout>

    <div x-data="app()" x-cloak class="w-full md:w-7/12 mx-auto px-4 sm:px-0 py-24">
        <h1 class="text-xl ml-2 uppercase pb-12" x-text="`Registeration Step: ${step} of 4`"></h1>


        <x-card title="Membership Registration" padding="false">
            <x-slot name="action">
                <p class="text-sm">
                    Already Registered? <a class="text-blue-500" href="{{ route('login') }}">Login</a>
                </p>
            </x-slot>
            <!-- Navigation indicator -->
            <x-errors class="mb-4" />

            <div class="border-b mb-4 p-4">
                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                    x-text="`Step: ${step} of 4`"></div>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">

                    <div class="flex-1">
                        <div x-show="step === 1">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Personal Information</div>
                        </div>

                        <div x-show="step === 2">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Fegocomosa Inforamtion</div>
                        </div>

                        <div x-show="step === 3">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Profesional Inforamtion
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

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="p-4" x-show.transition="step === 1">

                    <div class="flex justify-center mx-auto w-full">
                        <input id="avatar" type="file" class="filepond w-40 h-40" name="photo"
                            accept="image/png, image/jpeg, image/gif, image/jpg " />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <x-input name="first_name" :value="old('first_name')" label="First Name" placeholder="First Name" />

                        <x-input name="last_name" :value="old('last_name')" label="Last Name" placeholder="Last Name" />


                        <x-input name="middle_name" :value="old('middle_name')" label="Middle Name" placeholder="Middle Name" />

                        <x-input label="Birthdate" type="date" placeholder="Birthdate" name="date_of_birth"
                            :value="old('date_of_birth')" />



                        <x-native-select name="gender_id" :value="old('gender_id')" label="Gender" placeholder="Gender">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                            @endforeach
                        </x-native-select>

                        <x-native-select name="marital_status_id" :value="old('marital_status_id')" label="Marital Status"
                            placeholder="Marital Status">
                            @foreach ($marital_statuses as $marital_status)
                                <option value="{{ $marital_status->id }}">{{ $marital_status->marital_status }}
                                </option>
                            @endforeach
                        </x-native-select>

                        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-7 sm:gap-5 ">
                            <div class="col-span-1 sm:col-span-4 sm:mb-0 mb-5">
                                <x-input name="address" :value="old('address')" label="Address" placeholder="Address" />
                            </div>

                            <div class="col-span-1 sm:col-span-3">
                                @livewire('component.phone-mask')
                            </div>
                        </div>

                        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-1 ">
                            @livewire('state-city')
                        </div>

                    </div>

                </div><!-- step 1 ending -->

                {{-- STEP 2 FEGOCOMSA INFO --}}
                <div class="p-4" x-show.transition="step === 2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-2 sm:gap-6">
                            <x-input type="date" class="sm:mb-0 mb-4" label="Entry Year" placeholder="Entry Year"
                                name="entry_year_id" :value="old('entry_year_id')" />

                            <x-input type="date" label="Graduation Year" placeholder="Graduation Year"
                                name="graduation_year_id" :value="old('graduation_year_id')" />
                        </div>

                        <x-input label="Jss Class" placeholder="Jss Class" name="jss_class" :value="old('jss_class')" />

                        <x-input label="Sss Class" placeholder="Sss Class" name="sss_class" :value="old('sss_class')" />

                        <x-input label="Admission Number" placeholder="Admission Number" name="admission_number"
                            :value="old('admission_number')" />

                        <x-native-select name="house_id" :value="old('house_id')" label="House" placeholder="House">
                            @foreach ($houses as $house)
                                <option value="{{ $house->id }}">{{ $house->name }}</option>
                            @endforeach
                        </x-native-select>
                    </div>
                </div><!-- step 2 ending -->

                {{-- STEP 3 PROFESSION INFO --}}
                <div class="p-4" x-show.transition="step === 3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <x-input name="profession" label="Profession" placeholder="Profession" :value="old('profession')" />
                        <x-input name="workplace" label="Workplace" placeholder="Workplace" :value="old('workplace')" />

                        <x-native-select name="profession_category" label="Profession Category"
                            placeholder="Profession Category">
                            @foreach ($proCategories as $categories)
                                <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                            @endforeach
                        </x-native-select>

                        <x-input name="university" :value="old('university')" label="University"
                            placeholder="University Attended" />

                        <div class="col-span-1 sm:col-span-2">
                            <x-input name="course_of_study" :value="old('course_of_study')" label="Field of Study"
                                placeholder="Field of Study" />
                        </div>

                        <div class="col-span-1 sm:col-span-2">
                            <x-input accept="image/*" type="file" name="potraitImage" id="potraitPicture"
                                label="Potrait Image" :value="old('potrait_image')" />
                        </div>




                        {{-- </div> --}}
                    </div>
                </div><!-- step 3 ending -->

                {{-- STEP 4 LOGIN DETAILS --}}
                <div class="p-4" x-show.transition="step === 4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="col-span-1 sm:col-span-2">
                            <x-input label="User Name" placeholder="User Name" name="username" :value="old('username')" />
                        </div>

                        <div class="col-span-1 sm:col-span-2">
                            <x-input label="Email" placeholder="example@mail.com" name="email"
                                :value="old('email')" />
                        </div>

                        <div class="col-span-1 sm:col-span-2">
                            <x-input label="Password" type="password" name="password" />
                        </div>

                        <div class="col-span-1 sm:col-span-2">
                            <x-input label="Confirm Password" type="password" name="password_confirmation" />
                        </div>

                    </div>
                </div><!-- step 4 ending -->

                <!-- bottom navigation -->
                <div
                    class="px-4 py-4 sm:px-6 bg-secondary-50 rounded-t-none dark:bg-secondary-800
                    border-t dark:border-secondary-600 mt-4 rounded">

                    <div class="flex gap-x-3 justify-between">
                        <x-button type="button" x-show="step === 1" label="Cancel" />
                        <x-button type="button" x-show="step > 1" label="Previous" @click="step--" />
                        <x-button green type="button" x-show="step < 4" label="Next" @click="step++" />
                        <x-button type="submit" x-show="step === 4" green label="Submit" />

                    </div>

                </div>
            </form>
        </x-card>

    </div>


    @push('filepond-scripts')
        <script>
            window.addEventListener('load', () => {
                // Register the plugin
                FilePond.registerPlugin(
                    FilePondPluginImageValidateSize,
                    FilePondPluginFileValidateType,
                    FilePondPluginImageExifOrientation,
                    FilePondPluginImagePreview,
                    FilePondPluginImageResize,
                    FilePondPluginImageTransform,
                    FilePondPluginImageCrop,
                    FilePondPluginFileValidateSize,
                );
                // Get a reference to the file input element
                const inputElement = document.querySelector('#potraitPicture');

                // Create a FilePond instance
                const pond = FilePond.create(inputElement, {
                    allowImageValidateSize: true,
                    imageValidateSizeMinWidth: 900,
                    imageValidateSizeMinHeight: 1200,
                    imageValidateSizeMaxWidth: 900,
                    imageValidateSizeMaxHeight: 1200,
                    imageValidateSizeLabelImageSizeTooSmall: 'Image resolution too small',
                    imageValidateSizeLabelExpectedMinSize: 'The only supported resolution is {minWidth}px × {minHeight}px',
                    imageValidateSizeLabelImageSizeTooBig: 'Image resolution too big',
                    imageValidateSizeLabelExpectedMaxSize: 'The only supported resolution is {minWidth}px × {minHeight}px',

                    server: {
                        url: '/imageUpload',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }

                });

                // Get a reference to the file input element
                const avatar = document.querySelector('#avatar');
                // Select the file input and use 
                // create() to turn it into a pond
                // Create a FilePond instance
                const pondAvatar = FilePond.create(avatar, {
                    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
                    maxFileSize: "1MB",
                    labelMaxFileSize: 'Maximum file size is {filesize}',
                    imageValidateSizeMinWidth: 400,
                    imageValidateSizeMinHeight: 400,
                    imageValidateSizeLabelImageSizeTooSmall: 'Image resolution too small',
                    imageValidateSizeLabelExpectedMinSize: 'The image resolution should not be less than {minWidth}px × {minHeight}px',
                    imagePreviewHeight: 170,
                    imageCropAspectRatio: '1:1',
                    imageResizeTargetWidth: 200,
                    imageResizeTargetHeight: 200,
                    imageResizeUpscale: false,
                    stylePanelLayout: 'compact circle',
                    styleLoadIndicatorPosition: 'center bottom',
                    styleProgressIndicatorPosition: 'right bottom',
                    styleButtonRemoveItemPosition: 'left bottom',
                    styleButtonProcessItemPosition: 'right bottom',


                    server: {
                        url: '/avatarUpload',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                });
            });

            flatpickr("input[type=date]", {

                dateFormat: "d/m/Y",

            });
        </script>
    @endpush
</x-guest-layout>
