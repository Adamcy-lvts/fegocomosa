<div>
    <div>

        <x-slot name="header">
            {{ __('Edit Resume') }}
        </x-slot>


        <div x-cloak class="mx-auto w-full md:w-10/12 pt-12 py-24">
            {{-- EDUCATION TABLE --}}
            <div class="mb-5" x-data="{ open: true }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Hide Education Table') }}' : '{{ __('Show Education Table') }}'" outline
                        green />
                </div>

                <div x-show="open" x-transition.duration.500ms>

                    @include('livewire.user-dashboard.resume.resume-tables.education-table', [
                        'educations' => $educations,
                    ])
                </div>

            </div>

            {{-- EXPERIENCE TABLE --}}

            <div class="mb-5" x-data="{ open: true }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Hide Experience Table') }}' : '{{ __('Show Experience Table') }}'"
                        outline green />
                </div>

                <div x-show="open" x-transition.duration.500ms>


                    @include('livewire.user-dashboard.resume.resume-tables.experience-table', [
                        'experiences' => $experiences,
                    ])
                </div>

            </div>


            {{-- REFERENCE TABLE --}}
            <div class="mb-5" x-data="{ open: false }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Hide Reference Table') }}' : '{{ __('Show Reference Table') }}'" outline
                        green />
                </div>

                <div x-show="open" x-transition.duration.500ms>

                    @include('livewire.user-dashboard.resume.resume-tables.reference-table', [
                        'references' => $references,
                    ])
                </div>

            </div>

            {{-- SKILL TABLE --}}
            <div class="mb-5" x-data="{ open: false }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Hide Skill Table') }}' : '{{ __('Show Skill Table') }}'"
                        label="Show Skill Table" outline green />
                </div>

                <div x-show="open" x-transition.duration.500ms>

                    @include('livewire.user-dashboard.resume.resume-tables.skill-table', [
                        'skills' => $skills,
                    ])
                </div>

            </div>

            {{-- HOBBY TABLE --}}
            <div class="mb-5" x-data="{ open: false }">
                <div class="mb-4 mt-12">
                    <x-button x-on:click="open = ! open"
                        x-text="open ? '{{ __('Hide Hobby Table') }}' : '{{ __('Show Hobby Table') }}'"
                        label="Show Hobby Table" outline green />
                </div>

                <div x-show="open" x-transition.duration.500ms>

                    @include('livewire.user-dashboard.resume.resume-tables.hobby-table', [
                        'hobbys' => $hobbys,
                    ])
                </div>

            </div>


        </div>
    </div>
</div>
