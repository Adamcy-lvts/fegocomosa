<div>
    @auth
        @livewire('navigation-menu')
    @endauth



    <x-guest-menu />
    <section class="text-gray-600 body-font overflow-hidden">

        <div class="container lg:w-8/12 px-5 py-24 pb-5 mx-auto">

            <div class=" mx-auto flex flex-row flex-wrap">
                <div class="lg:w-1/2">
                    <img alt="ecommerce" class="w-full mb-2 lg:h-auto h-128 object-cover object-center rounded"
                        src="{{ asset('storage/photos/' . $campaigns->cover_image) }}">
                    <figcaption class="text-sm font-bold italic">{{ $campaign->caption }}</figcaption>
                </div>



                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-3 mt-6 lg:mt-0">

                    <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{ $campaigns->campaign_title }}
                    </h1>

                    <h2 class="text-sm title-font mb-5 text-gray-500 tracking-widest">
                        Created: {{ $campaigns->created_at->toDayDateTimeString() }}

                    </h2>

                    <h2 class="text-gray-900 text-2xl title-font font-medium mb-1">Organizer:
                        {{ $campaigns->organizer->org_name }}
                    </h2>
                    <p class="leading-relaxed">{{ $campaigns->description }}</p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                        <x-button wire:click="sendMessage" class="w-full  py-2 px-8" outline positive
                            label="Contact Organizer" />
                    </div>
                    @if ($contact)
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
                    @endif

                    <div class="flex -m-4 text-center mb-5">
                        <div class="p-4 md:w-2/4 sm:w-1/2 w-full">
                            <div class="border-2 text-center border-gray-200 px-8 py-4 rounded-lg">
                                <i class="fa-thin fa-chart-line-up fa-3x"></i>
                                @php
                                    $sumTotal = App\Models\Donation::where('campaign_id', $campaign->id)->sum('amount');
                                @endphp
                                <h2 class="title-font font-medium text-3xl text-gray-900">
                                    <span>&#x20A6;</span>{{ number_format($sumTotal) }}
                                </h2>
                                <p class="leading-relaxed">raised of <span> &#x20A6;</span>
                                    {{ number_format($campaigns->goal) }}
                                </p>
                            </div>
                        </div>
                        <div class="p-4 md:w-2/4 sm:w-1/2 w-full">
                            <div class="border-2 text-center border-gray-200 px-8 py-4 rounded-lg">
                                <i class="fa-thin fa-circle-dollar-to-slot fa-3x"></i>
                                <h2 class="title-font font-medium text-3xl text-gray-900">
                                    {{ count($campaign->donations) }}</h2>
                                <p class="leading-relaxed">Donations</p>
                            </div>
                        </div>
                    </div>
                    @livewire('campaigns.donate', ['campaigns' => $campaigns])
                </div>

            </div>
        </div>
    </section>
    <section class="text-gray-600 body-font">
        <div class="container pb-24 mx-auto lg:w-8/12 w-full flex flex-wrap ">
            <div class="lg:w-6/12 w-full px-5">
                {!! $campaign->about !!}
            </div>
            <div class="lg:w-5/12 w-full   rounded-lg p-4 flex flex-col md:ml-auto mt-10 md:mt-0">
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

    </section>



</div>
