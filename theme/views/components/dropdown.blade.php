@props(['width' => null, 'content' => null, 'trigger' => null, 'showArrow' => true])
<div class="relative" x-data="{ open: false, adj: 0 }"
    x-init="$watch('open', v => {
        if (v) {
            adj = 0;
            $nextTick(() => {
                let r = $refs.dd.getBoundingClientRect();
                adj = r.right > window.innerWidth ? r.width - 40 : 0;
            });
        }
    })">

    <button class="flex items-center gap-1 px-2 py-1.5 text-sm font-medium text-base hover:text-white transition-colors rounded-md"
        x-on:click="open = !open">
        {{ $trigger }}
        @if($showArrow)
            <svg class="w-3.5 h-3.5 transition-transform duration-200 opacity-60" :class="open ? 'rotate-180' : ''"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        @endif
    </button>

    <div x-ref="dd"
        class="dropdown-bl absolute mt-2 {{ $width ?? 'w-48' }} py-1 z-50"
        :style="{ left: `-${adj}px` }"
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        x-on:click.outside="open = false"
        x-cloak>
        {{ $content }}
    </div>
</div>
