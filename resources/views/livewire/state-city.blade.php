<div>
     <div class="flex flex-wrap">

                    <div class="w-full lg:w-6/12 px-2">
                      <div class="relative w-full mb-3">
                             <div class="mt-4">
                                 <x-jet-label for="state" value="{{ __('State') }}" />
                                 <select id="state-id"  wire:model="selectedState" name="state_id" class="border-0 px-3 py-3  rounded text-sm shadow focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100  w-full " >
                                       <option value="" disabled selected>--Select State--</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>   
                                       @endforeach
                                 </select>
                             </div>
                       </div>
                      </div>

                      <div class="w-full lg:w-6/12 px-2">
                        <div class="relative w-full mb-3">
                             <div class="mt-4">
                                 <x-jet-label for="city_id" value="{{ __('City') }}" />
                                 <select id="lga" wire:model="selectedCity" name="city_id" class="border-0 px-3 py-3  rounded text-sm shadow focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-100  w-full "  >
                                       <option value="" disabled selected>--Select L.G.A--</option>
                                        @if (!is_null($cities))
                                             
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" >{{ $city->name }}</option>
                                            @endforeach
                                        @endif
                                 </select>
                             </div>
                       </div>
                      </div>

                    


             </div>
</div>
