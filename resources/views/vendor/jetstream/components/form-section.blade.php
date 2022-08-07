@props(['submit'])

    <div class=" mt-5 mx-auto w-10/12">

     
            
            <x-jet-section-title>
                {{-- <x-slot name="title">{{ $title }}</x-slot>
                <x-slot name="description">{{ $description }}</x-slot> --}}
            </x-jet-section-title>

            <div class="">
                <form wire:submit.prevent="{{ $submit }}">
                    <div class="px-4 py-5  sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                        <div class="">
                            {{ $form }}
                        </div>
                    </div>

                    @if (isset($actions))
                        <div class="flex items-center justify-end px-4 py-3  text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            {{ $actions }}
                        </div>
                    @endif
                </form>
            </div>
        
</div>
