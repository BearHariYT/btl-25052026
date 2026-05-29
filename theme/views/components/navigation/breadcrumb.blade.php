@php
    $navigation = [
        \App\Classes\Navigation::getLinks(),
        \App\Classes\Navigation::getAccountDropdownLinks(),
        \App\Classes\Navigation::getDashboardLinks(),
    ];
    if (!function_exists('blFindBreadcrumb')) {
        function blFindBreadcrumb($items, $url) {
            foreach ($items as $item) {
                if (isset($item['url']) && $item['url'] === $url) return [$item];
                if (!empty($item['children'])) {
                    $trail = blFindBreadcrumb($item['children'], $url);
                    if (!empty($trail)) return array_merge([$item], $trail);
                }
            }
            return [];
        }
    }
    $currentUrl = request()->url();
    $crumbs = [];
    foreach ($navigation as $group) {
        $crumbs = blFindBreadcrumb($group, $currentUrl);
        if (!empty($crumbs)) break;
    }
@endphp
<div class="flex items-center gap-1.5 text-sm text-muted pb-4">
    @if (!empty($crumbs))
        @foreach ($crumbs as $i => $crumb)
            @if ($i > 0)
                <svg class="w-3.5 h-3.5 opacity-40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
            @endif
            @if ($i === count($crumbs) - 1)
                @if (count($crumbs) === 1)
                    <h1 class="text-2xl font-bold text-white">{{ $crumb['name'] ?? '' }}</h1>
                @else
                    <span class="font-semibold text-white">{{ $crumb['name'] ?? '' }}</span>
                @endif
            @else
                <a href="{{ isset($crumb['route']) ? route($crumb['route'], $crumb['params'] ?? []) : '#' }}"
                    class="text-primary hover:text-white transition-colors font-medium">{{ $crumb['name'] ?? '' }}</a>
            @endif
        @endforeach
    @else
        <h1 class="text-2xl font-bold text-white">{{ __('navigation.home') }}</h1>
    @endif
</div>
