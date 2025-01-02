@props(['active'])

@php

$classes = ($active ?? false)
? 'inline-flex items-center bg-gray-900 py-3 text-white px-2 rounded-t-lg focus:outline-none focus:border-orange-600 transition duration-150 ease-in-out'
: 'inline-flex items-center pt-3 pb-1.5 border-b-8 px-2 border-transparent text-md font-medium leading-5 text-black hover:text-orange-700 hover:border-orange-600 focus:outline-none focus:text-orange-700 focus:border-orange-600 transition duration-150 ease-in-out';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
