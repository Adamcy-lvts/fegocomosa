<div>
    <div class="flex flex-col mb-5 gap-4">
        <x-textarea class="w-full" label="Comments" wire:model.defer="comment" placeholder="write your Comment" />
        <x-button md dark label="Comment" wire:click="PostComment({{ $post->id }})" />
    </div>
</div>
