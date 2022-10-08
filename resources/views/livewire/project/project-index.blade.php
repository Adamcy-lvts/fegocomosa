<div>
    <div x-data="tabs()" x-bind="container" class="mx-auto md:w-8/12 py-24">
        <nav x-ref="tabs" class="flex grow bg-white shadow relative mb-4">

            <a x-bind="tab"
                class="inline-flex w-full  items-center justify-center px-8 py-4 text-sm font-medium text-gray-600 transition"
                :class="activeTab === 0 ? 'text-green-600 border-green-500' : ''" @click="activeTab = 0"
                href="#in-all-projects">All Projects</a>
            <a x-bind="tab"
                class="inline-flex w-full items-center justify-center px-8 py-4 text-sm font-medium text-gray-600 transition"
                :class="activeTab === 1 ? 'text-green-600 border-green-500' : ''" @click="activeTab = 1"
                href="#completed">Completed Projects</a>
            <a x-bind="tab"
                class="inline-flex w-full items-center justify-center px-8 py-4 text-sm font-medium text-gray-600 transition"
                :class="activeTab === 2 ? 'text-green-600 border-green-500' : ''" @click="activeTab = 2"
                href="#in-progress">Projects In Progress</a>
            <a x-bind="tab"
                class="inline-flex w-full items-center justify-center px-8 py-4 text-sm font-medium text-gray-600 transition"
                :class="activeTab === 3 ? 'text-green-600 border-green-500' : ''" @click="activeTab = 3"
                href="#proposed">Proposed Projects</a>

            <div x-bind="indicator"
                class="border-t-2 border-green-600 absolute left-0 bottom-0 transition-all duration-500"></div>
        </nav>



        <div class="w-full  bg-white p-8 md:p-0  shadow-lg border">
            <div x-show="activeTab===0">
                <div class=" py-16 mx-auto md:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-8 lg:px-8 lg:py-20">
                    {{-- ALL PROJECTS --}}
                    <div class="grid gap-8 lg:grid-cols-3 md:max-w-md md:mx-auto lg:max-w-full">
                        @foreach ($projects as $project)
                            <div
                                class="  overflow-hidden transition-shadow duration-300 bg-white rounded border shadow-lg">
                                <a href="{{ route('show.project', $project->slug) }}">
                                    <img src="{{ asset('storage/projects_images/' . $project->cover_image) }}"
                                        class="object-cover w-full h-64" alt="" />
                                    <div class="p-5 ">
                                        <div
                                            class="mb-3 flex flex-col gap-3 text-xs font-semibold tracking-wide uppercase">
                                            <a href="/"
                                                class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700"
                                                aria-label="Category" title="traveling">{{ $project->status }}</a>
                                            <!--progress bar-->
                                            <div class="progress-container text-sm pr-3">
                                                <div class="progress-bar w-full " data-effect="1"
                                                    data-value="{{ $project->progress_indicator }}" data-skill="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-4">
                                            <a href="/" aria-label="Category" title="Visit the East"
                                                class="inline-block mb-3 text-sm font-semibold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">{{ $project->title }}</a>


                                        </div>
                                </a>
                            </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div x-show="activeTab===1">
            <div id="completed"
                class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                {{-- COMPLETED PROJECTS --}}
                <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                    @foreach ($completedProjects as $project)
                        <div class="  overflow-hidden transition-shadow duration-300 bg-white rounded shadow-lg">
                            <a href="{{ route('show.project', $project->slug) }}">
                                <img src="{{ asset('storage/projects_images/' . $project->cover_image) }}"
                                    class="object-cover w-full h-64" alt="" />
                                <div class="p-5 ">
                                    <div class="mb-3 flex flex-col gap-3 text-xs font-semibold tracking-wide uppercase">
                                        <a href="/"
                                            class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700"
                                            aria-label="Category" title="traveling">{{ $project->status }}</a>
                                        <!--progress bar-->
                                        <div class="progress-container text-sm pr-3">
                                            <div class="progress-bar w-full " data-effect="1"
                                                data-value="{{ $project->progress_indicator }}" data-skill="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-4">
                                        <a href="/" aria-label="Category" title="Visit the East"
                                            class="inline-block mb-3 text-sm font-semibold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">{{ $project->title }}</a>

                                    </div>


                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div x-show="activeTab===2">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                {{-- IN PROGRESS PROJECTS --}}
                <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                    @foreach ($inProgressProjects as $project)
                        <div class="  overflow-hidden transition-shadow duration-300 bg-white rounded shadow-lg">
                            <a href="{{ route('show.project', $project->slug) }}">
                                <img src="{{ asset('storage/projects_images/' . $project->cover_image) }}"
                                    class="object-cover w-full h-64" alt="" />
                                <div class="p-5 ">
                                    <div class="mb-3 flex flex-col gap-3 text-xs font-semibold tracking-wide uppercase">
                                        <a href="/"
                                            class="transition-colors duration-200 text-blue-gray-900 hover:text-deep-purple-accent-700"
                                            aria-label="Category" title="traveling">{{ $project->status }}</a>
                                        <!--progress bar-->
                                        <div class="progress-container text-sm pr-3">
                                            <div class="progress-bar w-full " data-effect="1"
                                                data-value="{{ $project->progress_indicator }}" data-skill="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-4">
                                        <a href="/" aria-label="Category" title="Visit the East"
                                            class="inline-block mb-3 text-sm font-semibold leading-5 transition-colors duration-200 hover:text-deep-purple-accent-700">{{ $project->title }}</a>


                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div x-show="activeTab===3">Content 4</div>
    </div>
</div>

@section('script')
    <script>
        // console.log(hash);

        function tabs() {
            return {
                previousTab: 0,
                activeTab: 0,
                width: 0,
                x: 0,

                setWidthAndXFromElement(element) {
                    const width = element.clientWidth
                    const x = element.offsetLeft

                    this.x = x
                    this.width = width
                },

                container: {
                    ['x-on:load.window']() {
                        const element = this.$refs.tabs.children[0]

                        this.setWidthAndXFromElement(element)
                        console.log(element)
                        element.classList.add('text-green-600')

                        var hash = document.location.hash

                        if (hash == '#completed') {
                            this.activeTab = 1
                        } else if (hash == '#in-progress') {
                            this.activeTab = 2
                        } else if (hash == '#proposed') {
                            this.activeTab = 3
                        } else {
                            this.activeTab = 0
                        }

                    },
                },

                indicator: {
                    ['x-bind:style']() {
                        return `width: ${this.width}px; transform: translateX(${this.x}px)`
                    }
                },

                tab: {
                    ['@click'](event) {
                        const element = event.target

                        this.setWidthAndXFromElement(element)

                        this.previousTab = this.activeTab

                        this.activeTab = Array
                            .from(this.$refs.tabs.children)
                            .indexOf(element)
                        // console.log(this.activeTab)
                        this.$refs.tabs.children[this.previousTab]
                            .classList
                            .remove('text-green-600')

                        element.classList.add('text-green-600')
                    }
                }
            }
        }
    </script>
@endsection
