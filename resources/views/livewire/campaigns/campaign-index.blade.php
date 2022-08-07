<div>

    @auth
        @livewire('navigation-menu')
    @endauth

    <x-guest-menu />
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Donate to a Charity
                        Fundraiser, </h1>
                    <div class="h-1 w-32 bg-green-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon
                    brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard
                    of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
            </div>
            <div class="text-xs xs:text-sm mb-4 text-gray-300">
                {{ $campaigns->links() }}
            </div>
            <div class="flex flex-wrap -m-4 mb-4">

                @foreach ($campaigns as $campaign)
                    <a href="{{ route('campaigns.show', $campaign->slug) }}">
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <div class="bg-gray-100 p-6 border rounded-lg">
                                <img class=" rounded w-full object-cover object-center mb-6"
                                    src="{{ asset('storage/campaign_images/' . $campaign->cover_image) }}"
                                    alt="content">
                                <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                    Organizer: {{ $campaign->organizer->org_name }}</h3>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                    {{ $campaign->campaign_title }}</h2>
                                <p class="leading-relaxed text-base">{{ $campaign->description }}</p>
                            </div>
                    </a>
            </div>
            @endforeach

        </div>
        <div class="text-xs xs:text-sm mb-4 text-gray-300">
            {{ $campaigns->links() }}
        </div>
</div>
</section>
</div>
