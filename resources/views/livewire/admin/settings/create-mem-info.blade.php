<div>
    <div class="container mx-auto w-8/12">

        <form wire:submit.prevent="createInfo">
            <x-card title="Add Info">
                <x-errors class="mb-4" />

                <div class="w-full m-2 p-2">
                    @if ($postedLogo)
                        Post Photo:
                        <img src="{{ asset('storage/photos/' . $postedLogo) }}">
                    @endif
                    @if ($logo)
                        Photo Preview:
                        <img src="{{ $logo->temporaryUrl() }}">
                    @endif
                </div>
                <label class="inline-block mb-2 text-gray-500">Upload
                    Image(jpg,png,svg,jpeg)</label>
                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col w-full h-32 border-2 border-dashed hover:bg-gray-500 hover:border-gray-300">
                        <div class="flex flex-col items-center justify-center pt-7">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                                fill="currentColor">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="col-span-1 sm:col-span-2 mb-5">
                        <x-textarea id="editor1" label="Membership Info" placeholder="Membership Info"
                            wire:model.defer="info" name="info" />
                        {{-- <textarea id="editor1" name="" id="" cols="30" rows="10"></textarea> --}}
                    </div>
                </div>


                {{-- <x-toggle label="Accept the terms and conditions" wire:model.defer="featured" /> --}}

                <x-slot name="footer">
                    <div class="flex items-center gap-x-3 justify-end">
                        <x-button wire:click="cancel" label="Cancel" flat />
                        <x-button type="submit" label="Create" spinner="save" primary />
                    </div>
                </x-slot>
            </x-card>
        </form>

    </div>




</div>
