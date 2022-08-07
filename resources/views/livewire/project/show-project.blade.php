<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-col">
            <div class="lg:w-4/6 mx-auto">
                <h1 class="text-lg md:text-2xl mb-4">{{ $project->title }}</h1>
                <div class="rounded-lg ">
                    <div class="image-slider" data-carousel>
                        @forelse ($project->images as $image)
                            <div class="carousel-cell">
                                <img alt="content" class="carousel-cell-image block md:w-4/4  w-full"
                                    src="{{ asset('storage/photos/' . $image->images) }}">
                                <div class="overlay"></div>
                                <div class="inner">
                                    <h2 class="title">{{ $image->caption }}</h2>
                                </div>
                            </div>
                        @empty
                            <p>No images for this project yet!</p>
                        @endforelse
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:w-2/3 text-center sm:pr-8 sm:py-8">
                            <!-- Project Info -->
                            <h1 class="text-sm md:text-2xl mb-4">Project Details</h1>
                            <div class="flex md:gap-5 flex-col text-left text-sm">
                                <div class="flex flex-col gap-4 mb-4 md:mb-0 ">
                                    <div class="flex justify-between">
                                        <div class="text-left">Proposed By</div>
                                        <div class="text-left">{{ $project->proposed_by }}</div>
                                    </div>

                                    @php
                                        $startingDate = Carbon\Carbon::parse($project->starting_date);
                                        $completionDate = Carbon\Carbon::parse($project->completion_date);
                                    @endphp
                                    <div class="flex justify-between">
                                        <div class="text-left">Executed By</div>
                                        <div class="text-left">{{ $project->executed_by }}</div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>Staring Date</div>
                                        <div>{{ $startingDate->format('jS F Y') }}</div>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-4 ">
                                    <div class="flex justify-between">
                                        <div>Completion Date</div>
                                        <div>{{ $completionDate->format('jS F Y') }}</div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div>Budget</div>
                                        <div><span> &#x20A6;</span>{{ number_format($project->budget) }}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div
                            class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="leading-relaxed text-base mb-4">{{ $project->body }}</p>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
