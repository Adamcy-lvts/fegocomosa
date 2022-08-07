<div>

    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>







    {{-- <x-jet-button class="" wire:click="createPostModal">Create</x-jet-button> --}}
    <x-button href="{{ route('post.create') }}" label="Create" spinner="save" primary />

    <div class="my-2 flex sm:flex-row flex-col">


        @if ($checkedPosts)
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">

                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ count($checkedPosts) }} Selected Record(s)

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
                    <div> You have selected all <strong>{{ $posts->total() }}</strong> records</div>
                @else
                    You have selected <strong>{{ count($checkedPosts) }}</strong> records, do you wan to select All
                    <strong>{{ $posts->total() }}</strong> records?
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
                            IMAGE
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            AUTHOR
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            PUBLISHED DATE
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            ACTION
                        </th>


                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($posts as $post)
                        <tr class="divide-y divide-slate-700">
                            <td class="px-3 py-2  ">
                                <x-jet-checkbox value="{{ $post->id }}" wire:model="checkedPosts"></x-jet-checkbox>
                            </td>
                            <td class="px-3 py-2  text-gray-300  text-sm">
                                {{ $post->id }}
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $post->title }}</p>
                            </td>

                            <td class="px-3 py-2 border-b border-gray-200  text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ asset('storage/photos/' . $post->image) }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-300 whitespace-no-wrap">

                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">
                                    {{ $post->user->username }}
                                </p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $post->created_at }}</p>
                            </td>


                            <td class="px-3 py-1   text-sm">


                                <div class="flex items-center gap-x-3 justify-end">
                                    <x-button type="button" class="px-1.5 py-1"
                                        wire:click="assignTag({{ $post->id }})" icon="tag" />

                                    <x-button href="{{ route('post.edit', [$post->slug]) }}" type="button"
                                        icon="pencil" class="px-1.5 py-1" primary />

                                    <x-button wire:click="DeleteConfirmaton({{ $post->id }})" icon="x"
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-modal.card title="Assign Tag" blur wire:model="TagModalForm">
        <x-errors />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">


            @foreach ($tags as $tag)
                <x-radio class="w-1/2 py-2" id="right-label" label="{{ $tag->name }}"
                    wire:model.defer="assignedTags" value="{{ $tag->id }}" />
            @endforeach

        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">

                <x-button flat label="Cancel" x-on:click="close" />

                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="tagged" label="Tagged" wire:loading.attr="disabled" primary />
                </div>


            </div>

        </x-slot>
    </x-modal.card>


    <x-jet-dialog-modal wire:model="showModalForm">
        @if ($postId)
            <x-slot name="title">Edit Post</x-slot>
        @else
            <x-slot name="title">Publish Post</x-slot>
        @endif


        <x-slot name="content">
            <x-errors />
            <div class="space-y-8 divide-y divide-gray-200  mt-10">

                <form method="#" enctype="multipart/form-data">

                    <x-input label="Post Title" wire:model.lazy="title" placeholder="Post Title" />

                    <div class="sm:col-span-6">
                        <div class="w-full m-2 p-2">
                            @if ($postedImage)
                                Post Photo:
                                <img src="{{ asset('storage/photos/' . $postedImage) }}">
                            @endif
                            @if ($image)
                                Photo Preview:
                                <img src="{{ $image->temporaryUrl() }}">
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
                                <input wire:model="image" type="file" class="opacity-0" />
                            </label>
                        </div>
                        <div wire:ignore>
                            <x-textarea id="text" data-text=@this wire:model.lazy="body" label="Body"
                                placeholder="write your article" />
                        </div>


                </form>


            </div>

        </x-slot>


        <x-slot name="footer">
            @if ($postId)
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button type="submit" wire:click="updatePost" label="Update" wire:loading.attr="disabled"
                        primary />
                </div>
            @else
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button id="submit" type="submit" wire:click="storePost" label="Create"
                        wire:loading.attr="disabled" primary />
                </div>
            @endif

        </x-slot>

    </x-jet-dialog-modal>



    <div>
