@props([

    'href' => '#',

    'type' => 'button',

    'color' => 'primary',
])


@php

$attributes = $attributes->class([

        "button w-full",

        "focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center",

        'text-white bg-primary-600 hover:bg-primary-700 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800' => ($color === 'primary') ,

        'bg-white text-gray-900 hover:bg-gray-200 ring-1 ring-inset ring-gray-300' => ($color === 'white') ,

    ])

@endphp


@if($href !== '#')

    <a href="{{ $href }}" {{ $attributes }}>
        {{ $slot }}
    </a>

@else

    <button {{ $attributes }}>
        {{ $slot }}
    </button>

@endif



