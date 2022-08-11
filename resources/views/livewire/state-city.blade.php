<div>

    <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-2 sm:gap-6">
        <x-native-select class="sm:mb-0 mb-5" name="state_id" label="State" placeholder="State" wire:model="selectedState">
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </x-native-select>

        <x-native-select name="city_id" label="City" placeholder="City" wire:model="selectedCity">
            @if (!is_null($cities))
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            @endif
        </x-native-select>
    </div>
</div>
