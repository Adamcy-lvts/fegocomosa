@props(['members'])

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">Fegocomosa Executives
            </h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Meet the passionate and dedicated Fegocomosa executives who lead our organization with vision and innovation. They are committed to empowering our community and fostering growth.</p>
        </div>

        <div class="flex flex-wrap -m-4">
            @foreach ($members as $member)
                <div class="p-4 lg:w-1/2">
                    <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <a href="{{ route('member.profile', $member->user->username) }}">
                            <img alt="team" class="flex-shrink-0 rounded-lg object-cover object-center sm:mb-0 mb-4" src="{{ asset($member->user->profile_photo_url ?? '') }}">
                        </a>
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">
                                <a href="{{ route('member.profile', $member->user->username) }}">{{ ($member->user->first_name ?? '') . ' ' . ($member->user->last_name ?? '') }}</a>
                            </h2>
                            <x-position-badge :position="$member->position" />
                            <p class="mb-4">Passionate about making a difference and driving positive change. Reach out to them for any inquiries or collaborations.</p>
                            <span class="inline-flex">
                                <a href="https://{{ $member->user->socialMedia->facebook ?? '#' }}" class="text-gray-500">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://{{ $member->user->socialMedia->twitter ?? '#' }}" class="ml-2 text-gray-500">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://{{ $member->user->socialMedia->whatsapp ?? '#' }}" class="ml-2 text-gray-500">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
