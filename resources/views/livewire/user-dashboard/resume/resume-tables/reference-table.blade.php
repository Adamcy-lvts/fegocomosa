 <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto ">
     <h1 class="font-semibold text-xl mb-4">Reference Table</h1>
     <div
         class="divide-y divide-gray-300 dark:bg-slate-900 inline-block min-w-full shadow-xl rounded-lg overflow-hidden">
         <table class=" divide-y divide-gray-300  min-w-full leading-normal text-gray-800">
             <thead class="">
                 <tr>

                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         ID
                     </th>
                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         FULL NAME
                     </th>
                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         JOB TITLE
                     </th>
                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         EMAIL
                     </th>
                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         PHONE
                     </th>
                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         WORKING AT
                     </th>

                     <th class="px-5 py-3   text-left text-xs font-semibold  uppercase tracking-wider">
                         ACTION
                     </th>


                 </tr>
             </thead>
             <tbody class="divide-y divide-gray-300">
                 @foreach ($references as $reference)
                     <tr class="divide-y divide-gray-300">

                         <td class="px-3 py-2    text-sm">
                             {{ $reference->id }}
                         </td>
                         <td class="px-3 py-2   text-sm">
                             <p class=" whitespace-no-wrap">{{ $reference->full_name }}</p>
                         </td>
                         <td class="px-3 py-2   text-sm">
                             <p class=" whitespace-no-wrap">{{ $reference->job_title }}</p>
                         </td>
                         <td class="px-3 py-2   text-sm">
                             <p class=" whitespace-no-wrap">{{ $reference->email }}</p>
                         </td>
                         <td class="px-3 py-2   text-sm">
                             <p class=" whitespace-no-wrap">{{ $reference->phone }}</p>
                         </td>
                         <td class="px-3 py-2   text-sm">
                             <p class=" whitespace-no-wrap">{{ $reference->working_at }}</p>
                         </td>

                         <td class="px-3 py-1   text-sm">


                             <div class="flex items-center gap-x-3 justify-end">
                                 <x-button label="Edit" type="button"
                                     wire:click="EditReference({{ $reference->id }})" icon="pencil" class="px-1.5 py-1"
                                     green />

                                 <x-button label="Delete" wire:click="ReferenceDeleteConfirm({{ $reference->id }})"
                                     icon="x" class="px-1.5 py-1" negative />
                             </div>



                         </td>


                     </tr>
                 @endforeach


             </tbody>
         </table>
         <div class="px-5 py-5   flex flex-col xs:flex-row items-center xs:justify-between">
             <span class="text-xs xs:text-sm ">

             </span>
             {{-- <div class="inline-flex mt-2 xs:mt-0">
                        {{ $membershipinfo->links() }}
                    </div> --}}
         </div>
     </div>
 </div>
 {{-- REFERENCE MODAL OPEN TAG --}}
 <x-modal.card title="Reference" blur wire:model="referenceForm">
     <x-errors class="mb-4" />
     <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

         <div class="col-span-1 sm:col-span-2">
             <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                 label="Job Title" placeholder="Job Title" wire:model.defer="fullName" />
         </div>
         <div class="col-span-1 sm:col-span-2">
             <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                 label="Job Title" placeholder="Job Title" wire:model.defer="jobPosition" />
         </div>
         <div class="col-span-1 sm:col-span-2">
             <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                 label="Email" placeholder="Email" wire:model.defer="email" />
         </div>
         <div class="col-span-1 sm:col-span-2">
             <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"s.phone
                 mask="(###)-####-####" label="Phone" placeholder="Phone" wire:model.defer="phone" />
         </div>
         <div class="col-span-1 sm:col-span-2">
             <x-input class="focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                 label="Working At" placeholder="Working At" wire:model.defer="workAt" />
         </div>

     </div>

     <x-slot name="footer">
         <div class="flex justify-between gap-x-4">
             <x-button flat negative label="Delete" wire:click="delete" />

             <div class="flex">
                 <x-button flat label="Cancel" x-on:click="close" />
                 <div class="flex items-center gap-x-3 justify-end">
                     <x-button wire:click="updateReference" label="Update" wire:loading.attr="disabled" primary />
                 </div>
             </div>
         </div>
     </x-slot>
 </x-modal.card>
