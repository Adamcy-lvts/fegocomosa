<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto shadow ">
    <h1 class="font-semibold text-xl mb-4">Education Table</h1>
    <div class="divide-y divide-gray-300 dark:bg-slate-900 inline-block min-w-full shadow-xl rounded-lg overflow-hidden">

        <table class=" divide-y divide-gray-300  min-w-full leading-normal text-gray-800 ">
            <thead class="">
                <tr>
                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        INSTITUTION NAME
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        COURSE
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        CERTIFICATE
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        STARTING DATE
                    </th>

                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        ENDING DATE
                    </th>

                    <th class="px-5 py-3   text-left text-xs font-semibold uppercase tracking-wider">
                        ACTION
                    </th>


                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @forelse ($educations as $education)
                    <tr class="divide-y divide-gray-300 ">

                        <td class="px-3 py-2    text-sm">
                            {{ $education->id }}
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $education->institution_name }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $education->field_of_study }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $education->certificate }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            @php
                                $startDate = Carbon\Carbon::parse($education->starting_date);
                                $endDate = Carbon\Carbon::parse($education->completion_date);
                            @endphp
                            <p class=" whitespace-no-wrap">{{ $startDate->toFormattedDateString() }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $endDate->toFormattedDateString() }}
                            </p>
                        </td>

                        <td class="px-3 py-1   text-sm">


                            <div class="flex items-center gap-x-3 justify-end">
                                <x-button label="Edit" type="button" wire:click="EditEducation({{ $education->id }})"
                                    icon="pencil" class="px-1.5 py-1" green />

                                <x-button label="Delete" wire:click="DeleteConfirmaton({{ $education->id }})"
                                    icon="x" class="px-1.5 py-1" negative />
                            </div>



                        </td>


                    </tr>

                @empty

                    <tr class="divide-y divide-gray-300">


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
            <span class="text-xs xs:text-sm ">

            </span>

        </div>
    </div>
</div>
{{-- EDUCATION MODAL OPEN TAG --}}
<x-modal.card title="Education" blur wire:model="educationForm">
    <x-errors class="mb-4" />
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

        <div class="col-span-1 sm:col-span-2">
            <x-input label="Institution Name" placeholder="Institution Name" wire:model.defer="institutionName" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-input label="Course" placeholder="Course" wire:model.defer="course" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-input label="Certicate" placeholder="Certicate" wire:model.defer="certificate" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-datetime-picker without-time label="Start Date" placeholder="Start Date"
                wire:model.defer="startingDate" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-datetime-picker without-time label="End Date" placeholder="End Date" wire:model.defer="endingDate" />
        </div>

    </div>
    {{-- <x-textarea id="editor" wire:model.lazy="info" label="Info" placeholder="write your info" /> --}}
    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat negative label="Delete" wire:click="delete" />

            <div class="flex">
                <x-button flat label="Cancel" x-on:click="close" />
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="updateEducation" label="Update" wire:loading.attr="disabled" primary />
                </div>
            </div>
        </div>
    </x-slot>
</x-modal.card>
{{-- EDUCATION MODAL CLOSED --}}
