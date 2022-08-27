<div>
    <form wire:submit.prevent="pay">
        <div class="flex flex-col  md:flex-row gap-2">
            <h1 class="text-4xl text-gray-700">Yearly Membership Fee is <span>
                    &#x20A6;</span>10,000
            </h1>
            <input wire:model="paid" type="hidden" value="10000">
            <x-button wire:click="pay" class="w-full sm:w-0 py-2 px-8" green label="Pay" />
        </div>
    </form>
</div>
