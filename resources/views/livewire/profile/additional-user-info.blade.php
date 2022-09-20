<div>
    <div class="mt-5 mx-auto w-full md:w-10/12">
        <x-card title="Add Your Social Media Links">
            <x-errors class="mb-4" />

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <x-input class="!pl-[6.5rem]" label="Facebook" prefix="https://www."
                    placeholder="facebook.com/your-username" wire:model.defer="facebook" />

                <x-input class="!pl-[6.5rem]" label="Twitter" prefix="https://www."
                    placeholder="twitter.com/your-username" wire:model.defer="twitter" />
                <x-input class="!pl-[6.5rem]" label="Instagram" placeholder="instagram.com/your-username/"
                    wire:model.defer="instagram" prefix="https://www." />
                <x-input class="!pl-[4rem]" label="Whatsapp" placeholder="wa.me/your-phone-number"
                    wire:model.defer="whatsapp" prefix="https://" />
                <x-input class="!pl-[4rem]" label="Telegram" placeholder="t.me/your-username"
                    wire:model.defer="telegram" prefix="https://" />
                <x-input class="!pl-[6.5rem]" label="LinkedIn" placeholder="linkedin.com/in/username"
                    wire:model.defer="linkedin" prefix="https://www." />
                <x-input class="!pl-[6.5rem]" wire:model.defer="website" label="Website" placeholder="your-website.com"
                    prefix="https://www." />


            </div>

            <x-slot name="footer">
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="cancel" label="Cancel" flat />
                    <x-button wire:click="addSocialMediaLinks" label="Save" green />
                </div>
            </x-slot>
        </x-card>
    </div>

</div>
