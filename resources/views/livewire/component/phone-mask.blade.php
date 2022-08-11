<div>
    <div class="col-span-1 sm:col-span-3">
        <x-inputs.phone mask="(###)-####-####" name="phone" :value="old('phone')" label="Phone" wire:model.defer="phone"
            placeholder="Phone" />
    </div>
</div>
