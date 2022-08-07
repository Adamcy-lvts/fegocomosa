<div>
    <div x-data="app" class="w-full md:w-8/12 mx-auto py-24">

        <h1 class="text-xl uppercase pb-12">Build Your Resume</h1>
        <x-card>
            <!-- Navigation indicator -->
            <div class="border-b pb-4">
                <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                    x-text="`Step: ${step} of 4`"></div>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">

                    <div class="flex-1">
                        <div x-show="step === 1">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Education</div>
                        </div>

                        <div x-show="step === 2">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Work Experience</div>
                        </div>

                        <div x-show="step === 3">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Skills And Hobbies
                            </div>
                        </div>

                        <div x-show="step === 4">
                            <div class="text-lg font-bold text-gray-700 leading-tight">Your Refrences</div>
                        </div>
                    </div>

                    <div class="flex items-center md:w-64">
                        <div class="w-full bg-white rounded-full mr-2">
                            <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                :style="'width: ' + parseInt(step / 4 * 100) + '%'"></div>
                        </div>
                        <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 4 * 100) +'%'"></div>
                    </div>
                </div>
            </div>
            {{-- STEP 1 --}}
            <div x-show.transition="step === 1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="col-span-1 md:col-span-2">
                        <x-input label="Institution Name" placeholder="Institution Name"
                            wire:model.defer="institutionName" />
                    </div>


                    <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-7 gap-5 md:gap-5">
                        <div class="col-span-1 md:col-span-4">
                            <x-input label="Qualification" placeholder="Degree, Diploma Certificate..."
                                wire:model.defer="qualification" />
                        </div>

                        <div class="col-span-1 md:col-span-3">
                            <x-input label="Field of Study" placeholder="Field of Study"
                                wire:model.defer="fieldStudied" />
                        </div>
                    </div>

                    <x-datetime-picker without-time label="Start Date" placeholder="Start Date"
                        wire:model.defer="startDate" />
                    <x-datetime-picker without-time label="End Date" placeholder="End Date"
                        wire:model.defer="endDate" />


                </div>
            </div><!-- step 1 ending -->
            <div x-show.transition="step === 2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-2 md:gap-5">

                        <x-input label="Job Title" placeholder="Job Title" wire:model.defer="jobTitle" />

                        <x-input label="Company/Institution" placeholder="Company/Institution/Employer"
                            wire:model.defer="employer" />

                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <x-textarea label="Description" placeholder="Description of the job, Position, Responsibity"
                            wire:model.defer="description" />
                    </div>

                    <x-datetime-picker without-time label="Starting Date" placeholder="Starting Date"
                        wire:model.defer="startingDate" />
                    <x-datetime-picker without-time label="Ending Date" placeholder="Ending Date"
                        wire:model.defer="endingDate" />


                </div>
            </div><!-- step 2 ending -->
            <div x-show.transition="step === 3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="col-span-1 md:col-span-2">
                        <x-input label="Skill" placeholder="Skill" wire:model.defer="skill" />
                        <x-input label="Rating" placeholder="Rating" wire:model.defer="rating" />
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <x-input label="Hobby" placeholder="Your Hobbies and Interests"
                            wire:model.defer="hobbyInterest" />
                    </div>


                </div>
            </div><!-- step 3 ending -->
            <div x-show.transition="step === 4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="col-span-1 md:col-span-2">
                        <x-input label="Full Name" placeholder="Full Name" wire:model.defer="fullName" />
                    </div>

                    <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-7 md:gap-5">
                        <div class="col-span-1 md:col-span-4">
                            <x-input label="Email" placeholder="example@mail.com" wire:model.defer="email" />
                        </div>

                        <div class="col-span-1 md:col-span-3">
                            <x-inputs.phone mask="(###)-####-####" label="Phone" placeholder="Phone"
                                wire:model.defer="phone" />
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-7 gap-5 md:gap-5">
                        <div class="col-span-1 md:col-span-4">
                            <x-input label="Work At" placeholder="Microsoft, University of Maiduguri"
                                wire:model.defer="workAt" />
                        </div>

                        <div class="col-span-1 md:col-span-3">
                            <x-input label="Job Position" placeholder="Lecturer, Professor of Computer Science"
                                wire:model.defer="jobPosition" />
                        </div>
                    </div>


                </div>
            </div><!-- step 4 ending -->

            <!-- bottom navigation -->


            <x-slot name="footer">
                <div class="flex justify-between">
                    <div x-show.transition="step === 1">
                        <x-button type="button" wire:click="education" green outline
                            label="Sumbit Education Details" />
                    </div>
                    <div x-show.transition="step === 2">
                        <x-button type="button" wire:click="experience" green outline
                            label="Sumbit Experience Details" />
                    </div>
                    <div x-show.transition="step === 3">
                        <x-button type="button" wire:click="skill" green outline label="Sumbit Skill Details" />
                    </div>
                    <div x-show.transition="step === 4">
                        <x-button type="button" wire:click="reference" green outline
                            label="Sumbit Reference Details" />
                    </div>

                    <div class="flex items-center gap-x-3 justify-end">
                        <x-button type="button" x-show="step > 1" label="Previous" @click="step--" />
                        <x-button type="button" x-show="step < 4" label="Next" @click="step++" />
                        <x-button type="button" wire:click="Resume" x-show="step === 4" green label="Submit" />
                    </div>
                </div>
            </x-slot>
        </x-card>
    </div>
</div>
