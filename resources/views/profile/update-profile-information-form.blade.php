  <x-jet-form-section submit="updateProfileInformation">
      <x-slot name="form">
          <div class="grid grid-cols-3 gap-4">
              <div class="col-span-3">

                  <div class="flex flex-row flex-wrap gap-4">
                      <div class="basis-1/3 flex-auto ">
                          <x-card class="bg-darkblue">
                              <div class="text-center">
                                  <!-- Profile Photo -->
                                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                      <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                                          <!-- Profile Photo File Input -->
                                          <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                                              x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                        " />

                                          <div class="mx-auto w-32 h-32 mb-5 border rounded-full relative bg-gray-100 mb-4 shadow-inset"
                                              x-show="! photoPreview">
                                              <img src="{{ $this->user->profile_photo_url }}"
                                                  alt="{{ $this->user->name }}"
                                                  class="object-cover w-full h-32 rounded-full">
                                          </div>

                                          <!-- New Profile Photo Preview -->
                                          <div class="mt-2 mx-auto w-32 h-32 mb-5 border rounded-full relative bg-gray-100 mb-4 shadow-inset"
                                              x-show="photoPreview">
                                              <span
                                                  class="block object-cover w-full h-32 rounded-full bg-cover bg-no-repeat bg-center"
                                                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                              </span>
                                          </div>

                                          <x-jet-secondary-button class="mt-2 mr-2" type="button"
                                              x-on:click.prevent="$refs.photo.click()">
                                              {{ __('New Profile') }}
                                          </x-jet-secondary-button>

                                          @if ($this->user->profile_photo_path)
                                              <x-jet-secondary-button type="button" class="mt-2"
                                                  wire:click="deleteProfilePhoto">
                                                  {{ __('Remove Photo') }}
                                              </x-jet-secondary-button>
                                          @endif

                                          <x-jet-input-error for="photo" class="mt-2" />
                                      </div>
                                  @endif
                              </div>
                          </x-card>
                      </div>
                      {{-- FEGOCOMOSA INFORMATON FORM --}}
                      <div class="flex-grow">
                          <x-card class="uppercase" title="Fegocomosa Information">
                              <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                                  <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">

                                      <x-native-select label="Year of Entry" placeholder="Year of Entry"
                                          wire:model.defer="state.entry_year_id">
                                          @foreach ($entryYears as $entryYear)
                                              <option value="{{ $entryYear->id }}">{{ $entryYear->year }}</option>
                                          @endforeach
                                      </x-native-select>

                                      <x-native-select label="Year of Gradution" placeholder="Year of Gradution"
                                          wire:model.defer="state.graduation_year_id">
                                          @foreach ($gradYears as $gradYear)
                                              <option value="{{ $gradYear->id }}">{{ $gradYear->year }}</option>
                                          @endforeach
                                      </x-native-select>

                                      <x-input label="Admission Number" placeholder="Admission Number"
                                          wire:model.defer="state.addmission_number" />
                                  </div>

                                  <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
                                      <x-input label="Jss Class" placeholder="For example Jss 1Q - 3Q"
                                          wire:model.defer="state.jss_class" />
                                      <x-input label="Sss Class" placeholder="For example Sss 1Q - 3Q"
                                          wire:model.defer="state.sss_class" />
                                      <x-native-select label="House" placeholder="House"
                                          wire:model.defer="state.house_id">
                                          @foreach ($houses as $house)
                                              <option value="{{ $house->id }}" }>{{ $house->name }}</option>
                                          @endforeach
                                      </x-native-select>
                                  </div>
                              </div>
                          </x-card>
                      </div>
                  </div>
              </div>

              {{-- PERSONAL INFORMATON FORM --}}
              <div class="col-span-3">
                  <div class="flex flex-wrap flex-row   gap-4">
                      <div class="flex-grow">
                          <x-card class="uppercase" title="Personal Information">
                              <x-errors class="mb-4" />

                              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                  <x-input label="First Name" placeholder="First Name"
                                      wire:model.defer="state.first_name" />
                                  <x-input label="Last Name" placeholder="Last Name"
                                      wire:model.defer="state.last_name" />

                                  <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-7 md:gap-5">
                                      <div class="col-span-1 md:col-span-4">
                                          <x-input label="Middle Name" placeholder="Middle Name"
                                              wire:model.defer="state.middle_name" />
                                      </div>

                                      <div class="col-span-1 md:col-span-3">
                                          <x-datetime-picker without-time label="Birthdate" placeholder="Birthdate"
                                              wire:model.defer="state.date_of_birth" />
                                      </div>
                                  </div>

                                  <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-3 md:gap-6">
                                      <x-native-select label="Gender" placeholder="Gender"
                                          wire:model.defer="state.gender_id">
                                          @foreach ($genders as $gender)
                                              <option value="{{ $gender->id }}"
                                                  {{ $gender->id == auth()->user()->gender_id ? 'selected' : '' }}>
                                                  {{ $gender->gender }}</option>
                                          @endforeach
                                      </x-native-select>
                                      <x-inputs.phone label="Phone" mask="(###)-####-####" placeholder="Phone"
                                          wire:model.defer="state.phone" />
                                      <x-native-select label="Marital Status" placeholder="Marital Status"
                                          wire:model.defer="state.marital_status_id">
                                          @foreach ($maritalStatuses as $maritalStatus)
                                              <option value="{{ $maritalStatus->id }}"
                                                  {{ $maritalStatus->id == auth()->user()->marital_status ? 'selected' : '' }}>
                                                  {{ $maritalStatus->marital_status }}</option>
                                          @endforeach
                                      </x-native-select>
                                  </div>

                                  <div class="col-span-1 md:col-span-2">
                                      <x-input label="Street Address" placeholder="Street Address"
                                          wire:model.defer="state.address" />
                                  </div>

                                  <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-2 md:gap-6">
                                      <x-native-select label="State" placeholder="State"
                                          wire:model="state.selectedState">

                                          @foreach ($states as $statec)
                                              <option value="{{ $statec->id }}">{{ $statec->name }}</option>
                                          @endforeach

                                      </x-native-select>
                                      <x-native-select label="City" placeholder="City"
                                          wire:model="state.selectedCity">
                                          @if (!is_null($cities))
                                              @foreach ($cities as $city)
                                                  <option value="{{ $city->id }}">{{ $city->name }}</option>
                                              @endforeach
                                          @endif
                                      </x-native-select>
                                  </div>

                                  <div class="col-span-1 md:col-span-2">
                                      <x-input label="Email" placeholder="Email" wire:model.defer="state.email" />
                                  </div>

                              </div>
                          </x-card>
                      </div>
                      {{-- POTRAIT PROFILE IMAGE --}}
                      <div class=" flex-auto basis-1/3">
                          <x-card>

                              <input class="hidden" id="fileInput" accept="image/*" type="file"
                                  wire:model="potraitImage"
                                  @change="let file = document.getElementById('fileInput').files[0];
                                var reader = new FileReader();
                                reader.onload = (e) => image = e.target.result;
                                reader.readAsDataURL(file);">
                              <!-- New Potrait Image Preview -->
                              @if ($potraitImage)
                                  Potrait Image Preview:
                                  <img src="{{ $potraitImage->temporaryUrl() }}">
                              @else
                                  <!-- Current Potrait Image -->
                                  <img id="image" class="w-full"
                                      src="{{ asset('storage/photos/' . auth()->user()->potrait_image) }}" />
                              @endif

                              <span class="block  w-full bg-cover bg-no-repeat bg-center"
                                  x-bind:style="'background-image: url(\'' + image + '\');'">
                              </span>

                              <x-jet-secondary-button class="mt-2 mr-2" type="button">

                                  <label for="fileInput">{{ __('Change Photo') }}</label>

                              </x-jet-secondary-button>

                              @if ($this->user->potrait_image)
                                  <x-jet-secondary-button type="button" class="mt-2"
                                      wire:click="deletePotraitImage({{ auth()->user()->id }})">
                                      {{ __('Remove Photo') }}
                                  </x-jet-secondary-button>
                              @endif
                          </x-card>

                      </div>

                  </div>
              </div>

              {{-- PROFESSIONAL INFORMATON FORM --}}
              <div class=" col-span-3 ">
                  <x-card class="uppercase" title="Professional Information">
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                          <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-3 md:gap-6">
                              <x-input label="Profession" placeholder="Profession"
                                  wire:model.defer="state.profession" />
                              <x-native-select label="Professional Category" placeholder="Professional Category"
                                  wire:model="selectedCategory">
                                  @foreach ($professionCategories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                              </x-native-select>
                              <x-input label="Workplace" placeholder="Workplace"
                                  wire:model.defer="state.workplace" />
                          </div>

                          <div class="col-span-1  md:col-span-3 md:grid md:grid-cols-2 md:gap-6">
                              <x-input label="University Attended" placeholder="example Univeristy of Maiduguri"
                                  wire:model.defer="state.university" />
                              <x-input label="Field of Study"
                                  placeholder="example Electrical and Electronics Engineering"
                                  wire:model.defer="state.course_of_study" />

                          </div>


                      </div>

                      <x-slot name="footer">

                          <div class="flex items-center gap-x-3 justify-end">
                              <x-jet-action-message class="mr-3" on="saved">
                                  {{ __('Saved.') }}
                              </x-jet-action-message>
                              <x-button label="Cancel" flat />
                              <x-button type="submit" wire:loading.attr="disabled" wire:target="photo"
                                  label="Save" green>save</x-button>
                          </div>
                      </x-slot>
                  </x-card>

              </div>




          </div>
          </div>
      </x-slot>
      {{-- </div>


        </div> --}}
  </x-jet-form-section>
