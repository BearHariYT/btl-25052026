<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(in_array(app()->getLocale(), config('app.rtl_locales', []))) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'byteland') }}@isset($title) — {{ $title }}@endisset</title>
    @livewireStyles
    @vite(['themes/byteland/js/app.js', 'themes/byteland/css/app.css'], 'byteland')
    @include('layouts.colors')
    @if (config('settings.favicon'))
        <link rel="icon" href="{{ Storage::url(config('settings.favicon')) }}">
    @endif
    {!! hook('head') !!}
</head>
<body class="w-full bg-background text-base min-h-screen flex flex-col antialiased dark"
    x-data="{ isDark: true }"
    :class="{'dark': isDark}">
    {!! hook('body') !!}
    <x-navigation />
    <div class="w-full flex flex-grow">
        @if (isset($sidebar) && $sidebar)
            <x-navigation.sidebar />
        @endif
        <div class="{{ (isset($sidebar) && $sidebar) ? 'md:ml-64 rtl:ml-0 rtl:md:mr-64' : '' }} flex flex-col flex-grow overflow-auto">
            <main class="mt-16 grow">
                {{ $slot }}
            </main>
            <x-notification />
            <x-confirmation />
            <div class="flex">
                <x-navigation.footer />
            </div>
        </div>
        <x-impersonating />
    </div>
    @livewireScripts
    @livewireScriptConfig
    {!! hook('footer') !!}
</body>
</html>
