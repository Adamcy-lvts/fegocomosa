@props(['position'])

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-50 text-green-800']) }}>
    {{ $position ?? 'Position not specified' }}
</span>
