<div>

    <x-slot name="header">
        <h2 class=" text-white font-sans text-3xl leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <x-button wire:click="createProjectModal" label="Create Project" icon="pencil" />

    <div class="my-2 flex sm:flex-row flex-col">

        @if ($checkedProjects)
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">

                    <span class="inline-flex rounded-md">
                        <button type="button"
                            class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ count($checkedProjects) }} Selected Record(s)

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
                    <div> You have selected all <strong>{{ $projects->total() }}</strong> records</div>
                @else
                    You have selected <strong>{{ count($checkedProjects) }}</strong> records, do you wan to select All
                    <strong>{{ $projects->total() }}</strong> records?
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
                            STATUS
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            BUDGET
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            STARTING DATE
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            COMPLETION DATE
                        </th>

                        <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                            ACTION
                        </th>


                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    @forelse ($projects as $project)
                        <tr class="divide-y divide-slate-700">
                            <td class="px-3 py-2  ">
                                <x-jet-checkbox value="{{ $project->id }}" wire:model="checkedProjects">
                                </x-jet-checkbox>
                            </td>
                            <td class="px-3 py-2  text-gray-300  text-sm">
                                {{ $project->id }}
                            </td>
                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $project->title }}</p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">
                                    {{ $project->status }}
                                </p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $project->budget }}</p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $project->starting_date }}</p>
                            </td>

                            <td class="px-3 py-2   text-sm">
                                <p class="text-gray-300 whitespace-no-wrap">{{ $project->completion_date }}</p>
                            </td>


                            <td class="px-3 py-1   text-sm">


                                <div class="flex items-center gap-x-3 justify-end">
                                    <x-button wire:click="showEditProject({{ $project->id }})" icon="pencil"
                                        class="px-1.5 py-1" primary />

                                    <x-button wire:click="DeleteConfirmaton({{ $project->id }})" icon="x"
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
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>










    <x-jet-dialog-modal wire:model="showModalForm">
        @if ($projectId)
            <x-slot name="title">Edit Project</x-slot>
        @else
            <x-slot name="title">Create Project</x-slot>
        @endif


        <x-slot name="content">
            <x-errors />
            <div class="space-y-8 divide-y divide-gray-200  mt-10">

                <form method="#" enctype="multipart/form-data">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-2 md:gap-6">

                            <x-input label="Project Title" placeholder="Project Title" wire:model.defer="title" />
                            <x-input label="Budget" placeholder="Budget" wire:model.defer="budget" />

                        </div>

                        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-2 md:gap-6">

                            <x-input label="Proposed By" placeholder="Proposed By" wire:model.defer="proposedBy" />
                            <x-input label="Executed By" placeholder="Executed By" wire:model.defer="executedBy" />

                        </div>

                        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-2 md:gap-6">

                            <x-input label="Status" placeholder="Status" wire:model.defer="status" />
                            <x-input label="Progress Indicator" placeholder="Progress Indicator"
                                wire:model.defer="progressIndicator" />

                        </div>

                        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-2 md:gap-6">

                            <x-datetime-picker without-time label="Starting Date" placeholder="Starting Date"
                                wire:model.defer="startingDate" />
                            <x-datetime-picker without-time label="Completion Date" placeholder="Completion Date"
                                wire:model.defer="completionDate" />

                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="w-full m-2 p-2">

                            @if ($postedProjectImage)
                                Project Image:
                                <img src="{{ asset('storage/projects_images/' . $postedProjectImage) }}">
                            @endif

                            @if ($postedProjectImages)
                                Project Images:

                                <div class=" flex flex-row m-8 ">
                                    @foreach ($postedProjectImages as $postedPhotos)
                                        <i class="fas fa-times  text-right text-red-200 hover:text-red-600 cursor-pointer ml-3"
                                            wire:click="removeProjectImage({{ $postedPhotos->id }})"></i>
                                        <img width="30%"
                                            src="{{ asset('storage/projects_images/' . $postedPhotos->images) }}">
                                    @endforeach
                                </div>
                            @endif
                        </div>


                        @if ($image)
                            Photo Preview:
                            <img src="{{ $image->temporaryUrl() }}">
                        @endif

                        @if ($projectImages)
                            Images Preview:
                            <div class="flex flex-row m-8 ">

                                @foreach ($projectImages as $key => $projectImage)
                                    <div class="flex flex-col gap-3">
                                        <img width="100%" src="{{ $projectImage->temporaryUrl() }}">
                                        <x-input placeholder="Caption"
                                            wire:model.defer="captions.{{ $key }}" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <label class="inline-block mb-2 text-gray-500">Project Cover Image</label>
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

                    <label class="inline-block mb-2 text-gray-500">Upload
                        Projects Images</label>
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
                            <input wire:model="projectImages" type="file" multiple class="opacity-0" />
                        </label>
                    </div>

                    <x-textarea wire:model.lazy="body" label="Body" placeholder="write your article" />

                </form>


            </div>

        </x-slot>


        <x-slot name="footer">
            @if ($projectId)
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button type="submit" wire:click="updateProject" label="Update"
                        wire:loading.attr="disabled" />
                </div>
            @else
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />
                    <x-button type="submit" wire:click="storeProject" label="Create"
                        wire:loading.attr="disabled" />
                </div>
            @endif

        </x-slot>

    </x-jet-dialog-modal>





    <div>
