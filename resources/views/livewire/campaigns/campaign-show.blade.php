@push('ck-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ckeditor.css') }}">
@endpush
<div>

    @auth
        @livewire('navigation-menu')
    @endauth
    <section class="text-gray-600 body-font overflow-hidden">

        <div class="container lg:w-8/12 px-5 py-24 pb-5 mx-auto">

            <div class=" mx-auto flex flex-row flex-wrap">
                <div class="lg:hidden block">
                    <h1 class=" text-gray-900 text-2xl title-font font-medium mb-1">{{ $campaign->campaign_title }}
                    </h1>

                    <h2 class="text-sm title-font mb-5 text-gray-500 tracking-widest">
                        Created: {{ $campaign->created_at->toDayDateTimeString() }}

                    </h2>

                    <h2 class="text-gray-900 text-2xl title-font font-medium mb-1">Organizer:
                        {{ $campaign->organizer->organizer_name }}
                    </h2>
                    <p class="leading-relaxed">{{ $campaign->description }}</p>
                </div>
                <div class="lg:w-1/2">
                    <img alt="ecommerce" class="w-full mb-2 lg:h-auto h-128 object-cover object-center rounded"
                        src="{{ asset('storage/campaigns_images/' . $campaign->cover_image) }}">
                    <figcaption class="text-sm font-bold italic mb-4">{{ $campaign->caption }}</figcaption>
                    <div class="target w-full pr-5">
                        {!! $campaign->about !!}
                    </div>
                </div>



                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-3 mt-6 lg:mt-0">

                    <div class="hidden lg:block">
                        <h1 class=" text-gray-900 text-2xl title-font font-medium mb-1">
                            {{ $campaign->campaign_title }}
                        </h1>

                        <h2 class="text-sm title-font mb-5 text-gray-500 tracking-widest">
                            Created: {{ $campaign->created_at->toDayDateTimeString() }}

                        </h2>

                        <h2 class="text-gray-900 text-2xl title-font font-medium mb-1">Organizer:
                            {{ $campaign->organizer->organizer_name }}
                        </h2>
                        <p class="leading-relaxed">{{ $campaign->description }}</p>
                    </div>
                    <div x-cloak>
                        {{-- CONTACT ORGANIZER FORM --}}
                        <div id="contactform" class="mb-5" x-data="{ open: false }">
                            <div class="mb-4 mt-12">
                                <x-button x-on:click="open = ! open"
                                    x-text="open ? '{{ __('Contact Organizer') }}' : '{{ __('Contact Organizer') }}'"
                                    class="w-full  py-2 px-8" outline positive />
                            </div>

                            <div x-show="open" x-transition.duration.500ms>

                                <div class="col-span-1 sm:col-span-2 mb-2">
                                    <x-input placeholder="Name" wire:model.defer="fullName" />
                                </div>
                                <div class="col-span-1 sm:col-span-2 mb-2">
                                    <x-input placeholder="Email" wire:model.defer="email" />
                                </div>
                                <div class="col-span-1 sm:col-span-2 mb-2">
                                    <x-textarea placeholder="Message" wire:model.defer="message" />
                                </div>
                                <x-button wire:click="MessageOrganizer" class="w-full  py-2 px-8" outline positive
                                    label="Submit" />

                            </div>
                        </div>
                        {{-- FEEDBACK MESSAGE --}}
                        <div class="hidden py-8">
                            <div id="showFeedback"
                                class="hidden bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md"
                                role="alert">
                                <div class="flex">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                                        </svg></div>
                                    <div>
                                        <p class="font-bold">Message Delivered!</p>
                                        <p class="text-sm">The Organizer will get back to you as
                                            soon
                                            as
                                            possible</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row -m-4 text-center mb-5">
                        <div class="p-4 lg:w-2/4  w-full">
                            <div class="border text-center border-gray-200 px-8 py-4 rounded-lg">
                                <i class="fa-thin fa-chart-line-up fa-3x"></i>

                                <h2 class="title-font font-medium text-3xl text-gray-900">
                                    <span> &#x20A6; </span>{{ number_format($donationSumTotal) }}
                                </h2>
                                <p class="leading-relaxed">raised of <span> &#x20A6;</span>
                                    {{ number_format($campaign->goal) }}
                                </p>
                            </div>
                        </div>
                        <div class="p-4 lg:w-2/4 flex-grow-1 w-full">
                            <div class="border text-center border-gray-200 px-8 py-4 rounded-lg">
                                <i class="fa-thin fa-circle-dollar-to-slot fa-3x"></i>
                                <h2 class="title-font font-medium text-3xl text-gray-900">
                                    {{ count($campaign->donations) }}</h2>
                                <p class="leading-relaxed">Donations</p>
                            </div>
                        </div>
                    </div>
                    @livewire('campaigns.donate', ['campaign' => $campaign])

                    <div class="flex flex-wrap flex-col -m-2">

                        <div class="p-2 lg:w-3/3 md:w-2/2 w-full">
                            @foreach ($campaign->donations as $donation)
                                <div class="mb-2 flex items-center border-gray-200 border p-4 rounded-lg">

                                    @if (isset($donation->user->profile_photo_path) && $donation->user->profile_photo_path)
                                        <img alt="team"
                                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                            src="{{ asset('storage/' . $donation->user->profile_photo_path) }}">
                                    @else
                                        <i
                                            class="w-16 h-16 object-cover bg-gray-200 object-center flex-shrink-0 rounded-full mr-4 fa-thin fa-dove fa-3x"></i>
                                    @endif

                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium">
                                            {{ $donation->donor->full_name }}
                                        </h2>
                                        <p class="text-gray-500 text-sm"><span
                                                class="text-gray-800 font-bold mr-2 "><span>&#x20A6;</span>{{ number_format($donation->amount) }}</span>
                                            <span class="md:border-l md:border-gray-400"></span><span class="ml-2">
                                                {{ $donation->created_at->DiffForHumans() }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font">
        <div class="container pb-24 mx-auto lg:w-8/12 w-full flex flex-wrap ">

            <div class="lg:w-5/12 w-full   rounded-lg p-4 flex flex-col md:ml-auto mt-10 md:mt-0">

            </div>
        </div>

    </section>



</div>
@section('contactOrganizerScript')
    <script>
        Livewire.on('feedbackMessage', () => {

            var element = document.getElementById("contactform");
            element.classList.add("animate__animated", "animate__zoomOut");

            var HOne = document.getElementByTagName("h1");

            HOne.classList.add('target');

            setTimeout(function() {
                element.classList.add("hidden", "animate__animated", "animate__zoomOut",
                    "animate__delay-4s");
            }, 1000); //wait 1 seconds


            var feedBack = document.getElementById("showFeedback");

            feedBack.classList.remove("hidden");

            feedBack.classList.add("animate__animated", "animate__backInUp", "animate__zoomIn",
                "animate__delay-1s");


        })
    </script>
@endsection
