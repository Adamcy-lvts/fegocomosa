<div>

    <div class="container mx-auto p-5">
        <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
            @foreach ($users as $member)
                <div class="cards">

                    <div class="cards-image waves-effect waves-block static waves-light">
                        <a href="{{ route('member.profile', $member) }}">
                            <img src="{{ asset('storage/members_images/' . $member->potrait_image) }}" />
                            <div class="absolute top-0 left-0">
                                <span class="bg-black text-xs italic md:p-2 lg:p-2 p-1 text-white bg-opacity-25">
                                    Class Of {{ $member->graduationYear->year }}
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="cards-content">
                        <div class="flex justify-between">
                            <span class="cards-title activator grey-text text-darken-4">
                                {{ $member->first_name . ' ' . $member->last_name }}
                            </span>
                            <span>
                                <x-button 2xs flat green label="{{ $member->profession }}" />
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <x-button id="one" class="button" type="button"
                                    wire:click="ProfileModal({{ $member->id }})" 2xs outline green
                                    label="View Details" />
                            </div>

                            <div>
                                <x-button type="button" href="{{ route('resume', $member->id) }}" 2xs flat
                                    label="View Resume/CV" />
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
    <x-modal max-width="5xl" wire:model.defer="simpleModal">
        <div class="mt-8 grid place-content-end ">
            <x-button red label="Close" x-on:click="close" />
        </div>

        <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

            <!--Main Col-->
            <div id="profile"
                class="w-full lg:w-7/12 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-black opacity-75 mx-6 lg:mx-0">


                <div class="p-4 md:p-12 text-center lg:text-left">
                    <!-- Image for mobile view-->
                    <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                        style="background-image: url('{{ asset('storage/' . $profileImage) }}')"></div>

                    <h1 class="text-2xl text-gray-200 font-bold pt-8 lg:pt-0">{{ $firstName . ' ' . $lastName }}</h1>
                    <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-gray-500 opacity-25"></div>
                    <div class="pt-4 text-gray-100 flex items-center justify-center lg:justify-start">
                        <i class="fa-thin fa-briefcase "></i><span class="text-sm  ml-2">Works At:
                            {{ $workplace }}</span>
                    </div>
                    <div class="pt-2 text-gray-100 flex items-center justify-center lg:justify-start">
                        <i class="fa-thin fa-location-dot "></i><span class="text-sm  ml-2">Address:
                            {{ $address }}</span>
                    </div>
                    <div class="pt-2 text-gray-100 flex items-center justify-center lg:justify-start">
                        <i class="fa-thin fa-envelope "></i><span class="text-sm  ml-2">Email:
                            {{ $email }}</span>
                    </div>
                    <div class="pt-2 text-gray-100 flex items-center justify-center lg:justify-start">
                        <i class="fa-thin fa-phone"></i><span class="text-sm  ml-2">Phone: {{ $phone }}</span>
                    </div>
                    <div class="pt-2 text-gray-100 flex items-center justify-center lg:justify-start">
                        <i class="fa-thin fa-graduation-cap"></i><span class="text-sm  ml-2">Graduation Year:
                            {{ $gradYear }}</span>
                    </div>

                    <div class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-between">

                        <a class="link" target="_blank" href="https://{{ $facebook }}"
                            data-tippy-content="@facebook_handle"><svg
                                class="h-6 fill-current text-gray-600 hover:text-gray-400" role="img"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Facebook</title>
                                <path
                                    d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0" />
                            </svg></a>
                        <a class="link" target="_blank" href="https://{{ $twitter }}"
                            data-tippy-content="@twitter_handle"><svg
                                class="h-6 fill-current text-gray-600 hover:text-green-700" role="img"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Twitter</title>
                                <path
                                    d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z" />
                            </svg></a>

                        <a class="link" target="_blank" href="https://{{ $instagram }}"
                            data-tippy-content="@instagram_handle"><svg
                                class="h-6 fill-current text-gray-600 hover:text-green-700" role="img"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg></a>

                        <a class="link" target="_blank" href="https://{{ $telegram }}"
                            data-tippy-content="@telegram_handle">

                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                class="h-7 fill-current text-gray-600 hover:text-green-700" role="img">
                                <title>Telegram</title>
                                <g id="_x33_35-telegram">
                                    <g>
                                        <g>
                                            <path
                                                d="M484.689,98.231l-69.417,327.37c-5.237,23.105-18.895,28.854-38.304,17.972L271.2,365.631     l-51.034,49.086c-5.646,5.647-10.371,10.372-21.256,10.372l7.598-107.722L402.539,140.23c8.523-7.598-1.848-11.809-13.247-4.21     L146.95,288.614L42.619,255.96c-22.694-7.086-23.104-22.695,4.723-33.579L455.423,65.166     C474.316,58.081,490.85,69.375,484.689,98.231z" />
                                        </g>
                                    </g>
                                </g>
                                <g id="Layer_1" />
                            </svg>
                        </a>
                        <a class="link" target="_blank" href="https://{{ $whatsapp }}"
                            data-tippy-content="@whatsapp_handle"><svg
                                class="h-7 fill-current text-gray-600 hover:text-green-700" role="img"
                                viewBox="0 0 56.693 56.693" xmlns="http://www.w3.org/2000/svg">
                                <title>Whatsapp</title>
                                <path class="st0"
                                    d="m46.38 10.714c-4.6512-4.6565-10.836-7.222-17.427-7.2247-13.578 0-24.63 11.051-24.635 24.633-0.0019 4.342 1.1325 8.58 3.2884 12.316l-3.495 12.766 13.06-3.4257c3.5982 1.9626 7.6495 2.9971 11.773 2.9985h0.01 2e-4c13.577 0 24.629-11.052 24.635-24.635 0.0024-6.5826-2.5577-12.772-7.2088-17.428zm-17.426 37.902h-0.0083c-3.674-0.0014-7.2777-0.9886-10.422-2.8541l-0.7476-0.4437-7.7497 2.0328 2.0686-7.5558-0.4869-0.7748c-2.0496-3.26-3.1321-7.028-3.1305-10.897 0.0044-11.289 9.19-20.474 20.484-20.474 5.469 0.0017 10.61 2.1344 14.476 6.0047 3.8658 3.8703 5.9936 9.0148 5.9914 14.486-0.0046 11.29-9.1899 20.476-20.476 20.476z" />
                                <path class="st0"
                                    d="m40.185 33.281c-0.6155-0.3081-3.6419-1.797-4.2061-2.0026-0.5642-0.2054-0.9746-0.3081-1.3849 0.3081-0.4103 0.6161-1.59 2.0027-1.9491 2.4136-0.359 0.4106-0.7182 0.4623-1.3336 0.1539-0.6155-0.3081-2.5989-0.958-4.95-3.0551-1.83-1.6323-3.0653-3.6479-3.4245-4.2643-0.359-0.6161-0.0382-0.9492 0.27-1.2562 0.2769-0.2759 0.6156-0.7189 0.9234-1.0784 0.3077-0.3593 0.4103-0.6163 0.6155-1.0268 0.2052-0.4109 0.1027-0.7704-0.0513-1.0784-0.1539-0.3081-1.3849-3.3379-1.8978-4.5706-0.4998-1.2001-1.0072-1.0375-1.3851-1.0566-0.3585-0.0179-0.7694-0.0216-1.1797-0.0216s-1.0773 0.1541-1.6414 0.7702c-0.5642 0.6163-2.1545 2.1056-2.1545 5.1351 0 3.0299 2.2057 5.9569 2.5135 6.3676 0.3077 0.411 4.3405 6.6282 10.515 9.2945 1.4686 0.6343 2.6152 1.013 3.5091 1.2966 1.4746 0.4686 2.8165 0.4024 3.8771 0.2439 1.1827-0.1767 3.6419-1.489 4.1548-2.9267 0.513-1.438 0.513-2.6706 0.359-2.9272-0.1538-0.2567-0.5642-0.4108-1.1797-0.719z" />
                            </svg></a>
                        <a class="link" target="_blank" href="https://{{ $linkedin }}"
                            data-tippy-content="@linkedin_handle">
                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                                class="h-6 fill-current text-gray-600 hover:text-green-700" role="img"
                                xmlns:serif="http://www.serif.com/">
                                <title>LinkedIn</title>
                                <path
                                    d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-288.985,423.278l0,-225.717l-75.04,0l0,225.717l75.04,0Zm270.539,0l0,-129.439c0,-69.333 -37.018,-101.586 -86.381,-101.586c-39.804,0 -57.634,21.891 -67.617,37.266l0,-31.958l-75.021,0c0.995,21.181 0,225.717 0,225.717l75.02,0l0,-126.056c0,-6.748 0.486,-13.492 2.474,-18.315c5.414,-13.475 17.767,-27.434 38.494,-27.434c27.135,0 38.007,20.707 38.007,51.037l0,120.768l75.024,0Zm-307.552,-334.556c-25.674,0 -42.448,16.879 -42.448,39.002c0,21.658 16.264,39.002 41.455,39.002l0.484,0c26.165,0 42.452,-17.344 42.452,-39.002c-0.485,-22.092 -16.241,-38.954 -41.943,-39.002Z" />
                            </svg>
                        </a>

                        <a class="link" href="https://{{ $website }}"
                            data-tippy-content="@website_handle"><svg
                                class="h-7 fill-current text-gray-600 hover:text-green-700" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 760 760">
                                <path d="M760 380a380 380 0 1 1-760 0 380 380 0 1 1 760 0z" />
                                <title>Website</title>
                                <path
                                    d="M10 380c0 69 19 133 52 188l5-90c-42-59-52-84-53-154-3 18-4 37-4 56zm87-238 50-17c33-43 99-94 166-94-26 8-101 44-107 67 28-18 51-21 79-21l61-34-20-29C234 27 154 74 97 142zm49 239c0 22 22 68 48 68h64l8 13c20 0 20 14 20 32 0 24 30 28 30 66 0 10-12 14-12 30 0 14 37 86 60 86 40 0 84-36 84-52 0-38 34-28 34-54 0-118 48-62 66-164l-41 16c-44-37-70-91-70-111 13 0 53 60 67 96 34-14 69-39 78-75l-18-8-6-12-14 18c-5 0-28-17-35-41 32 21 47 21 103 21 26 0 41 75 66 88 0-41 3-74 18-107 14 0 37 23 53 68-9-164-125-300-280-338l23 19h-25c0 53-16 35-52 75 0-10 0-14 8-19-15-9-29-12-39-12-15 0-56 26-68 52l21-2 8 18c18-11 12-47 39-47 0 8-11 11-11 25l25-1c-23 26-35 32-66 32l-5-16c-9 23-36 35-58 37 0 12-1 19-8 30l-26-5-17 38 33 7c15-24 33-37 58-42l32 35c0 4-6 7-20 7l12 8 18-22c-16-9-22-19-22-31 38 11 29 50 46 53 0-45 31-4 31-58 22 0 60 13 60 29-57 0-73 2-73 20 0 9 49-5 49 42-40 0-58 0-80-12l-7 20c-24-7-49-20-49-48l-58 9-16-10c-40 50-86 44-86 129zm106-217 15-3 7-14c-14 0-21 9-22 17zm9 11 32-5-5-39c-19 10 3 25-27 44zm2-72c13 0 24-2 24-11l-19-4zm218 98c27 0 46 33 46 47l-24-2c0-16-9-33-22-45zm10 431c24 0 48-37 48-77l-38 32z"
                                    fill="#fff" />
                            </svg></a>
                    </div>

                </div>

            </div>

            <!--Img Col-->
            <div class="w-full lg:w-5/12">
                <!-- Big profile image for side bar (desktop) -->
                <img src="{{ asset('storage/members_images/' . $potraitImage) }}"
                    class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">


            </div>

        </div>

    </x-modal>
</div>
