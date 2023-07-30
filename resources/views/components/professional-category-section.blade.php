@props(['procategory'])

<section class="text-gray-700 body-font border-t border-gray-200">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Find Fegomite by Professional Category</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whether you're looking to patronize a Fegomite business or in need of assistance, our network of professionals is here to help. Connect with experts in various fields, seek guidance, and explore opportunities for collaboration.</p>
        </div>

        <div class="flex flex-wrap -m-4">
            @foreach ($procategory as $category)
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <a href="{{ route('category', $category->slug) }}">
                        <div class="border border-gray-300 p-6 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-lg">
                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-4">
                                <i class="{{ $category->icon }} fa-2xl"></i>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $category->name }}</h2>
                            <p class="leading-relaxed text-base">{{ $category->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mx-auto container flex justify-center">
        <x-button green href="{{ route('category.index') }}" label="Checkout more Professional Categories" />
    </div>
</section>
