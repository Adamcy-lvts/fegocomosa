<div>
    <section class="text-gray-600 body-font">
        <header class="text-gray-600 body-font">
            <nav class=" flex flex-wrap  border-b text-base ">
                @foreach ($categories as $category)
                    <div
                        class="flex grow  flex-wrap hover:text-gray-900 {{ Request::is('category/' . $category->slug) ? 'md:border-l-0 border-b-2 border-green-600' : '' }}">
                        <a class="p-4  w-full md:border-l"
                            href="{{ route('category.post', $category->slug) }}">{{ $category->name }}</a>
                    </div>
                @endforeach

            </nav>
        </header>

        <div class="container px-5 py-24 mx-auto">
            <div class="text-xs xs:text-sm mb-4 text-gray-300">
                {{ $posts->links() }}
            </div>
            <div class="flex flex-wrap -m-4 mb-4">
                @foreach ($posts as $post)
                    <div class="p-4 lg:w-1/3 ">
                        <div class="h-full shadow-xl  rounded-lg overflow-hidden">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <img class=" w-full object-cover object-center"
                                    src="{{ asset('storage/blog_images/' . $post->image) }}" alt="blog">
                                <div class="p-6 pb-2 border-b  border-coolGray-100">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">

                                        {{ $post->category->name }}

                                    </h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-1">
                                        {{ \Illuminate\Support\Str::words($post->title, $limit = 7, $end = '...') }}
                                    </h1>
                                </div>
                            </a>

                            <div
                                class="flex flex-wrap divide-y md:divide-y-0 md:divide-x divide-coolGray-100 lg:text-center">
                                <div class="w-full md:w-3/6 p-3">
                                    <div class="flex items-center text-center">
                                        <img class="h-10 w-10 object-cover rounded"
                                            src="{{ asset('storage/' . $post->user->profile_photo_path) }}"
                                            alt="image">
                                        <div class="pl-3 md: text-xs text-gray-600">
                                            <p class="truncate font-bold">
                                                {{ $post->user->first_name . ' ' . $post->user->last_name }}</p>
                                            <time>{{ $post->created_at->toFormattedDateString() }}</time>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/6 p-3 text-xs">
                                    <div class="">Likes</div>
                                    <i class="fa-solid fa-thumbs-up"></i><span
                                        class="ml-2 font-bold">{{ $post->likes->count() }}</span>

                                </div>
                                <div class="w-full  md:w-1/6 p-3 text-xs">
                                    <div class="">Comments</div>
                                    <i class="fa-solid fa-comment"></i><span
                                        class="ml-2  font-bold">{{ $post->comments->count() }}</span>
                                </div>
                                <div class="w-full md:w-1/6 p-3 text-xs">
                                    <div class="">Views</div>
                                    <i class="fa-solid fa-eye"></i><span
                                        class="ml-2 font-bold">{{ $post->reads }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <span class="text-xs xs:text-sm mb-7 text-gray-300">
                {{ $posts->links() }}
            </span>
        </div>
    </section>
</div>
