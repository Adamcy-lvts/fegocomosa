<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4  overflow-x-auto ">
    <h1 class="font-semibold text-xl mb-4">Skill Table</h1>
    <div class="divide-y divide-gray-300 dark:bg-slate-900 inline-block min-w-full shadow-xl rounded-lg overflow-hidden">
        <table class=" divide-y divide-gray-300  min-w-full leading-normal text-gray-800">
            <thead class="">
                <tr>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        ID
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        SKILL NAME
                    </th>
                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        RATING
                    </th>

                    <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                        ACTION
                    </th>


                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                @foreach ($skills as $skill)
                    <tr class="divide-y divide-gray-300">

                        <td class="px-3 py-2    text-sm">
                            {{ $skill->id }}
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $skill->skill_name }}</p>
                        </td>
                        <td class="px-3 py-2   text-sm">
                            <p class=" whitespace-no-wrap">{{ $skill->rating }}</p>
                        </td>

                        <td class="px-3 py-1   text-sm">


                            <div class="flex items-center gap-x-3 justify-end">
                                <x-button label="Edit" type="button" wire:click="EditSkill({{ $skill->id }})"
                                    icon="pencil" class="px-1 py-1" green />

                                <x-button label="Delete" wire:click="SkillDeleteConfirm({{ $skill->id }})"
                                    icon="x" class="px-1 py-1" negative />
                            </div>



                        </td>


                    </tr>
                @endforeach


            </tbody>
        </table>

    </div>
</div>
{{-- SKILL MODAL OPEN TAG --}}
<x-modal.card title="Skill" blur wire:model="skillForm">
    <x-errors class="mb-4" />
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

        <div class="col-span-1 sm:col-span-2">
            <x-input label="Skill Name" placeholder="Skill Name" wire:model.defer="skillName" />
        </div>
        <div class="col-span-1 sm:col-span-2">
            <x-input label="rating" placeholder="rating" wire:model.defer="rating" />
        </div>
    </div>

    <x-slot name="footer">
        <div class="flex justify-between gap-x-4">
            <x-button flat negative label="Delete" wire:click="delete" />

            <div class="flex">
                <x-button flat label="Cancel" x-on:click="close" />
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="updateSkill" label="Update" wire:loading.attr="disabled" primary />
                </div>
            </div>
        </div>
    </x-slot>
</x-modal.card>
