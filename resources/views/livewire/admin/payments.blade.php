<div>
    @if (auth()->user()->hasRole(['Super-Admin', 'admin', 'accountant']))
        <x-slot name="header">
            <h2 class=" text-white font-sans text-3xl leading-tight">
                {{ __('Payments') }}
            </h2>
        </x-slot>

        <div>
            @if (session()->has('flash.banner'))
                <x-jet-banner />
            @endif
        </div>
        @can('make payment')
            <x-button label="Make Payment" wire:click="paymentModal" icon="user-add" />
        @endcan
        <div class="my-2 flex sm:flex-row flex-col">


            @if ($checkedPayments)
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class=" ml-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ count($checkedPayments) }} Selected Record(s)

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

                        <x-jet-dropdown-link wire:click="DeleteConfirmation">
                            {{ __('Delete') }}
                        </x-jet-dropdown-link>

                    </x-slot>
                </x-jet-dropdown>
            @endif
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 ">

            <div class="col-span-1 sm:col-span-2 sm:grid sm:grid-cols-4 sm:gap-6 ">
                <x-native-select class="dark:bg-secondary-900ph" label="Record Per Page" wire:model="pagination">
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                </x-native-select>

            </div>


            <div class="col-span-1 sm:col-span-2">
                <x-input icon="search" wire:model.debounce.500ms="search"
                    placeholder="Search by First Name, Last Name, State" />
            </div>
        </div>


        <div class="dark:text-gray-400">

            @if ($checkPageItems)
                <div>
                    @if ($checkAllItems)
                        <div> You have selected all <strong>{{ $payments->total() }}</strong> records</div>
                    @else
                        You have selected <strong>{{ count($checkedPayments) }}</strong> records, do you want to select
                        All
                        records?
                        <a href="#" wire:click="checkAllItems">Select All Records</a>
                    @endif
                </div>
            @endif


        </div>

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto ">
            <div
                class="divide-y divide-slate-700 dark:bg-slate-900 inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class=" divide-y divide-slate-700  min-w-full leading-normal">
                    <thead class="">
                        <tr>
                            <th
                                class="px-3 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">

                                <x-jet-checkbox wire:model="checkPageItems"></x-jet-checkbox>
                            </th>
                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                ID
                            </th>
                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Name
                            </th>

                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Avatar
                            </th>

                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Amount
                            </th>

                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Payment Year
                            </th>

                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Paid On
                            </th>

                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Phone
                            </th>
                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Graduation Year
                            </th>

                            <th
                                class="px-5 py-3   text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">
                                Action
                            </th>


                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700">
                        @forelse ($payments as $payment)
                            <tr class="divide-y divide-slate-700">
                                <td class="px-3 py-2  ">
                                    <x-jet-checkbox value="{{ $payment->id }}" wire:model="checkedPayments">
                                    </x-jet-checkbox>
                                </td>
                                <td class="px-3 py-2  text-gray-300  text-sm">
                                    {{ $payment->id }}
                                </td>
                                <td class="px-3 py-2   text-sm">
                                    <a href="{{ route('member.profile', $payment->id) }}">
                                        <p class="text-gray-300 whitespace-no-wrap">
                                            {{-- {{ dd($payment->member()) }} --}}
                                            {{ $payment->user->first_name . ' ' . $payment->user->last_name }}</p>
                                    </a>
                                </td>

                                <td class="px-3 py-2   text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="h-10 w-10 rounded-full object-cover"
                                                src="{{ $payment->user->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-300 whitespace-no-wrap">

                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-3 py-2   text-sm">
                                    <p class="text-gray-300 whitespace-no-wrap">
                                        {{ $payment->amount }}
                                    </p>
                                </td>

                                <td class="px-3 py-2   text-sm">
                                    <p class="text-gray-300 whitespace-no-wrap">{{ $payment->year }}</p>
                                </td>

                                <td class="px-3 py-2   text-sm">
                                    @php
                                        $date = Carbon\Carbon::create($payment->datetime);
                                    @endphp
                                    <p class="text-gray-300 whitespace-no-wrap">
                                        {{ $date->toDayDateTimeString() }}</p>
                                </td>

                                <td class="px-3 py-2   text-sm">
                                    <p class="text-gray-300 whitespace-no-wrap">{{ $payment->user->phone }}</p>
                                </td>

                                <td class="px-3 py-2   text-sm">
                                    <p class="text-gray-300 whitespace-no-wrap">
                                        {{ $payment->user->graduationYear->year }}</p>
                                </td>

                                <td class="px-3 py-1   text-sm">

                                    <div class="flex items-center gap-x-3 justify-end">
                                        @can('edit payment')
                                            <x-button wire:click="EditPayment({{ $payment->id }})" icon="pencil"
                                                class="px-1.5 py-1" primary />
                                        @endcan
                                        @can('delete payment')
                                            <x-button wire:click="SingleDeleteConfirmation({{ $payment->id }})"
                                                icon="x" class="px-1.5 py-1" negative />
                                        @endcan
                                    </div>



                                </td>


                            </tr>

                        @empty

                            <tr class="divide-y divide-slate-700">

                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm">No Match Found</th>
                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm"></th>
                                <th class="px-3 py-2   text-sm"></th>
                            </tr>
                        @endforelse


                    </tbody>
                </table>

                <div class="px-5 py-5">
                    <span class="text-xs xs:text-sm text-gray-300">
                        {{ $payments->links() }}
                    </span>
                </div>
            </div>
        </div>


        <x-modal.card title="Payment" blur wire:model="showModalForm">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">

                <div class="col-span-1 sm:col-span-2">
                    <x-inputs.currency label="Amount" placeholder="Amount" wire:model.defer="amount" />
                </div>

            </div>
            <x-native-select label="Members" placeholder="Members" wire:model.defer="member">
                <option>
                    <--Select a Member-->
                </option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">
                        {{ $member->first_name . ' ' . $member->last_name }}</option>
                @endforeach
            </x-native-select>
            <x-datetime-picker label="Payment Year" placeholder="Payment Year" wire:model.defer="paymentYear" />
            <x-datetime-picker label="Payment Date" placeholder="Payment Date" wire:model.defer="paymentDate" />

            <x-slot name="footer">
                <div class="flex justify-between gap-x-4">
                    <x-button flat negative label="Delete" wire:click="delete" />

                    <div class="flex">
                        <x-button flat label="Cancel" x-on:click="close" />
                        @if ($paymentId)
                            <div class="flex items-center gap-x-3 justify-end">
                                <x-button wire:click="updatePayment" label="Update" wire:loading.attr="disabled" />
                            </div>
                        @else
                            <div class="flex items-center gap-x-3 justify-end">
                                <x-button wire:click="payment" label="Pay" wire:loading.attr="disabled" />
                            </div>
                        @endif

                    </div>
                </div>
            </x-slot>
        </x-modal.card>

        <x-jet-confirmation-modal wire:model="showModalAlert">

            <x-slot name="title">Delete Selected Record</x-slot>

            <x-slot name="content">
                <p class="text-gray-900">Are you sure want to delete the selected records?</p>
            </x-slot>

            <x-slot name="footer">
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />

                    <x-button wire:loading.attr="disabled" wire:click="deleteRecords" label="Delete Records"
                        negative />

                </div>
            </x-slot>

        </x-jet-confirmation-modal>

        <x-jet-confirmation-modal wire:model="showAlert">

            <x-slot name="title">Delete Selected Record</x-slot>

            <x-slot name="content">
                <p class="text-gray-900">Are you sure want to delete the selected records?</p>
            </x-slot>

            <x-slot name="footer">
                <div class="flex items-center gap-x-3 justify-end">
                    <x-button wire:click="CancelConfirmation" label="Cancel" flat />

                    <x-button wire:loading.attr="disabled" wire:click="deleteRecord" label="Delete" negative />
                </div>
            </x-slot>

        </x-jet-confirmation-modal>
    @else
        <div class="mx-auto  py-24 w-8/12">
            <div class="flex py-48 flex-col items-center justify-center">
                <div class="uppercase  px-24 text-gray-600 text-5xl">Unauthorised Access</div>
                <div class="mt-2"><i class="fa-duotone fa-lock-keyhole fa-8x opacity-50"></i></div>
            </div>

        </div>

    @endif
</div>
