{{-- @if ($showContactForm) --}}
<section class=" text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div id="header" class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">You can send us a message if you have any
                question
                or
                suggesion</p>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            {{-- <div id="messageform" class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" wire:model.defer="name"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" wire:model.defer="email"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                        <textarea id="message" name="message" wire:model.defer="message"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button wire:click="contact"
                        class="flex mx-auto text-white bg-green-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-700 rounded text-lg">Button</button>
                </div>

            </div> --}}
            <div id="messageform" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <x-input label="Name" placeholder="Name" wire:model.defer="name" />
                <x-input label="Email" placeholder="Email" wire:model.defer="email" />
                <div class="col-span-1 sm:col-span-2">
                    <x-textarea label="Message" placeholder="Message" wire:model.defer="message" />
                </div>
                <div class="mx-auto col-span-1 sm:col-span-2">
                    <x-button wire:click="contact" green label="Submit" />
                </div>
            </div>

            <div>

                <div id="showRespond"
                    class="hidden bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">Message Sent!</p>
                            <p class="text-sm">Thank you for contacting us, we will get back to you as
                                soon
                                as
                                possible</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</section>


@section('contactScript')
    <script>
        Livewire.on('messageSubmitted', () => {

            var element = document.getElementById("messageform");
            element.classList.add("animate__animated", "animate__zoomOut");

            var head = document.getElementById("header");
            head.classList.add("animate__animated", "animate__zoomOut");


            setTimeout(function() {
                element.classList.add("hidden", "animate__animated", "animate__zoomOut",
                    "animate__delay-4s");
            }, 1000); //wait 1 seconds


            var thanksMessage = document.getElementById("showRespond");

            thanksMessage.classList.remove("hidden");

            thanksMessage.classList.add("animate__animated", "animate__backInUp", "animate__zoomIn",
                "animate__delay-1s");



        })
    </script>
@endsection
