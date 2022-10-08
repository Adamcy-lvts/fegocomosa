<div>
    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>




    {{-- NAVIGATION MENUS SECTION --}}
    <div class="flex sm:flex-row gap-4 flex-col mb-5">
        <div class="w-full sm:w-2/4 rounded-lg shadow" style="background-color:#01081f;">
            <ul class="p-5">
                <h3 class="text-gray-400 uppercase border-b p-3">Navigation Menus</h3>
                @foreach ($navMenus as $menu)
                    <div class="flex justify-between items-center">
                        <div class="w-2/6 text-gray-400">
                            <li class="text-sm text-gray-400 p-3">{{ $menu->name }}</li>
                            @if ($showEdit && $menu->id === $menuId)
                                <x-input class="mb-2" wire:model.defer="menu" />
                                <x-button xs wire:click="updateMenu" label="Submit" />
                            @endif
                        </div>

                        <div class="w-2/6 text-gray-400">
                            <li class="text-sm text-gray-400 p-3">{{ $menu->link }}</li>
                            @if ($showEdit && $menu->id === $menuId)
                                <x-input class="mb-2" wire:model.defer="link" />
                                <x-button xs wire:click="updateMenu" label="Submit" />
                            @endif
                        </div>


                        <div class="w-0.5/6 text-gray-400">
                            <i wire:click="editMenu({{ $menu->id }})"
                                class="fa-thin fa-pen-to-square cursor-pointer"></i>
                        </div>
                        <div class="w-0.5/6 text-red-400 ">
                            <i class="fa-thin fa-trash cursor-pointer"></i>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
        <div class="w-full sm:w-2/4 rounded-lg shadow" style="background-color:#01081f;">

            <ul class="p-5">
                <h3 class="text-gray-400 uppercase border-b p-3">Guest Navigation Menus</h3>
                @foreach ($navbarMenus as $navbarMenu)
                    <div class="flex justify-between items-center">
                        <div class="w-2/6 text-gray-400">
                            <li class="text-sm text-gray-400 p-3">{{ $navbarMenu->name }}</li>
                            @if ($editNavbar && $navbarMenu->id === $navbarId)
                                <x-input class="mb-2" wire:model.defer="navItem" />
                                <x-button xs wire:click="updateNavbar" label="Submit" />
                            @endif
                        </div>

                        <div class="w-2/6 text-gray-400">
                            <li class="text-sm text-gray-400 p-3">{{ $navbarMenu->link }}</li>
                            @if ($editNavbar && $navbarMenu->id === $navbarId)
                                <x-input class="mb-2" wire:model.defer="navLink" />
                                <x-button xs wire:click="updateNavbar" label="Submit" />
                            @endif
                        </div>

                        <div class="w-1/6 text-gray-400">
                            <li class="text-sm text-gray-400 p-3">{{ $navbarMenu->visibility }}</li>
                        </div>
                        <div class="w-0.5/6 text-gray-400">
                            <livewire:component.toggle-button :model="$navbarMenu" field="visibility"
                                key="{{ $navbarMenu->id }}" />
                            {{-- @livewire('component.toggle-button', ['model' => $navbarMenu, 'field' => 'visibility'], key($navbarMenu->id)) --}}
                        </div>
                        <div class="w-0.5/6 text-gray-400">
                            <i wire:click="editNavbar({{ $navbarMenu->id }})"
                                class="fa-thin fa-pen-to-square cursor-pointer"></i>
                        </div>
                        <div class="w-0.5/6 text-red-400 pr-4">
                            <i class="fa-thin fa-trash cursor-pointer"></i>
                        </div>
                    </div>
                @endforeach
            </ul>
            {{-- </div> --}}
        </div>

    </div>
    {{-- FEATURED IMAGE SECTION --}}
    @livewire('admin.settings.feature-images')
    {{-- GUEST HOME PAGE SLIDER SECTION --}}
    @livewire('admin.settings.welcome-page-content')
</div>
