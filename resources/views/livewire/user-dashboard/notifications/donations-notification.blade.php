<div>
    <div class=" flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
        <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
                <h3 class="text-blue-600 py-4 font-normal text-sm">
                    Donations </h3>
                <x-button flat label="Mark All As Read" wire:click="markAllAsRead" xs />
            </div>
        </div>
        @php
            $donationNotifications = auth()
                ->user()
                ->unreadNotifications->where('type', 'App\Notifications\DonationNotification');
            
        @endphp
        @foreach ($donationNotifications->take(5) as $donationNotification)
            @php
                $donation = App\Models\Donation::find($donationNotification->data['donation_id']);
                
                $memberDonor = App\Models\User::find($donationNotification->data['user_id']);
                $donor = App\Models\Donor::find($donationNotification->data['donor_id']);
                if ($memberDonor) {
                    $donorFullName = $memberDonor->first_name . ' ' . $memberDonor->last_name;
                }
                
            @endphp
            <div class=" px-6 py-6 text-gray-500  border-b -mx-4">
                <div class="flex gap-4 px-4 flex-row">
                    @if (isset($memberDonor->profile_photo_path) && $memberDonor->profile_photo_path)
                        <img class=" object-cover object-center flex-shrink-0 w-16 h-16  rounded-full"
                            src="{{ asset('storage/' . $memberDonor->profile_photo_path) }}" alt="donor_image" />
                    @else
                        <i
                            class="w-16 h-16 object-cover bg-gray-200 object-center flex-shrink-0 rounded-full mr-4 fa-thin fa-dove fa-3x"></i>
                    @endif
                    <div class="flex w-full flex-col justify-center ">
                        <p class="text-sm md:text-lg font-semibold">
                            {{ $donorFullName ?? $donor->full_name }}
                        </p>
                        @if ($memberDonor)
                            <p class="mb-2 text-xs text-gray-800">
                                {{ $memberDonor->occupation }}</p>
                        @endif
                        <p class="flex justify-between text-sm tracking-wide text-gray-800">
                            <span> Donated : <span class="font-semibold"><span>
                                        &#x20A6;</span>{{ number_format($donationNotification->data['amount']) }}
                                    to the <a class="text-blue-500"
                                        href="#">{{ $donation->campaign->campaign_title }}</a>
                                    Fundraiser</span></span>
                            <span
                                class="title-font text-sm text-gray-500">{{ Carbon\Carbon::parse($donationNotification->data['created_at'])->DiffForHumans() }}</span>
                        </p>

                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>
