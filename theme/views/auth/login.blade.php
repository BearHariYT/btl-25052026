<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;">
    <form wire:submit="submit" id="login" style="width:100%;max-width:420px;padding:36px;border-radius:20px;background:rgba(28,31,55,0.60);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.09);">

        <div style="text-align:center;margin-bottom:28px;">
            <img src="/logo.png" alt="byteland" style="width:48px;height:48px;border-radius:10px;margin:0 auto 14px;">
            <h1 style="font-size:24px;font-weight:700;color:#fff;margin:0 0 4px;">Вход в кабинет</h1>
            <p style="font-size:14px;color:#6d708a;margin:0;">byte<span style="color:#0195f4;font-weight:700;">land</span></p>
        </div>

        <div style="display:flex;flex-direction:column;gap:14px;">
            <x-form.input name="email" type="email" :label="__('general.input.email')" :placeholder="__('general.input.email_placeholder')" wire:model="email" required hideRequiredIndicator autocomplete="email" />
            <x-form.input name="password" type="password" :label="__('general.input.password')" :placeholder="__('general.input.password_placeholder')" required hideRequiredIndicator wire:model="password" autocomplete="current-password" />

            <div style="display:flex;align-items:center;justify-content:space-between;">
                <x-form.checkbox name="remember" label="Запомнить меня" wire:model="remember" />
                <a href="{{ route('password.request') }}" style="font-size:13px;color:#0195f4;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#0195f4'">{{ __('auth.forgot_password') }}</a>
            </div>

            <x-captcha :form="'login'" />

            <x-button.primary type="submit" class="mt-1">{{ __('auth.sign_in') }}</x-button.primary>
        </div>

        {!! hook('auth.login') !!}

        @if (config('settings.oauth_github') || config('settings.oauth_google') || config('settings.oauth_discord'))
            <div style="display:flex;align-items:center;gap:12px;margin:20px 0;">
                <div style="flex:1;height:1px;background:rgba(255,255,255,0.08);"></div>
                <span style="font-size:12px;color:#6d708a;padding:4px 12px;background:rgba(255,255,255,0.04);border-radius:999px;">{{ __('auth.or_sign_in_with') }}</span>
                <div style="flex:1;height:1px;background:rgba(255,255,255,0.08);"></div>
            </div>
            <div style="display:flex;justify-content:center;gap:12px;flex-wrap:wrap;">
                @foreach (['github', 'google', 'discord'] as $provider)
                    @if (config('settings.oauth_' . $provider))
                        <a href="{{ route('oauth.redirect', $provider) }}" style="display:flex;align-items:center;gap:8px;padding:8px 16px;border-radius:10px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.09);color:#fff;font-size:13px;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'">
                            <img src="/assets/images/{{ $provider }}-dark.svg" alt="{{ $provider }}" style="width:16px;height:16px;">
                            {{ ucfirst($provider) }}
                        </a>
                    @endif
                @endforeach
            </div>
        @endif

        @if(!config('settings.registration_disabled', false))
            <p style="text-align:center;font-size:13px;color:#6d708a;margin:20px 0 0;">
                {{ __('auth.dont_have_account') }}
                <a href="{{ route('register') }}" wire:navigate style="color:#0195f4;font-weight:600;text-decoration:none;">{{ __('auth.sign_up') }}</a>
            </p>
        @endif
    </form>
</div>
