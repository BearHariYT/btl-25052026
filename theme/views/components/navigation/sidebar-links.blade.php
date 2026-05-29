<div class="px-3 py-5 flex flex-col gap-1">
    {{-- Main nav links (shown in mobile hamburger too) --}}
    <div class="flex flex-col gap-0.5 md:hidden mb-2">
        @foreach (\App\Classes\Navigation::getLinks() as $nav)
            @if (!empty($nav['children']))
                <div x-data="{ open: {{ $nav['active'] ? 'true' : 'false' }} }">
                    <button @click="open = !open"
                        class="side-link w-full justify-between"
                        :class="open ? 'text-white' : ''">
                        <span class="flex items-center gap-2">
                            @isset($nav['icon'])<x-dynamic-component :component="$nav['icon']" class="w-4 h-4"/>@endisset
                            {{ $nav['name'] }}
                        </span>
                        <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-8 flex flex-col gap-0.5">
                        @foreach ($nav['children'] as $child)
                            <x-navigation.link :href="$child['url']" :spa="$child['spa'] ?? true"
                                class="side-link !py-2 {{ $child['active'] ? 'active' : '' }}">
                                {{ $child['name'] }}
                            </x-navigation.link>
                        @endforeach
                    </div>
                </div>
            @else
                <x-navigation.link :href="$nav['url']" :spa="$nav['spa'] ?? true"
                    class="side-link {{ $nav['active'] ? 'active' : '' }}">
                    @isset($nav['icon'])<x-dynamic-component :component="$nav['icon']" class="w-4 h-4"/>@endisset
                    {{ $nav['name'] }}
                </x-navigation.link>
            @endif
            @isset($nav['separator'])<div class="my-1 h-px" style="background:rgba(255,255,255,0.06);"></div>@endisset
        @endforeach
    </div>

    {{-- Dashboard links (always shown in sidebar) --}}
    <p class="px-3 pt-1 pb-1 text-xs font-medium uppercase tracking-widest" style="color:#6d708a;">Управление</p>
    @foreach (\App\Classes\Navigation::getDashboardLinks() as $nav)
        @if (!empty($nav['children']))
            <div x-data="{ open: {{ $nav['active'] ? 'true' : 'false' }} }">
                <button @click="open = !open"
                    class="side-link w-full justify-between"
                    :class="open ? 'text-white' : ''">
                    <span class="flex items-center gap-2">
                        @isset($nav['icon'])<x-dynamic-component :component="$nav['icon']" class="w-4 h-4"/>@endisset
                        {{ $nav['name'] }}
                    </span>
                    <svg class="w-3.5 h-3.5 transition-transform" :class="open ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div x-show="open" x-cloak class="pl-7 flex flex-col gap-0.5">
                    @foreach ($nav['children'] as $child)
                        @if ($child['condition'] ?? true)
                            <x-navigation.link :href="$child['url']" :spa="$child['spa'] ?? true"
                                class="side-link !py-2 {{ $child['active'] ? 'active' : '' }}">
                                {{ $child['name'] }}
                            </x-navigation.link>
                        @endif
                    @endforeach
                </div>
            </div>
        @else
            <x-navigation.link :href="$nav['url']" :spa="$nav['spa'] ?? true"
                class="side-link {{ $nav['active'] ? 'active' : '' }}">
                @isset($nav['icon'])<x-dynamic-component :component="$nav['icon']" class="w-4 h-4"/>@endisset
                {{ $nav['name'] }}
            </x-navigation.link>
        @endif
        @isset($nav['separator'])<div class="my-1 h-px" style="background:rgba(255,255,255,0.06);"></div>@endisset
    @endforeach

    <div class="mt-2 flex items-center gap-2">
        <livewire:components.locale-switch />
    </div>
</div>
