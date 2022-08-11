<div>

    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Organizers') }}
        </h2>
    </x-slot>

    <x-button label="Add Organizer" wire:click="OrgModal" />

    <div class="my-2 flex sm:flex-row flex-col">


        @if ($checkedOrganizers)
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">

                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ count($checkedOrganizers) }} Selected Record(s)

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
                    <div> You have selected all <strong>{{ $organisations->total() }}</strong> records</div>
                @else
                    You have selected <strong>{{ count($checkedOrganizers) }}</strong> records, do you wan to select All
                    <strong>{{ $organisations->total() }}</strong> records?
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
                            NAME
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            ACTION
                        </th>


                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($organisations as $organisation)
                        <tr class="divide-y divide-slate-700">
                            <td class="px-3 py-2  ">
                                <x-jet-checkbox value="{{ $organisation->id }}" wire:model="checkedOrganizers">
                                </x-jet-checkbox>
                            </td>
                            <td class="px-3 py-2  text-gray-300  text-sm">
                                {{ $organisation->id }}
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $organisation->org_name }}</p>
                            </td>

                            <td class="px-3 py-1   text-sm">

                                <div class="flex items-center gap-x-3 justify-end">
                                    <x-button type="button" wire:click="showEditModal({{ $organisation->id }})"
                                        icon="pencil" class="px-1.5 py-1" primary />

                                    <x-button wire:click="DeleteConfirmaton({{ $organisation->id }})" icon="x"
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
            <div class="px-5 py-5   flex flex-col xs:flex-row items-center xs:justify-between">
                <span class="text-xs xs:text-sm text-gray-300">

                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    {{ $organisations->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-modal.card title="Organizer" blur wire:model="showModalForm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            <div class="col-span-1 sm:col-span-2">
                <x-input label="Organisation" placeholder="Organisation" wire:model.defer="orgName" />
            </div>

        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />

                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    @if ($orgId)
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="updateOrg" label="Update" wire:loading.attr="disabled" />
                        </div>
                    @else
                        <div class="flex items-center gap-x-3 justify-end">
                            <x-button wire:click="storeOrg" label="Create" wire:loading.attr="disabled" />
                        </div>
                    @endif

                </div>
            </div>

        </x-slot>
    </x-modal.card>



    <div>
