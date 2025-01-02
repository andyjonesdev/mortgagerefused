@php

$classes = 'py-3 text-white underline'

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
