<div class="w-full md:w-1/3 text-center py-8">
    <div>

        @if ($membershipPayment == null)
            <div class="text-gray-500 mb-2">
                <span class="text-5xl"><span> &#x20A6;</span>0</span>
                {{-- <span class="text-2xl text-green-400 align-top">Paid</span> --}}
            </div>
            <div class="text-sm uppercase text-grey tracking-wide">
                You have not pay your dues for the year {{ now()->year }}
            </div>
        @else
            <div class="text-gray-500 mb-2">
                <span class="text-5xl"><span>
                        &#x20A6;</span>{{ number_format($membershipPayment->amount) }}</span>
                <span class="text-sm text-green-600 align-top">Paid</span>
            </div>
            <div class="text-sm uppercase text-grey tracking-wide">
                You have paid your dues for the year {{ now()->year }}
            </div>
        @endif

    </div>
</div>
