<div>
    <div class="col-span-1 sm:col-span-3">
        <x-inputs.phone mask="(###)-####-####" type="tel" name="phone" :value="old('phone')" label="Phone*"
            wire:model.defer="phone" placeholder="Phone"
            class=" focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50" />
    </div>
</div>
