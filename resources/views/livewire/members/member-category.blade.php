<div>


    <div class=" container mx-auto px-10">
        <div class="py-8">
            <h1 class="text-lg">Search or Filter Members</h1>
            <p>you can search member by first name, last name, graduation year, class in school or you can filter
                members based on their state, lga, profession, or by thier house when in FGCM.</p>
        </div>
        <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-4 sm:gap-6 ">
            <x-native-select label="Record Per Page" wire:model="pagination">
                <option>5</option>
                <option>10</option>
                <option>15</option>
            </x-native-select>

            <x-native-select label="Filter by State" wire:model="FilterByState" placeholder="Filter By State">
                @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </x-native-select>

            @if (!is_null($cities))
                <x-native-select label="Filter by City" placeholder="Filter by City" wire:model="FilterByCity">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </x-native-select>
            @endif

            <x-native-select label="Filter By Profession" placeholder="Filter By Profession"
                wire:model="FilterByProfession">
                @foreach ($professionCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-native-select>

            <x-native-select label="Filter By House" placeholder="Filter By House" wire:model="selectedHouseFilter">
                @foreach ($houses as $house)
                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                @endforeach
            </x-native-select>

            <x-native-select label="Filter By Graduation Year" placeholder="Filter By Graduation Year"
                wire:model="selectedYear">
                @foreach ($years as $year)
                    <option value="{{ $year->id }}">{{ $year->year }}</option>
                @endforeach
            </x-native-select>

        </div>

        <div class="flex gap-2 flex-wrap">
            @foreach ($professionCategories as $category)
                <x-button href="{{ route('category.members', $category->slug) }}" sm dark
                    label="{{ $category->name }}" />
            @endforeach
            <x-button href="{{ route('all.members') }}" sm dark label="All Members" />
        </div>

        <div class="col-span-1 sm:col-span-2">
            <x-input icon="search" label="Name" wire:model.debounce.500ms="search"
                placeholder="Search by First Name, Last Name, State" />
        </div>

        <div class="col-span-1  lg:col-span-4 lg:grid lg:grid-cols-4 lg:gap-6">
            @foreach ($members as $member)
                <div class="cards">

                    <div class="cards-image waves-effect waves-block waves-light">
                        <img class="" src="{{ asset('storage/photos/' . $member->potrait_image) }}" />
                    </div>
                    <div class="cards-content">
                        <span class="cards-title activator grey-text text-darken-4">
                            {{ $member->first_name . ' ' . $member->last_name }}
                        </span>
                        {{-- <p><a href="#">This is a link</a></p> --}}
                        <span class="text-sm  text-gray-800">{{ $member->profession }}</span>
                        <p class="text-sm lg:text-base">Here is some more information about this product that is
                            only
                            revealed once clicked on. </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</div>
