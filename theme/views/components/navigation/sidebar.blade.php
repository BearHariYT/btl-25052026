<aside id="main-aside"
    class="mt-14 w-64 h-screen md:flex hidden flex-col justify-between border-e border-neutral fixed top-0 left-0 rtl:right-0 z-10"
    style="background:rgba(20,22,39,0.80);backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px);border-color:rgba(255,255,255,0.07);">
    <x-navigation.sidebar-links />
    {{-- Bottom user info --}}
    @if(auth()->check())
    <div class="p-4 border-t" style="border-color:rgba(255,255,255,0.07);">
        <div class="flex items-center gap-3">
            <img src="{{ auth()->user()->avatar }}" class="w-8 h-8 rounded-full flex-shrink-0" alt="avatar">
            <div class="min-w-0 flex-1">
                <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-xs text-muted truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
    @endif
</aside>
