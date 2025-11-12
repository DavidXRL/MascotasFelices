@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-gray-800 text-sm font-medium leading-5 text-black focus:outline-none focus:border-gray-800 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-black hover:text-gray-600 hover:border-gray-400 focus:outline-none focus:text-gray-600 focus:border-gray-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
