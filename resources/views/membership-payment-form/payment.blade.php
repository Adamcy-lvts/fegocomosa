  <form method="POST" accept-charset="UTF-8" action="{{ route('pay') }}">
      @csrf
      <div class="flex flex-col  md:flex-row gap-2">
          <h1 class="text-4xl text-gray-700">Yearly Membership Fee is <span>
                  &#x20A6;</span>10,000
          </h1>
          <input type="hidden" name="fname" value="{{ auth()->user()->first_name }}">
          <input type="hidden" name="lname" value="{{ auth()->user()->last_name }}">
          <input type="hidden" name="phone" value="{{ auth()->user()->phone }}">
          <input type="hidden" value="100000">
          <input type="hidden" name="currency" value="NGN">
          <input type="hidden" name="metadata" value="{{ json_encode($array = ['payment_for' => 'membership']) }}">
          <input type="hidden" name="additional_info"
              value="{{ json_encode($array = ['payment_for' => 'membership']) }}">
          {{-- For other necessary things you want to add to your payload. it is optional though --}}
          <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}


          <x-button type="submit" class="w-full sm:w-0 py-2 px-8" green label="Pay" />
      </div>
  </form>
