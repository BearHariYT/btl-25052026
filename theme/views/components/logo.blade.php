@php $logo = config('settings.logo'); @endphp
@if ($logo)
    <img src="{{ Storage::url($logo) }}" alt="{{ config('app.name') }}" {{ $attributes->merge(['class' => 'h-8 w-auto']) }}>
@endif
