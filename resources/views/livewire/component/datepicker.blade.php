<div>
    <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-2 sm:gap-6">
        <x-datetime-picker class="sm:mb-0 mb-4" without-time label="Entry Year" placeholder="Entry Year"
            wire:model.defer="entry_year_id" name="entry_year_id" :value="old('entry_year_id')" />

        <x-datetime-picker without-time label="Graduation Year" wire:model.defer="graduation_year_id"
            placeholder="Graduation Year" name="graduation_year_id" :value="old('graduation_year_id')" />
    </div>
</div>
