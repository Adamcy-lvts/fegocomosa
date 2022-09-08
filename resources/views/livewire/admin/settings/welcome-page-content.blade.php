<div>

    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Guest Home Slider') }}
        </h2>
    </x-slot>

    <x-button label="Create" primary wire:click="SliderModal" />

    <div class="my-2 flex sm:flex-row flex-col">


        @if ($checkedSliderContent)
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">

                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ count($checkedSliderContent) }} Selected Record(s)

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

                    <x-jet-dropdown-link wire:click="BulkDeleteConfirmation">
                        {{ __('Delete') }}
                    </x-jet-dropdown-link>

                </x-slot>
            </x-jet-dropdown>
        @endif
    </div>
    <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-3 md:gap-5">
        <div class="col-span-1 md:col-span-auto">
            <x-native-select class="dark:bg-secondary-900ph" label="Record Per Page" wire:model="pagination">
                <option>5</option>
                <option>10</option>
                <option>15</option>
            </x-native-select>
        </div>

        <div class="col-span-1 md:col-span-2">
            <x-input icon="search" label="Name" wire:model.debounce.500ms="search"
                placeholder="Search by Article by Title or published date" />
        </div>
    </div>

    <div class="dark:text-gray-400">

        @if ($checkPageItems)
            <div>
                @if ($checkAllItems)
                    <div> You have selected all <strong>{{ $sliders->total() }}</strong> records</div>
                @else
                    You have selected <strong>{{ count($checkedSliderContent) }}</strong> records, do you wan to
                    select All
                    <strong>{{ $sliders->total() }}</strong> records?
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
                            TITLE
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            CAPTION
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            BANNER ID
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            LINK 1
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            LINK 2
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            ACTION
                        </th>


                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($sliders as $slider)
                        <tr class="divide-y divide-slate-700">
                            <td class="px-3 py-2  ">
                                <x-jet-checkbox value="{{ $slider->id }}" wire:model="checkedSliderContent">
                                </x-jet-checkbox>
                            </td>
                            <td class="px-3 py-2  text-gray-300  text-sm">
                                {{ $slider->id }}
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $slider->title }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $slider->caption }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $slider->banner_id }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $slider->link1 }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $slider->link2 }}</p>
                            </td>

                            <td class="px-3 py-1   text-sm">


                                <div class="flex items-center gap-x-3 justify-end">
                                    <x-button type="button" wire:click="EditSlider({{ $slider->id }})"
                                        icon="pencil" class="px-1.5 py-1" primary />

                                    <x-button wire:click="DeleteConfirmaton({{ $slider->id }})" icon="x"
                                        class="px-1.5 py-1" negative />
                                </div>



                            </td>


                        </tr>

                    @empty

                        <tr class="divide-y divide-slate-700">


                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm">No Match Found</th>
                            <th class="px-3 py-2   text-sm"></th>
                            <th class="px-3 py-2   text-sm"></th>

                        </tr>
                    @endforelse


                </tbody>
            </table>

            <div class="px-5 py-5">
                <span class="text-xs xs:text-sm text-gray-300">
                    {{ $sliders->links() }}
                </span>
            </div>
        </div>
    </div>

    {{-- GUEST WELCOME PAGE MEMBERSHIP INFO TABLE --}}

    <x-button label="Add Membership Info" primary wire:click="memberInfoModal" />

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
                            HEADING 1
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            HEADING 2
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            INFO 1
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            INFO 1
                        </th>
                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            LOGO
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            ACTION
                        </th>


                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @foreach ($membershipinfo as $minfo)
                        <tr class="divide-y divide-slate-700">
                            <td class="px-3 py-2  ">
                                <x-jet-checkbox value="{{ $minfo->id }}" wire:model="checkedSliderContent">
                                </x-jet-checkbox>
                            </td>
                            <td class="px-3 py-2  text-gray-300  text-sm">
                                {{ $minfo->id }}
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $minfo->h1 }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $minfo->h2 }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $minfo->info1 }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $minfo->info2 }}</p>
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $minfo->logo }}</p>
                            </td>

                            <td class="px-3 py-1   text-sm">


                                <div class="flex items-center gap-x-3 justify-end">
                                    <x-button type="button" wire:click="EditMemberInfo({{ $minfo->id }})"
                                        icon="pencil" class="px-1.5 py-1" primary />

                                    <x-button wire:click="DeleteConfirm({{ $minfo->id }})" icon="x"
                                        class="px-1.5 py-1" negative />
                                </div>



                            </td>


                        </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="px-5 py-5   flex flex-col xs:flex-row items-center xs:justify-between">
                <span class="text-xs xs:text-sm text-gray-300">

                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    {{-- {{ $membershipinfo->links() }} --}}
                </div>
            </div>
        </div>
    </div>




    <x-modal.card title="Page Slider" blur wire:model="showModalForm">
        <x-errors class="mb-4" />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

            <div class="col-span-1 sm:col-span-2">
                <x-input label="Title" placeholder="admin" wire:model.defer="title" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Caption" placeholder="admin" wire:model.defer="caption" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Banner Id" placeholder="admin" wire:model.defer="bannerId" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Link 1" placeholder="admin" wire:model.defer="link1" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Link 1" placeholder="admin" wire:model.defer="link1" />
            </div>

        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    @if ($sliderId)
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="updateSlider" label="Update" wire:loading.attr="disabled"
                                primary />
                        </div>
                    @else
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="createSlider" label="Create" wire:loading.attr="disabled"
                                primary />
                        </div>
                    @endif

                </div>
            </div>
        </x-slot>
    </x-modal.card>

    <x-modal.card title="Membership Info" blur wire:model="infoModalForm">
        <x-errors class="mb-4" />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

            <div class="col-span-1 sm:col-span-2">
                <x-input label="h1" placeholder="h1" wire:model.defer="h1" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="h2" placeholder="h2" wire:model.defer="h2" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Link 1" placeholder="link 1" wire:model.defer="Inlink" />
            </div>
            <div class="col-span-1 sm:col-span-2">
                <x-input label="Link 2" placeholder="link 2" wire:model.defer="Uplink" />
            </div>

        </div>
        <div class="w-full m-2 p-2">
            @if ($postedLogo)
                Post Photo:
                <img src="{{ asset('storage/photos/' . $postedLogo) }}">
            @endif
            @if ($logo)
                Photo Preview:
            @endif
        </div>
        <label class="inline-block mb-2 text-gray-500">Upload
            Image(jpg,png,svg,jpeg)</label>
        <div class="flex items-center justify-center w-full">
            <label class="flex flex-col w-full h-32 border-2 border-dashed hover:bg-gray-500 hover:border-gray-300">
                <div class="flex flex-col items-center justify-center pt-7">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400 group-hover:text-gray-600"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                        Select a photo</p>
                </div>
                <input wire:model="logo" type="file" class="opacity-0" />
            </label>
        </div>
        <x-textarea id="" wire:model.lazy="info1" label="Info 1" placeholder="write your info" />
        <x-textarea id="" wire:model.lazy="info2" label="Info 2" placeholder="write your info" />
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    @if ($infoId)
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="updateInfo" label="Update" wire:loading.attr="disabled" primary />
                        </div>
                    @else
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="createInfo" label="Create" wire:loading.attr="disabled" primary />
                        </div>
                    @endif

                </div>
            </div>
        </x-slot>
    </x-modal.card>
    <div>
