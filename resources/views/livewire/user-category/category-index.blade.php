<div>
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Find Fegomite by
                    Professional
                    Category</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-base">Fegocomosa has wide a range professionals and
                    Businnes Moguls working from all over the world, patronize a fegomite business, need help? contact
                    fegomite prfofessionals </p>
            </div>

            <div class="flex flex-wrap -m-4">
                @foreach ($membersCategories as $category)
                    <div class="xl:w-1/3 md:w-1/2 p-4 ">
                        <a href="{{ route('category', $category->slug) }}">

                            <div
                                class="border border-gray-300 hover:border-green-500 shadow-xl  hover:bg-green-500 text-gray-900 hover:text-white inline-flex items-center flex-col  p-6 rounded-lg">
                                <div
                                    class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-4">
                                    <i class="{{ $category->icon }} fa-3x"></i>
                                </div>
                                <div class="text-center">
                                    <h2 class="text-lg   font-medium title-font mb-2">
                                        {{ $category->name }}
                                    </h2>
                                    <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist
                                        co,
                                        subway
                                        tile poke farm.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>

    </section>
</div>
