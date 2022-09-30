<div>
    @push('blog-styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/content-styles.css') }}">
    @endpush

    <section class="text-gray-600 body-font relative">
        <div class="w-full p-4  sm:p-16  bg-gray-600 ">
            <div class=" md:w-8/12 mx-auto">
                <h1 class="antialiased sm:text-7xl text-lg mb-5 font-semibold text-gray-200 ">
                    {{ $post->title }}
                </h1>
                {{-- <h3 class="antialiased text-base sm:text-2xl text-gray-200 ">True fans will remember these
                    moments
                    all too
                    well.
                </h3> --}}
            </div>
        </div>
        <div class="container px-5 py-24 pt-0 mx-auto flex flex-col">

            <div class="lg:w-5/6 mx-auto">
                <div class="flex p-5 gap-3 overflow-x-auto">
                    <a class=" text-base text-gray-500 " href="{{ route('posts') }}">Blog</a>
                    <i class="fa-thin fa-chevron-right"></i>
                    <a class=" text-base text-gray-500 "
                        href="{{ route('category.post', $post->category->slug) }}">{{ $post->category->name }}</a>
                    <i class="fa-thin fa-chevron-right"></i>
                    <a class="hidden md:block text-xs sm:text-base text-gray-500 font-bold">{{ $post->title }} </a>
                </div>
                <div class="flex flex-col sm:flex-row mt-10">
                    <div class="sm:w-1/3  text-center sm:pr-8 sm:py-8">
                        <div class="hidden md:block">
                            <div
                                class="w-32 h-32 rounded inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                <img class="absolute object-cover w-32 h-32 rounded"
                                    src="{{ asset('storage/' . $post->user->profile_photo_path) }}" alt="Person" />
                            </div>
                            <div class="flex flex-col mb-5 items-center text-center justify-center">
                                <p class="mb-3 text-xs font-semibold text-gray-800">Author</p>
                                <p class="text-lg font-bold">
                                    {{ $post->user->first_name . ' ' . $post->user->last_name }}
                                </p>

                                <p class="text-sm">{{ $post->user->about_you }}</p>
                            </div>
                        </div>



                        <div class="hidden md:flex gap-4 flex-col">
                            <h2 class="text-2xl font-bold mb-3">Related Posts</h2>
                            @foreach ($relatedPosts as $relatedPost)
                                <a href="{{ route('posts.show', $relatedPost->slug) }}">
                                    <div class="relative h-64 w-full flex items-end justify-start text-left bg-cover bg-center"
                                        style="background-image:url({{ asset('storage/blog_images/' . $relatedPost->image) }});">
                                        <div
                                            class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
                                        </div>
                                        <div
                                            class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">
                                            <div class="text-white font-regular flex flex-col justify-start">
                                                <span
                                                    class="text-3xl leading-0 font-semibold">{{ presentDay($relatedPost->created_at) }}</span>

                                                <span
                                                    class="-mt-3">{{ presentMonth($relatedPost->created_at) }}</span>
                                            </div>
                                        </div>
                                        <main class="p-5 z-10">
                                            <a href="{{ route('posts.show', $relatedPost->slug) }}"
                                                class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">
                                                {{ \Illuminate\Support\Str::words($relatedPost->title, $limit = 6, $end = '...') }}

                                            </a>
                                        </main>

                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <h3 class="block sm:hidden text-sm font-bold text-gray-800"> Author:
                        {{ $post->user->first_name . ' ' . $post->user->last_name }}
                    </h3>
                    <div
                        class="  sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0  sm:text-left">
                        <h3 class="text-sm font-bold">Posted on: {{ $post->created_at->toFormattedDateString() }}
                        </h3>
                        <div class="ck-content mb-5">
                            <p class=" leading-relaxed text-2xl mb-4">{!! $post->body !!}</p>
                            <div class="mt-5 text-base">Show some love if you enjoyed it!
                                <div class=" text-2xl mb-4">
                                    @if ($latestPost->likedBy(auth()->user()))
                                        <div class=" ">
                                            <span class="text-green-500 cursor-pointer">
                                                <i wire:click="unlikePost({{ $latestPost }})"
                                                    class="fa-solid fa-thumbs-up fa-lg"></i>
                                            </span>

                                            <span class="text-lg">{{ $likes }}
                                                {{ Illuminate\Support\Str::plural('like', $likes) }}</span>
                                        </div>
                                    @else
                                        <div class=" ">
                                            <span class="text-blue-500 cursor-pointer">
                                                <i wire:click="likePost({{ $post->id }})"
                                                    class="fa-solid fa-thumbs-up fa-lg"></i>
                                            </span>

                                            <span class="text-lg">{{ $likes }}
                                                {{ Illuminate\Support\Str::plural('like', $likes) }}</span>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                        @livewire('blog.post-comment', ['post' => $post], key($post->id))

                        @include('livewire.blog.comment-list', ['comments' => $comments])

                    </div>

                </div>

                <div class="flex gap-4 w-full flex-wrap md:hidden ">
                    <h2 class="text-2xl font-bold mb-3">Related Posts</h2>
                    @foreach ($relatedPosts as $relatedPost)
                        <a class="w-full" href="{{ route('posts.show', $relatedPost->slug) }}">
                            <div class="relative h-64 w-full flex items-end justify-start text-left bg-cover bg-center"
                                style="background-image:url({{ asset('storage/blog_images/' . $relatedPost->image) }});">
                                <div
                                    class="absolute top-0 mt-20 right-0 bottom-0 left-0 bg-gradient-to-b from-transparent to-gray-900">
                                </div>
                                <div class="absolute top-0 right-0 left-0 mx-5 mt-2 flex justify-between items-center">

                                    <div class="text-white font-regular flex flex-col justify-start">
                                        <span
                                            class="text-3xl leading-0 font-semibold">{{ presentDay($post->created_at) }}</span>

                                        <span class="-mt-3">{{ presentMonth($post->created_at) }}</span>
                                    </div>
                                </div>
                                <main class="p-5 z-10">
                                    <div
                                        class="text-md tracking-tight font-medium leading-7 font-regular text-white hover:underline">
                                        {{ \Illuminate\Support\Str::words($relatedPost->title, $limit = 6, $end = '...') }}

                                    </div>
                                </main>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
</div>
