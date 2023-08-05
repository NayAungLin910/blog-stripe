@props(['active'])

@php
$classes = ($active ?? false)
? 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-theme-blue-100 font-medium leading-5 focus:outline-none focus:border-theme-blue-300 hover:opacity-50 transition p-2 rounded-lg shadow bg-blue-600 text-white'
: 'cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent font-medium leading-5 hover:border-theme-blue-100 hover:opacity-50 focus:outline-none focus:text-theme-blue-100 focus:border-theme-blue-100 transition p-2 rounded-lg shadow bg-blue-600 text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
