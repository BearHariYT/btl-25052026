<nav style="position:fixed;top:0;left:0;right:0;z-index:100;padding:0 32px;height:68px;display:flex;align-items:center;background:rgba(20,22,39,0.85);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-bottom:1px solid rgba(255,255,255,0.06);"
    x-data="{ mobileOpen: false }">

    {{-- Logo --}}
    <a href="{{ route('home') }}" wire:navigate style="display:flex;align-items:center;gap:10px;text-decoration:none;margin-right:28px;flex-shrink:0;">
        <img src="/logo.png" alt="byteland" style="width:36px;height:36px;border-radius:8px;" onerror="this.style.display='none'">
        <span style="font-size:22px;font-weight:500;color:#fff;line-height:1;letter-spacing:-0.01em;">byte<span style="font-weight:800;color:#0195f4;">land</span></span>
    </a>

    {{-- Desktop nav --}}
    <div class="md:flex hidden items-center flex-1">
        @foreach (\App\Classes\Navigation::getLinks() as $nav)
            @if (isset($nav['children']) && count($nav['children']) > 0)
                <x-dropdown :showArrow="true">
                    <x-slot:trigger>
                        <span style="padding:6px 12px;font-size:15px;color:#cdcfe3;cursor:pointer;white-space:nowrap;">{{ $nav['name'] }}</span>
                    </x-slot:trigger>
                    <x-slot:content>
                        @foreach ($nav['children'] as $child)
                            <x-navigation.link :href="$child['url']" :spa="$child['spa'] ?? true">{{ $child['name'] }}</x-navigation.link>
                        @endforeach
                    </x-slot:content>
                </x-dropdown>
            @else
                <x-navigation.link :href="$nav['url']" :spa="$nav['spa'] ?? true" style="padding:6px 12px;font-size:15px;">{{ $nav['name'] }}</x-navigation.link>
            @endif
        @endforeach
    </div>

    {{-- Right --}}
    <div class="flex items-center gap-2 ml-auto">
        <livewire:components.cart />
        <div class="md:flex hidden items-center gap-1">
            <livewire:components.locale-switch />
        </div>

        @if(auth()->check())
            <livewire:components.notifications />
            <div class="hidden lg:flex">
                <x-dropdown :showArrow="false">
                    <x-slot:trigger>
                        <div style="display:flex;align-items:center;gap:8px;padding:6px 14px;border-radius:10px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.09);cursor:pointer;">
                            <img src="{{ auth()->user()->avatar }}" style="width:28px;height:28px;border-radius:50%;" alt="avatar">
                            <span style="font-size:14px;font-weight:500;color:#fff;">{{ auth()->user()->name }}</span>
                        </div>
                    </x-slot:trigger>
                    <x-slot:content>
                        <div style="padding:10px 14px;border-bottom:1px solid rgba(255,255,255,0.07);">
                            <p style="font-size:13px;font-weight:600;color:#fff;margin:0 0 2px;">{{ auth()->user()->name }}</p>
                            <p style="font-size:11px;color:#6d708a;margin:0;">{{ auth()->user()->email }}</p>
                        </div>
                        @foreach (\App\Classes\Navigation::getAccountDropdownLinks() as $nav)
                            <x-navigation.link :href="$nav['url']" :spa="$nav['spa'] ?? true">{{ $nav['name'] }}</x-navigation.link>
                        @endforeach
                        <livewire:auth.logout />
                    </x-slot:content>
                </x-dropdown>
            </div>
        @else
            <div class="hidden lg:flex items-center gap-2">
                <a href="{{ route('login') }}" wire:navigate>
                    <x-button.secondary class="!w-auto !py-2 !px-5 !text-sm">{{ __('navigation.login') }}</x-button.secondary>
                </a>
                @if(!config('settings.registration_disabled', false))
                    <a href="{{ route('register') }}" wire:navigate>
                        <x-button.primary class="!w-auto !py-2 !px-5 !text-sm">{{ __('navigation.register') }}</x-button.primary>
                    </a>
                @endif
            </div>
        @endif

        {{-- Mobile burger --}}
        <button @click="mobileOpen=!mobileOpen" class="flex lg:hidden items-center justify-center w-9 h-9 rounded-lg" style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.09);">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path x-show="!mobileOpen" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="mobileOpen" x-cloak d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <template x-teleport="body">
        <div x-show="mobileOpen" x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            style="position:fixed;top:68px;left:0;right:0;bottom:0;z-index:99;background:rgba(20,22,39,0.97);backdrop-filter:blur(18px);overflow-y:auto;"
            @click.away="mobileOpen=false">
            <div style="padding:16px;">
                <x-navigation.sidebar-links />
                @if(!auth()->check())
                    <div style="display:flex;flex-direction:column;gap:8px;padding:8px;">
                        <a href="{{ route('register') }}" wire:navigate><x-button.primary>{{ __('navigation.register') }}</x-button.primary></a>
                        <a href="{{ route('login') }}" wire:navigate><x-button.secondary>{{ __('navigation.login') }}</x-button.secondary></a>
                    </div>
                @endif
            </div>
        </div>
    </template>
</nav>
