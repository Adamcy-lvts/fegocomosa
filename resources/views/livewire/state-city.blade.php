<div>

    <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-2 sm:gap-6">
        <x-native-select
            class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md sm:mb-0 mb-5"
            name="state_id" label="State" placeholder="State" :value="old('state_id')" wire:model="selectedState">
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </x-native-select>

        <x-native-select
            class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 "
            name="city_id" label="City" placeholder="City" wire:model="selectedCity" :value="old('city_id')">
            @if (!is_null($cities))
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            @endif
        </x-native-select>
    </div>
</div>
