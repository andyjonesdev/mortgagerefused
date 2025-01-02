@props(['active'])

@php

$classes = ($active ?? false)
    ? 'inline-flex items-center px-2 lg:pl-4 font-medium w-64 text-white text-md focus:outline-none transition duration-150 ease-in-out'
    : 'inline-flex items-center px-2 lg:pl-4 font-medium w-64 text-white text-md hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
