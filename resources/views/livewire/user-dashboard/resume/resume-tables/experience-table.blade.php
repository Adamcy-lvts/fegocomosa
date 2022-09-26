<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto ">
    <h1 class="font-semibold text-xl mb-4">Experience Table</h1>
    <div class="divide-y divide-gray-300 dark:bg-slate-900 inline-block min-w-full shadow-xl rounded-lg overflow-hidden">
        <table class=" divide-y divide-gray-300  min-w-full leading-normal text-gray-800">
            <thead class="">
                <tr>

                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        JOB TITLE
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        EMPLOYER
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        DESCRIPTION
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        START DATE
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        END DATE
                    </th>

                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        ACTION
                    </th>


                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($experiences as $experience)
                    <tr class="divide-y divide-gray-300">

                        <td class="px-3 py-2    text-sm">
                            {{ $experience->id }}
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $experience->job_title }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $experience->employer }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">
                                {{ Illuminate\Support\Str::words($experience->description, 5, '...') }}</p>
                        </td>
                        @php
                            $startingDate = Carbon\Carbon::parse($experience->start_date);
                            $completionDate = Carbon\Carbon::parse($experience->end_date);
                        @endphp
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $startingDate->toFormattedDateString() }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $completionDate->toFormattedDateString() }}</p>
                        </td>

                        <td class="px-3 py-1   text-sm">


                            <div class="flex items-center gap-x-3 justify-end">
                                <x-button label="Edit" type="button"
                                    wire:click="EditExperience({{ $experience->id }})" icon="pencil"
                                    class="px-1.5 py-1" green />

                                <x-button label="Delete" wire:click="ExperienceDeleteConfirm({{ $experience->id }})"
                                    icon="x" class="px-1.5 py-1" negative />
                            </div>



                        </td>


                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="px-5 py-5   flex flex-col xs:flex-row items-center xs:justify-between">
            <span class="text-xs xs:text-sm ">

            </span>
            {{-- <div class="inline-flex mt-2 xs:mt-0">
                        {{ $membershipinfo->links() }}
                    </div> --}}
        </div>
    </div>
</div>
{{-- EXPERIENCE MODAL OPEN TAG --}}
<x-modal.card title="Experience" blur wire:model="experienceForm">
    <x-errors class="mb-4" />
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

        <div class="col-span-1 sm:col-span-2">
            <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                label="Job Title" placeholder="Job Title" wire:model.defer="jobTitle" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                label="Employer" placeholder="Employer" wire:model.defer="employer" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-datetime-picker class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                without-time label="Starting Date" placeholder="Starting Date" wire:model.defer="startDate" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-datetime-picker class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                without-time label="Ending Date" placeholder="Ending Date" wire:model.defer="endDate" />
        </div>

    </div>
    <x-textarea wire:model.defer="description" label="Description" placeholder="description" />

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat negative label="Delete" wire:click="delete" />

            <div class="flex">
                <x-button flat label="Cancel" x-on:click="close" />
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="updateExperience" label="Update" wire:loading.attr="disabled" primary />
                </div>
            </div>
        </div>
    </x-slot>
</x-modal.card>
