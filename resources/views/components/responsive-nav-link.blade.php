@props(['active'])

@php
$classes = ($active ?? false)
            ? 'cSubTitle block w-full ps-3 pe-4 py-2 border-l-4 text-start text-base font-medium color-cPrimary bg-cSecondary transition duration-150 ease-in-out'
            : 'cSubTitle block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium color-cSecondary hover-cPrimary transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
