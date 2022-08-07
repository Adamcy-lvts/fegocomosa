<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 mb-24 overflow-x-auto ">
    <h1 class="font-semibold text-xl mb-4">Hobby Table</h1>
    <div class="divide-y divide-gray-300 dark:bg-slate-900 inline-block min-w-full shadow-xl rounded-lg overflow-hidden">
        <table class=" divide-y divide-gray-300  min-w-full leading-normal text-gray-800">
            <thead class="">
                <tr>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        HOBBY NAME
                    </th>

                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        ACTION
                    </th>


                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                {{-- {{ dd($hobbies) }} --}}
                @foreach ($hobbys as $hobby)
                    <tr class="divide-y divide-gray-300">
                        <td class="px-3 py-2    text-sm">
                            {{ $hobby->id }}
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $hobby->hobby_name }}</p>
                        </td>

                        <td class="px-3 py-1   text-sm">


                            <div class="flex items-center gap-x-3 justify-end">
                                <x-button label="Edit" type="button" wire:click="EditHobby({{ $hobby->id }})"
                                    icon="pencil" class="px-1.5 py-1" green />

                                <x-button label="Delete" wire:click="HobbyDeleteConfirm({{ $hobby->id }})"
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
{{-- HOBBY MODAL OPEN TAG --}}
<x-modal.card title="Hobby" blur wire:model="hobbyForm">
    <x-errors class="mb-4" />
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

        <div class="col-span-1 sm:col-span-2">
            <x-input label="Hobby Name" placeholder="Hobby Name" wire:model.defer="hobbyName" />
        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat negative label="Delete" wire:click="delete" />

            <div class="flex">
                <x-button flat label="Cancel" x-on:click="close" />
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="updateHobby" label="Update" wire:loading.attr="disabled" primary />
                </div>
            </div>
        </div>
    </x-slot>
</x-modal.card>
