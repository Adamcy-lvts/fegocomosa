 <div>

     <x-slot name="header">
         <h2 class=" text-white font-sans text-3xl leading-tight">
             {{ __('Campaigns') }}
         </h2>
     </x-slot>

     <x-button label="Create Campaign" href="{{ route('campaign.create') }}" />

     <div class="my-2 flex sm:flex-row flex-col">


         @if ($checkedCampaigns)
             <x-jet-dropdown align="right" width="48">
                 <x-slot name="trigger">

                     <span class="inline-flex rounded-md">
                         <button type="button"
                             class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                             {{ count($checkedCampaigns) }} Selected Record(s)

                             <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </button>
                     </span>

                 </x-slot>

                 <x-slot name="content">
                     <!-- Account Management -->
                     <div class="block px-4 py-2 text-xs text-gray-400">
                         {{ __('Deleted Selected Records') }}
                     </div>

                     <x-jet-dropdown-link wire:click="BulkDeleteConfirmation">
                         {{ __('Delete') }}
                     </x-jet-dropdown-link>

                 </x-slot>
             </x-jet-dropdown>
         @endif
     </div>

     <div class="col-span-1 md:col-span-2 md:grid md:grid-cols-3 md:gap-5">
         <div class="col-span-1 md:col-span-auto">
             <x-native-select class="dark:bg-secondary-900ph" label="Record Per Page" wire:model="pagination">
                 <option>5</option>
                 <option>10</option>
                 <option>15</option>
             </x-native-select>
         </div>

         <div class="col-span-1 md:col-span-2">
             <x-input icon="search" label="Name" wire:model.debounce.500ms="search"
                 placeholder="Search by Article by Title or published date" />
         </div>
     </div>

     <div class="dark:text-gray-400">

         @if ($checkPageItems)
             <div>
                 @if ($checkAllItems)
                     <div> You have selected all <strong>{{ $campaigns->total() }}</strong> records</div>
                 @else
                     You have selected <strong>{{ count($checkedCampaigns) }}</strong> records, do you wan to select
                     All <strong>{{ $campaigns->total() }}</strong> records?
                     <a href="#" wire:click="checkAllItems">Select All Records</a>
             </div>
         @endif
         @endif

     </div>


     <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
         <div
             class="divide-y divide-slate-700 dark:bg-slate-900 inline-block min-w-full shadow rounded-lg overflow-hidden">
             <table class=" divide-y divide-slate-700  min-w-full leading-normal">
                 <thead class="bg-gray-900">
                     <tr>
                         <th class="px-3 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">

                             <x-jet-checkbox wire:model="checkPageItems"></x-jet-checkbox>
                         </th>
                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             ID
                         </th>
                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             CAMPAIGN TITLE
                         </th>

                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             COVER IMAGE
                         </th>

                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             STARTING DATE
                         </th>

                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             ORGANIZER
                         </th>

                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             DONATION COUNT
                         </th>

                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             TOTAL DONATION
                         </th>

                         <th class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                             ACTION
                         </th>


                     </tr>
                 </thead>
                 <tbody class="divide-y divide-slate-700">
                     @forelse ($campaigns as $campaign)
                         <tr class="divide-y divide-slate-700">
                             <td class="px-3 py-2  ">
                                 <x-jet-checkbox value=" {{ $campaign->id }}" wire:model="checkedCampaigns">
                                 </x-jet-checkbox>
                             </td>
                             <td class="px-5 py-5 border-b border-gray-200 text-gray-300 bg-gray-900 text-sm">
                                 {{ $campaign->id }}
                             </td>

                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">
                                 <p class="text-gray-300 whitespace-no-wrap">
                                     {{ $campaign->campaign_title }}
                                 </p>
                             </td>


                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">
                                 <div class="flex-shrink-0 w-10 h-10">
                                     <img class="h-10 w-10 rounded-full object-cover"
                                         src="{{ asset('storage/campaigns_images/' . $campaign->cover_image) }}"
                                         alt="{{ $campaign->title }}" />
                                 </div>
                             </td>

                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">
                                 <p class="text-gray-300 whitespace-no-wrap">
                                     {{ $campaign->starting_date }}
                                 </p>
                             </td>

                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">
                                 <p class="text-gray-300 whitespace-no-wrap">
                                     {{ $campaign->organizer->organizer_name }}
                                 </p>
                             </td>

                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">
                                 <p class="text-gray-300 whitespace-no-wrap">
                                     {{ count($campaign->donations) }}
                                 </p>
                             </td>

                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">
                                 @php
                                     $sumTotal = App\Models\Donation::where('campaign_id', $campaign->id)->sum('amount');
                                 @endphp
                                 <p class="text-gray-300 whitespace-no-wrap">
                                     <span>&#x20A6;</span>{{ number_format($sumTotal) }}
                                 </p>
                             </td>


                             <td class="px-5 py-5 border-b border-gray-200 bg-gray-900 text-sm">

                                 <div class="flex items-center gap-x-3 justify-end">
                                     <x-button type="button" href="{{ route('campaign.edit', $campaign->slug) }}"
                                         icon="pencil" class="px-1.5 py-1" primary />

                                     <x-button wire:click="DeleteConfirmaton({{ $campaign->id }})" icon="x"
                                         class="px-1.5 py-1" negative />
                                 </div>
                             </td>




                         </tr>
                     @empty

                         <tr class="divide-y divide-slate-700">



                             <th class="px-3 py-2 ">
                                 <div class="text-sm text-white">No Match Found</div>
                             </th>


                         </tr>
                     @endforelse


                 </tbody>
             </table>
             <div
                 class="px-5 py-5 bg-gray-900 border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                 <div class="inline-flex mt-2 xs:mt-0">
                     {{ $campaigns->links() }}
                 </div>
             </div>
         </div>
     </div>

 </div>
