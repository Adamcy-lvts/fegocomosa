{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium']) }}>
    
</button> --}}
<x-button green>{{ $slot }}</x-button>
