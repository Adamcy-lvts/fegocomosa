<div>
    <!-- COMMENT SECTION -->
    <div class="antialiased ">
        {{-- <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3> --}}

        <div class="space-y-4">

            <div class="flex flex-col w-full">

                @if (count((array) $comments))
                    @foreach ($comments as $comment)
                        <div class="flex flex-row">
                            <div class="flex-shrink-0 mr-3">
                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                                    src="{{ asset('storage/' . $comment->user->profile_photo_path) }}" alt="">
                            </div>
                            <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                <div class="text-left">
                                    <strong>{{ $comment->user->username }}</strong> <span
                                        class="text-xs ml-2 text-gray-400">{{ $comment->created_at->DiffForHumans() }}</span>
                                    <p class="text-sm mb-3">
                                        {{ $comment->comment }}
                                    </p>
                                </div>

                                <div class="text-xs flex justify-between ">
                                    <div class="flex gap-2">
                                        <div wire:click="replyToParent({{ $comment->id }})"
                                            class="mt-3 text-xs text-blue-500 cursor-pointer">
                                            REPLY</div>

                                        @if ($comment->likedBy(auth()->user()))
                                            <div class="flex justify-around">
                                                <div class="mr-1 mt-2.5 text-green-500 cursor-pointer">
                                                    <i wire:click="unlikeComment({{ $comment }})"
                                                        class="fa-solid fa-thumbs-up fa-lg"></i>
                                                </div>
                                                <div class="text-sm mt-2">{{ $comment->likes->count() }}
                                                    {{ Illuminate\Support\Str::plural('like', $comment->likes->count()) }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex justify-around">
                                                <div class="mr-1 mt-2.5 text-blue-500 cursor-pointer">
                                                    <i wire:click="likeComment({{ $comment->id }})"
                                                        class="fa-solid fa-thumbs-up fa-lg"></i>

                                                </div>
                                                <div class="text-sm mt-2">{{ $comment->likes->count() }}
                                                    {{ Illuminate\Support\Str::plural('like', $comment->likes->count()) }}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    {{-- Edit and Delete Buttons --}}
                                    @if ($comment->user->id === auth()->user()->id)
                                        <div class="flex gap-2">
                                            <x-button xs wire:click="edit({{ $comment->id }})" flat label="EDIT" />
                                            <x-button xs wire:click="delete({{ $comment->id }})" flat negative
                                                label="DELETE" />
                                        </div>
                                    @endif

                                </div>
                                {{-- Reply Comment Section --}}
                                @if ($replyComment && $comment->id === $commentId)
                                    <div class="flex mt-2 ml-8 flex-col gap-2">
                                        <x-textarea wire:model.defer="repliedComment"
                                            placeholder="Replying To {{ $parentCommentator }}" />
                                        <x-button xs wire:click="repliedToParent" label="Submit" />
                                    </div>
                                @endif


                                {{-- Edit Comment Section --}}
                                @if ($editComment && $comment->user->id === auth()->user()->id && $comment->id === $commentId)
                                    <div class="flex mt-2 flex-col gap-2">
                                        <x-textarea wire:model.defer="editedComment" placeholder="Edit comment" />
                                        <x-button xs wire:click="updateComment" label="Submit" />
                                    </div>
                                @endif
                                @if ($comment->replies)
                                    @include('livewire.blog.child-comment-list', [
                                        'comments' => $comment->replies,
                                    ])
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>
