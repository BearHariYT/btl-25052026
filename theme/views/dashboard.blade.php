<div style="max-width:1380px;margin:0 auto;padding:32px 24px 60px;">
    <x-navigation.breadcrumb />
    <p style="color:#6d708a;font-size:14px;margin-bottom:28px;">{{ __('dashboard.dashboard_description') }}</p>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;align-items:start;">

        <div style="display:flex;flex-direction:column;gap:24px;">
            {{-- Active Services --}}
            <div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="width:32px;height:32px;border-radius:8px;background:rgba(1,149,244,0.12);display:flex;align-items:center;justify-content:center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0195f4" stroke-width="2"><path d="M5 12h2m0-1a1 1 0 011-1h8a1 1 0 011 1v1m-10 0v1a1 1 0 001 1h8a1 1 0 001-1v-1m-10 0h10M3 6h18M3 18h18"/></svg>
                        </div>
                        <h2 style="font-size:17px;font-weight:600;color:#fff;margin:0;">{{ __('dashboard.active_services') }}</h2>
                    </div>
                    <span style="background:#0195f4;color:#fff;border-radius:6px;padding:1px 8px;font-size:12px;font-weight:700;">{{ Auth::check() ? Auth::user()->services()->where('status','active')->count() : 0 }}</span>
                </div>
                <div style="display:flex;flex-direction:column;gap:10px;">
                    <livewire:services.widget status="active" />
                </div>
                <a href="{{ route('services') }}" wire:navigate style="display:flex;align-items:center;justify-content:center;gap:6px;padding:10px;margin-top:10px;border-radius:10px;background:rgba(28,31,55,0.55);border:1px solid rgba(255,255,255,0.08);color:#6d708a;font-size:14px;transition:color 0.15s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">
                    {{ __('dashboard.view_all') }} →
                </a>
            </div>

            @if(!config('settings.tickets_disabled',false))
            <div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="width:32px;height:32px;border-radius:8px;background:rgba(167,94,234,0.12);display:flex;align-items:center;justify-content:center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#a75eea" stroke-width="2"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                        </div>
                        <h2 style="font-size:17px;font-weight:600;color:#fff;margin:0;">{{ __('dashboard.open_tickets') }}</h2>
                        <a href="{{ route('tickets.create') }}" wire:navigate style="color:#6d708a;line-height:0;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
                        </a>
                    </div>
                    <span style="background:#a75eea;color:#fff;border-radius:6px;padding:1px 8px;font-size:12px;font-weight:700;">{{ Auth::check() ? Auth::user()->tickets()->where('status','!=','closed')->count() : 0 }}</span>
                </div>
                <div style="display:flex;flex-direction:column;gap:10px;">
                    <livewire:tickets.widget />
                </div>
                <a href="{{ route('tickets') }}" wire:navigate style="display:flex;align-items:center;justify-content:center;gap:6px;padding:10px;margin-top:10px;border-radius:10px;background:rgba(28,31,55,0.55);border:1px solid rgba(255,255,255,0.08);color:#6d708a;font-size:14px;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">
                    {{ __('dashboard.view_all') }} →
                </a>
            </div>
            @endif
        </div>

        <div style="display:flex;flex-direction:column;gap:24px;">
            {{-- Unpaid Invoices --}}
            <div>
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="width:32px;height:32px;border-radius:8px;background:rgba(254,210,48,0.12);display:flex;align-items:center;justify-content:center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fed230" stroke-width="2"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2M9 12h6M9 16h4"/></svg>
                        </div>
                        <h2 style="font-size:17px;font-weight:600;color:#fff;margin:0;">{{ __('dashboard.unpaid_invoices') }}</h2>
                    </div>
                    <span style="background:#fed230;color:#141627;border-radius:6px;padding:1px 8px;font-size:12px;font-weight:700;">{{ Auth::check() ? Auth::user()->invoices()->where('status','pending')->count() : 0 }}</span>
                </div>
                <div style="display:flex;flex-direction:column;gap:10px;">
                    <livewire:invoices.widget :limit="3" />
                </div>
                <a href="{{ route('invoices') }}" wire:navigate style="display:flex;align-items:center;justify-content:center;gap:6px;padding:10px;margin-top:10px;border-radius:10px;background:rgba(28,31,55,0.55);border:1px solid rgba(255,255,255,0.08);color:#6d708a;font-size:14px;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#6d708a'">
                    {{ __('dashboard.view_all') }} →
                </a>
            </div>
            {!! hook('pages.dashboard') !!}
        </div>
    </div>
</div>
