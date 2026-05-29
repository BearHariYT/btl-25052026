@props(['href', 'spa' => true])
<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'side-link ' . ($href === request()->url() ? 'active' : '')]) }}
    @if($spa) wire:navigate @endif>
    {{ $slot }}
</a>
