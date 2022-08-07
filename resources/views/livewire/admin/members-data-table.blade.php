<div>

    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div>
        @if (session()->has('flash.banner'))
            <x-jet-banner />
        @endif
    </div>




    {{-- <x-jet-button class="">Create</x-jet-button> --}}
    <x-button label="Add Member" wire:click="createMemberModal" icon="user-add" />

    <div class="my-2 flex sm:flex-row flex-col">


        @if ($checkedUsers)
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">

                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ count($checkedUsers) }} Selected Record(s)

                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>

                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Deleted Selected Records') }}
                    </div>

                    <x-jet-dropdown-link wire:click="DeleteConfirmation">
                        {{ __('Delete') }}
                    </x-jet-dropdown-link>

                </x-slot>
            </x-jet-dropdown>
        @endif
    </div>




    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 ">

        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-4 sm:gap-6 ">
            <x-native-select class="dark:bg-secondary-900ph" label="Record Per Page" wire:model="pagination">
                <option>5</option>
                <option>10</option>
                <option>15</option>
            </x-native-select>

            <x-native-select label="Filter by State" wire:model="FilterByState" placeholder="Filter By State">
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </x-native-select>

            @if (!is_null($cities))
                <x-native-select label="Filter by City" placeholder="Filter by City" wire:model="FilterByCity">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </x-native-select>
            @endif

            <x-native-select label="Filter By Profession" placeholder="Filter By Profession"
                wire:model="FilterByProfession">
                @foreach ($professionCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-native-select>

            <x-native-select label="Filter By House" placeholder="Filter By House" wire:model="selectedHouseFilter">
                @foreach ($houses as $house)
                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                @endforeach
            </x-native-select>
        </div>


        <div class="col-span-1 sm:col-span-2">
            <x-input icon="search" label="Name" wire:model.debounce.500ms="search"
                placeholder="Search by First Name, Last Name, State" />
        </div>
    </div>







    <div class="dark:text-gray-400">

        @if ($checkPageItems)
            <div>
                @if ($checkAllItems)
                    <div> You have selected all <strong>{{ $members->total() }}</strong> records</div>
                @else
                    You have selected <strong>{{ count($checkedUsers) }}</strong> records, do you wan to select All
                    <strong>{{ $members->total() }}</strong> records?
                    <a href="#" wire:click="checkAllItems">Select All Records</a>
            </div>
        @endif
        @endif

    </div>

    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto ">
        <div
            class="divide-y divide-slate-700 dark:bg-slate-900 inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class=" divide-y divide-slate-700  min-w-full leading-normal">
                <thead class="">
                    <tr>
                        <th class="px-3 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">

                            <x-jet-checkbox wire:model="checkPageItems"></x-jet-checkbox>
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Name
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Avatar
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Email
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Address
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Phone
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Graduation Year
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            Action
                        </th>


                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($members as $member)
                        <tr class="divide-y divide-slate-700">
                            <td class="px-3 py-2  ">
                                <x-jet-checkbox value="{{ $member->id }}" wire:model="checkedUsers"></x-jet-checkbox>
                            </td>
                            <td class="px-3 py-2  text-gray-300  text-sm">
                                {{ $member->id }}
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">
                                    {{ $member->first_name }}{{ $member->last_name }}</p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ $member->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-300 whitespace-no-wrap">

                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">
                                    {{ $member->email }}
                                </p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $member->address }}</p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $member->phone }}</p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $member->year_of_graduation }}</p>
                            </td>

                            <td class="px-3 py-1   text-sm">

                                <div class="flex items-center gap-x-3 justify-end">
                                    <button type="button" wire:click="makeAmbassador({{ $member->id }})"
                                        class="px-1.5 py-0.5 text-gray-300 hover:bg-gray-700 rounded"><i
                                            class="fad fa-badge-check"></i></button>

                                    <x-button wire:click="assignPosition({{ $member->id }})" icon="badge-check"
                                        class="px-1.5 py-1" secondary />

                                    <button type="button" wire:click="assignRole({{ $member->id }})"
                                        class="px-1.5 py-0.5 text-gray-300 bg-indigo-500 rounded"><i
                                            class="fal fa-user-tag"></i></button>

                                    <x-button wire:click="assignPermission({{ $member->id }})" icon="lock-closed"
                                        class="px-1.5 py-1" secondary />

                                    <x-button wire:click="showEditMember({{ $member->id }})" icon="pencil"
                                        class="px-1.5 py-1" primary />

                                    <x-button wire:click="SingleDeleteConfirmation({{ $member->id }})"
                                        icon="x" class="px-1.5 py-1" negative />
                                </div>



                            </td>


                        </tr>

                    @empty

                        <tr class="divide-y divide-slate-700">

                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm">No Match Found</th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            <div class="px-5 py-5   flex flex-col xs:flex-row items-center xs:justify-between">
                <span class="text-xs xs:text-sm text-gray-300">

                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>


    <x-jet-dialog-modal wire:model="showModalForm">

        <x-slot name="title">Create Member</x-slot>

        <x-slot name="content">
            <x-errors />
            <div class="space-y-8 divide-y divide-gray-200  mt-10">

                <form method="#" enctype="multipart/form-data">


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
                        <x-native-select label="Marital Status" placeholder="Marital Status"
                            wire:model.defer="maritalStatus">
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
                            <x-datetime-picker without-time label="Year of Entry" placeholder="Year of Entry"
                                wire:model.defer="yearOfEntry" />

                            <x-native-select label="Year of Gradution" placeholder="Year of Gradution"
                                wire:model.defer="yearOfGraduation">
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                                @endforeach
                            </x-native-select>
                            <x-input label="Admission Number" placeholder="Admission Number"
                                wire:model.defer="admissionNumber" />
                        </div>

                        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
                            <x-input label="Jss Class" placeholder="For example Jss 1Q - 3Q"
                                wire:model.defer="jssClass" />
                            <x-input label="Sss Class" placeholder="For example Sss 1Q - 3Q"
                                wire:model.defer="sssClass" />

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
                            <x-input label="Course of Study"
                                placeholder="example Electrical and Electronics Engineering"
                                wire:model.defer="courseOfStudy" />

                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="w-full m-2 p-2">

                            @if ($postedPotraitImage)
                                Event Image:
                                <img src="{{ asset('storage/photos/' . $postedPotraitImage) }}">
                            @endif
                        </div>


                        @if ($potraitImage)
                            Photo Preview:
                            <img src="{{ $potraitImage->temporaryUrl() }}">
                        @endif

                    </div>


                    <label for="title" class="block text-sm font-medium text-gray-100"> Potrait Image </label>
                    <div class="mt-1">
                        <input type="file" wire:model="potraitImage" id="image" name="potrait_image"
                            class="  w-full border-gray-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                    </div>


                </form>


            </div>

        </x-slot>


        <x-slot name="footer">
            @if ($memberId)
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button type="submit" wire:click="updateMember" label="Update" wire:loading.attr="disabled"
                        primary />
                </div>
            @else
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button type="submit" wire:click="storeMember" label="Create" wire:loading.attr="disabled"
                        primary />
                </div>
            @endif

        </x-slot>

    </x-jet-dialog-modal>

    <x-modal.card title="Assign Roles" blur wire:model="ModalForm">
        <x-errors />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">


            @foreach ($roles as $role)
                {{-- <x-button xs icon="check" positive label="{{$role->name}}" /> --}}
                <x-checkbox class="w-1/2 py-2" id="right-label" label="{{ $role->name }}"
                    wire:model.defer="assaignedRoles" value="{{ $role->id }}" />
            @endforeach

        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />

                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="assign" label="Assign" wire:loading.attr="disabled" primary />
                </div>
            </div>
        </x-slot>
    </x-modal.card>

    <x-modal.card title="Assign Position" blur wire:model="ModalPositionedForm">
        <x-errors />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

            @foreach ($positions as $position)
                <x-radio id="radio" id="right-label" label="{{ $position->name }}"
                    wire:model.defer="assignedPosition" value="{{ $position->id }}" />
            @endforeach
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="givePosition" label="Assign" wire:loading.attr="disabled" primary />
                </div>
            </div>

        </x-slot>
    </x-modal.card>

    <x-modal.card title="Assign Set Ambasssador" blur wire:model="AmbassadorModal">
        <x-errors />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <x-datetime-picker without-time label="Graduation Year" placeholder="Graduation Year"
                wire:model.defer="year" />
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat label="Cancel" x-on:click="close" />
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="assignAmbassador" label="Assign" wire:loading.attr="disabled" primary />
                </div>
            </div>

        </x-slot>
    </x-modal.card>

    <x-jet-confirmation-modal wire:model="showModalAlert">

        <x-slot name="title">Delete Selected Record</x-slot>

        <x-slot name="content">
            <p class="text-gray-900">Are you sure want to delete the selected records?</p>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center gap-x-3 justify-end">
                <x-button wire:click="CancelConfirmation" label="Cancel" flat />

                <x-button wire:loading.attr="disabled" wire:click="deleteRecords" label="Delete Records" negative />

            </div>
        </x-slot>

    </x-jet-confirmation-modal>

    <x-jet-confirmation-modal wire:model="showAlert">

        <x-slot name="title">Delete Selected Record</x-slot>

        <x-slot name="content">
            <p class="text-gray-900">Are you sure want to delete the selected records?</p>
        </x-slot>

        <x-slot name="footer">
            <div class="flex items-center gap-x-3 justify-end">
                <x-button wire:click="CancelConfirmation" label="Cancel" flat />

                <x-button wire:loading.attr="disabled" wire:click="deleteRecord" label="Delete" negative />
            </div>
        </x-slot>

    </x-jet-confirmation-modal>



    <div>
