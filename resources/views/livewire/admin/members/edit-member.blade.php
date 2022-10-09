<div class="space-y-8  mt-10">
    <x-errors />
    <form wire:submit.prevent="updateMember" enctype="multipart/form-data">
        <x-card title="Member Information">


            <x-input label="First Name" placeholder="First Name" wire:model.defer="firstName" />
            <x-input label="Last Name" placeholder="Last Name" wire:model.defer="lastName" />

            <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-7 md:gap-5">
                <div class="col-span-1 md:col-span-4">
                    <x-input label="Middle Name" placeholder="Middle Name" wire:model.defer="middleName" />
                </div>

                <div class="col-span-1 md:col-span-3">
                    <x-datetime-picker label="Birthdate" without-time placeholder="Birthdate"
                        wire:model.defer="birthDate" />
                </div>
            </div>

            <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-3 md:gap-6">
                <x-native-select label="Gender" placeholder="Gender" wire:model.defer="gender">
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}"
                            {{ $gender->id == auth()->user()->gender_id ? 'selected' : '' }}>
                            {{ $gender->gender }}</option>
                    @endforeach
                </x-native-select>
                <x-inputs.phone label="Phone" placeholder="Phone" wire:model.defer="phone" />
                <x-native-select label="Marital Status" placeholder="Marital Status" wire:model.defer="maritalStatus">
                    @foreach ($maritalStatuses as $maritalStatus)
                        <option value="{{ $maritalStatus->id }}"
                            {{ $maritalStatus->id == auth()->user()->marital_status ? 'selected' : '' }}>
                            {{ $maritalStatus->marital_status }}</option>
                    @endforeach
                </x-native-select>
            </div>


            <div class="col-span-1 md:col-span-2">
                <x-input label="Street Address" placeholder="Street Address" wire:model.defer="address" />
            </div>

            <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-2 md:gap-6">
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


            </div>

            <div class="col-span-1 md:col-span-2">
                <x-input label="Email" placeholder="Email" wire:model.defer="email" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">

                    <x-native-select label="Year of Entry" placeholder="Year of Entry"
                        wire:model.defer="selectedEntryYear">
                        @foreach ($entryYears as $entryYear)
                            <option value="{{ $entryYear->id }}">{{ $entryYear->year }}</option>
                        @endforeach
                    </x-native-select>

                    <x-native-select label="Year of Gradution" placeholder="Year of Gradution"
                        wire:model.defer="selectedGradYear">
                        @foreach ($gradYears as $gradYear)
                            <option value="{{ $gradYear->id }}">{{ $gradYear->year }}</option>
                        @endforeach
                    </x-native-select>

                    <x-input label="Admission Number" placeholder="Admission Number"
                        wire:model.defer="admissionNumber" />
                </div>

                <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
                    <x-native-select
                        class=" focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                        label="Jss Class" placeholder="Jss Class" wire:model.defer="selectedJssClass">
                        @if ($jssClasses)
                            @foreach ($jssClasses as $jssClass)
                                <option value="{{ $jssClass->id }}">{{ $jssClass->class_name }}
                                </option>
                            @endforeach
                        @endif
                    </x-native-select>


                    <x-native-select
                        class=" focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                        label="Sss Class" placeholder="Sss Class" wire:model.defer="selectedSSClass">
                        @if ($jssClasses)
                            @foreach ($sssClasses as $sssClass)
                                <option value="{{ $sssClass->id }}">{{ $sssClass->class_name }}
                                </option>
                            @endforeach
                        @endif
                    </x-native-select>

                    <x-native-select label="House" placeholder="House" wire:model.defer="selectedHouse">
                        @foreach ($houses as $house)
                            <option value="{{ $house->id }}">{{ $house->name }}</option>
                        @endforeach
                    </x-native-select>
                </div>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
                    <x-input label="Profession" placeholder="Profession" wire:model.defer="profession" />
                    <x-native-select label="Professional Category" placeholder="Professional Category"
                        wire:model="selectedCategory">
                        @foreach ($professionCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-native-select>
                    <x-input label="Workplace" placeholder="Workplace" wire:model.defer="workplace" />
                </div>

                <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-2 md:gap-6">
                    <x-input label="University Attended" placeholder="example Univeristy of Maiduguri"
                        wire:model.defer="university" />
                    <x-input label="Course of Study" placeholder="example Electrical and Electronics Engineering"
                        wire:model.defer="courseOfStudy" />

                </div>
            </div>

            <div class="sm:col-span-6">
                <div class="w-full m-2 p-2">

                    @if ($postedPotraitImage)
                        Event Image:
                        <img src="{{ asset('storage/members_images/' . $postedPotraitImage) }}">
                    @endif
                </div>


                @if ($potraitImage)
                    Photo Preview:
                    <img src="{{ $potraitImage->temporaryUrl() }}">
                @endif

            </div>


            <label for="title" class="block text-sm font-medium text-gray-100"> Potrait Image </label>
            <div class="my-2">
                <x-input type="file" wire:model="potraitImage" id="image" name="potrait_image"
                    class="  w-full border-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            </div>

            <x-toggle label="Make User Active/Inactive " wire:model.defer="active" />

            <x-slot name="footer">
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button type="submit" label="Update" wire:loading.attr="disabled" />
                </div>
            </x-slot>
        </x-card>
    </form>


</div>
