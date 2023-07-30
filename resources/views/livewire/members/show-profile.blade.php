<div>

    {{-- <section class="text-gray-600 body-font overflow-hidden">

        <div class="container lg:w-8/12 px-5 py-24 pb-5 mx-auto">

            <div class=" mx-auto flex flex-row flex-wrap">

                <div class="lg:w-7/12">
                    <img alt="{{ $member->username }} image"
                        class="w-full mb-2 lg:h-auto h-128 object-cover object-center rounded"
                        src="{{ asset('storage/members_images/' . $member->potrait_image) }}">
                    <figcaption class="text-sm font-bold italic mb-4"></figcaption>
                    <div class=" w-full pr-5">

                    </div>
                </div>

                <div class="lg:w-5/12 w-full lg:pl-10 lg:py-3 mt-6 lg:mt-0">

                    <div class="flex flex-col gap-3 border rounded-lg  -m-4 p-4 mb-5">
                        <div class="py-4 p-2 border rounded-lg">
                            <h1 class="text-gray-700 bg-gray-300 rounded p-3 text-sm title-font font-medium mb-1">
                                About
                            </h1>
                            <p class="p-2 text-sm">{{ $member->about_you }}</p>
                        </div>
                        <div class="py-4 p-2 border rounded-lg">
                            <h1 class="text-gray-700 bg-gray-300 rounded p-3 text-sm title-font font-medium mb-1">
                                Personal Info
                            </h1>
                            <ul class="text-sm">
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Full Name:</span>
                                    {{ $member->first_name . ' ' . $member->middle_name . ' ' . $member->last_name }}
                                </li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Email:</span>
                                    {{ $member->email }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">phone:</span>
                                    {{ $member->phone }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Address:
                                    </span>{{ $member->address }}
                                </li>
                                @php
                                    $age = Carbon\Carbon::parse($member->date_of_birth)->diff(Carbon\Carbon::now())->y;
                                @endphp
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Age:</span>
                                    {{ $age }} years
                                </li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">City:</span>
                                    {{ $member->city->name }}
                                </li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">State:</span>
                                    {{ $member->state->name }}
                                </li>
                            </ul>
                        </div>
                        <div class="py-4 p-2 border rounded-lg">
                            <h1 class="text-gray-700 bg-gray-300 rounded p-3 text-sm title-font font-medium mb-1">
                                Fegocomosa Info
                            </h1>
                            <ul class="text-sm">
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Entry Year:</span>
                                    {{ $member->entryYear->year }}
                                </li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Graduation
                                        Year:</span>
                                    {{ $member->graduationYear->year }}
                                </li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Jss Class:</span>
                                    {{ $member->jss_class->class_name }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Sss Class:</span>
                                    {{ $member->sss_class->class_name }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">House:</span>
                                    {{ $member->house->name }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Registeration
                                        Date:</span>
                                    {{ $member->created_at->toDayDateTimeString() }}
                                </li>

                            </ul>
                        </div>
                        <div class="py-4 p-2 border rounded-lg">
                            <h1 class="text-gray-700 bg-gray-300 rounded p-3 text-sm title-font font-medium mb-1">
                                Professional Info
                            </h1>
                            <ul class="text-sm">
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">University
                                        Attended:</span>
                                    {{ $member->university }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Field of
                                        Study:</span>
                                    {{ $member->course_of_study }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Profession:</span>
                                    {{ $member->profession }}</li>
                                <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Work
                                        Address:</span>
                                    {{ $member->workplace }}</li>
                                @foreach ($member->categories as $category)
                                    <li class="p-2 hover:bg-gray-200 rounded"><span class="font-semibold">Profession
                                            Category:</span>
                                        {{ $category->name }}</li>
                                @endforeach


                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section> --}}

    {{-- <section class="text-gray-600 body-font overflow-hidden">
        <div class="container lg:w-8/12 px-5 py-24 pb-5 mx-auto">
            <div class="mx-auto flex flex-row flex-wrap">
                <div class="lg:w-7/12">
                    <img alt="{{ $member->username }} image"
                        class="w-full mb-2 lg:h-auto h-128 object-cover object-center rounded"
                        src="{{ asset('storage/members_images/' . $member->potrait_image) }}">
                    <figcaption class="text-sm font-bold italic mb-4"></figcaption>
                    <div class="w-full pr-5">
                    </div>
                </div>

                <div class="lg:w-5/12 w-full lg:pl-10 lg:py-3 mt-6 lg:mt-0">

                    <div class="flex flex-col gap-3 border rounded-lg bg-gray-100 p-4 mb-5">
                        <div class="py-2">
                            <h1 class="text-gray-700 text-lg font-medium mb-1">About</h1>
                            <p class="text-sm">{{ $member->about_you }}</p>
                        </div>
                        <div class="py-2">
                            <h1 class="text-gray-700 text-lg font-medium mb-1">Personal Info</h1>
                            <ul class="text-sm">
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Full Name:</span>
                                    {{ $member->first_name . ' ' . $member->middle_name . ' ' . $member->last_name }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Email:</span> {{ $member->email }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Phone:</span> {{ $member->phone }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Address:</span> {{ $member->address }}
                                </li>
                                @php
                                    $age = Carbon\Carbon::parse($member->date_of_birth)->diff(Carbon\Carbon::now())->y;
                                @endphp
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Age:</span> {{ $age }} years
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">City:</span> {{ $member->city->name }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">State:</span> {{ $member->state->name }}
                                </li>
                            </ul>
                        </div>
                        <div class="py-2">
                            <h1 class="text-gray-700 text-lg font-medium mb-1">Fegocomosa Info</h1>
                            <ul class="text-sm">
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Entry Year:</span> {{ $member->entryYear->year }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Graduation Year:</span>
                                    {{ $member->graduationYear->year }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">JSS Class:</span> {{ $member->jss_class->class_name }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">SSS Class:</span> {{ $member->sss_class->class_name }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">House:</span> {{ $member->house->name }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Registration Date:</span>
                                    {{ $member->created_at->toDayDateTimeString() }}
                                </li>
                            </ul>
                        </div>
                        <div class="py-2">
                            <h1 class="text-gray-700 text-lg font-medium mb-1">Professional Info</h1>
                            <ul class="text-sm">
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">University Attended:</span> {{ $member->university }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Field of Study:</span> {{ $member->course_of_study }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Profession:</span> {{ $member->profession }}
                                </li>
                                <li class="hover:bg-gray-200 p-2 rounded">
                                    <span class="font-semibold">Work Address:</span> {{ $member->workplace }}
                                </li>
                                @foreach ($member->categories as $category)
                                    <li class="hover:bg-gray-200 p-2 rounded">
                                        <span class="font-semibold">Profession Category:</span> {{ $category->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:flex-row flex flex-col gap-8 lg:gap-0 items-center justify-center lg:flex">
                <div class="lg:w-1/3 lg:mr-12">
                    <div class="h-full w-full rounded-lg overflow-hidden shadow-lg">
                        <img alt="{{ $member->username }} image" class="w-full h-128 object-cover object-center"
                            src="{{ asset('storage/members_images/' . $member->potrait_image) }}">
                    </div>
                    <figcaption class="text-sm font-bold italic mt-4"></figcaption>
                </div>

                <div class="lg:w-2/3 w-full lg:pl-12 lg:py-3">
                    <div class="bg-white rounded-lg p-6 shadow-lg">
                        <h1 class="text-3xl font-semibold text-gray-900 mb-4">About Me</h1>
                        <p class="text-base text-gray-600">{{ $member->about_you }}</p>
                    </div>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                        <div class="bg-white rounded-lg p-6 shadow-lg">
                            <h1 class="text-xl font-semibold text-gray-900 mb-4">Personal Info</h1>
                            <ul class="text-sm text-gray-600">
                                <li><span class="font-semibold">Full Name:</span>
                                    {{ $member->first_name . ' ' . $member->middle_name . ' ' . $member->last_name }}
                                </li>
                                <li><span class="font-semibold">Email:</span> {{ $member->email }}</li>
                                <li><span class="font-semibold">Phone:</span> {{ $member->phone }}</li>
                                <li><span class="font-semibold">Address:</span> {{ $member->address }}</li>
                                @php
                                    $age = Carbon\Carbon::parse($member->date_of_birth)->diff(Carbon\Carbon::now())->y;
                                @endphp
                                <li><span class="font-semibold">Age:</span> {{ $age }} years</li>
                                <li><span class="font-semibold">City:</span> {{ $member->city->name }}</li>
                                <li><span class="font-semibold">State:</span> {{ $member->state->name }}</li>
                            </ul>
                        </div>

                        <div class="bg-white rounded-lg p-6 shadow-lg">
                            <h1 class="text-xl font-semibold text-gray-900 mb-4">Fegocomosa Info</h1>
                            <ul class="text-sm text-gray-600">
                                <li><span class="font-semibold">Entry Year:</span> {{ $member->entryYear->year }}</li>
                                <li><span class="font-semibold">Graduation Year:</span>
                                    {{ $member->graduationYear->year }}</li>
                                <li><span class="font-semibold">JSS Class:</span> {{ $member->jss_class->class_name }}
                                </li>
                                <li><span class="font-semibold">SSS Class:</span> {{ $member->sss_class->class_name }}
                                </li>
                                <li><span class="font-semibold">House:</span> {{ $member->house->name }}</li>
                                <li><span class="font-semibold">Registration Date:</span>
                                    {{ $member->created_at->toDayDateTimeString() }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white rounded-lg p-6 shadow-lg">
                            <h1 class="text-xl font-semibold text-gray-900 mb-4">Professional Info</h1>
                            <ul class="text-sm text-gray-600">
                                <li><span class="font-semibold">University Attended:</span> {{ $member->university }}
                                </li>
                                <li><span class="font-semibold">Field of Study:</span> {{ $member->course_of_study }}
                                </li>
                                <li><span class="font-semibold">Profession:</span> {{ $member->profession }}</li>
                                <li><span class="font-semibold">Work Address:</span> {{ $member->workplace }}</li>
                                @foreach ($member->categories as $category)
                                    <li><span class="font-semibold">Profession Category:</span> {{ $category->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container pb-24 mx-auto lg:w-8/12 w-full flex flex-wrap ">

            <div class="lg:w-5/12 w-full   rounded-lg p-4 flex flex-col md:ml-auto mt-10 md:mt-0">

            </div>
        </div>

    </section>



</div>
