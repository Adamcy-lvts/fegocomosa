<div>
    <x-card title="Campaign">
        <x-errors class="mb-4" />
        <form wire:submit.prevent="Update" action="">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input label="Campaign Title" placeholder="Campaign Title" wire:model.defer="campaignTitle" />

                <x-datetime-picker without-time label="Starting Date" placeholder="Starting Date"
                    wire:model.defer="startingDate" />
                <div class="col-span-1 sm:col-span-2">
                    <x-inputs.currency label="Campaign Goal" placeholder="Campaign Goal" wire:model.lazy="goal" />
                </div>

                <div class="col-span-1 sm:col-span-2">
                    <x-native-select label="Organizer" placeholder="Organizer" wire:model.defer="organizerId">
                        @foreach ($organisations as $org)
                            <option value="{{ $org->id }}">{{ $org->org_name }}</option>
                        @endforeach

                    </x-native-select>
                </div>

                <div class="col-span-1 sm:col-span-2">
                    <x-textarea label="Description" placeholder="Description" wire:model.defer="description" />
                </div>

                <div wire:ignore class="col-span-1 mb-4 sm:col-span-2">
                    <textarea placeholder="write your article" id="body" data-text=@this wire:model.lazy="body">{{ $body }}</textarea>
                </div>


            </div>

            <div class="col-span-1 sm:col-span-2">
                @if ($coverImage)
                    <img src="{{ $coverImage->temporaryUrl() }}">
                @endif
                <x-input wire:model="coverImage" type="file" class="opacity-2" />
            </div>
</div>


<x-slot name="footer">
    <div class="flex items-center gap-x-3 justify-end">
        <x-button wire:click="cancel" label="Cancel" flat />
        <x-button type="submit" id="submit" label="Update" spinner="save" />
    </div>
</x-slot>
</x-card>


</form>
</div>
@section('script')
    <script>
        //Define an adapter to upload the files
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;

                // URL where to send files.
                this.url = '{{ route('image.upload') }}';

                //
            }
            // Starts the upload process.
            upload() {
                return this.loader.file.then(
                    (file) =>
                    new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    })
                );
            }
            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }
            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = (this.xhr = new XMLHttpRequest());
                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                // xhr.open('POST', this.url, true);
                xhr.open("POST", this.url, true);
                xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
                xhr.responseType = "json";
            }
            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${file.name}.`;
                xhr.addEventListener("error", () => reject(genericErrorText));
                xhr.addEventListener("abort", () => reject());
                xhr.addEventListener("load", () => {
                    const response = xhr.response;
                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }
                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url,
                    });
                });
                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener("progress", (evt) => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }
            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();
                data.append("image", file);
                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.
                // Send the request.
                this.xhr.send(data);
            }
            // ...
        }

        function SimpleUploadAdapterPlugin(editor) {
            editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }




        //Initialize the ckeditor
        ClassicEditor.create(document.querySelector("#body"), {
                extraPlugins: [SimpleUploadAdapterPlugin],

            })
            .then(editor => {
                document.querySelector('#submit').addEventListener('click', () => {
                    let text = $('#body').data('text');
                    eval(text).set('body', editor.getData());
                });
            })
            .catch((error) => {
                console.error(error);
            });
    </script>
@endsection
