<div style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:80px 16px;">
    <form wire:submit.prevent="submit" id="register" style="width:100%;max-width:520px;padding:36px;border-radius:20px;background:rgba(28,31,55,0.60);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.09);">

        <div style="text-align:center;margin-bottom:28px;">
            <img src="/logo.png" alt="byteland" style="width:48px;height:48px;border-radius:10px;margin:0 auto 14px;">
            <h1 style="font-size:24px;font-weight:700;color:#fff;margin:0 0 4px;">Создать аккаунт</h1>
            <p style="font-size:14px;color:#6d708a;margin:0;">byte<span style="color:#0195f4;font-weight:700;">land</span></p>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
            <x-form.input name="first_name" type="text" :label="__('general.input.first_name')" :placeholder="__('general.input.first_name_placeholder')" wire:model="first_name" required />
            <x-form.input name="last_name" type="text" :label="__('general.input.last_name')" :placeholder="__('general.input.last_name_placeholder')" wire:model="last_name" required />
            <div style="grid-column:1/-1;">
                <x-form.input name="email" type="email" :label="__('general.input.email')" :placeholder="__('general.input.email_placeholder')" required wire:model="email" />
            </div>
            <x-form.input name="password" type="password" :label="__('general.input.password')" :placeholder="__('general.input.password_placeholder')" wire:model="password" required />
            <x-form.input name="password_confirm" type="password" :label="__('general.input.password_confirmation')" :placeholder="__('general.input.password_confirmation_placeholder')" wire:model="password_confirmation" required />
            <x-form.properties :custom_properties="$custom_properties" :properties="$properties" />
            @if(config('settings.tos'))
                <div style="grid-column:1/-1;">
                    <x-form.checkbox wire:model="tos" name="tos" required>
                        {{ __('product.tos') }}
                        <a href="{{ config('settings.tos') }}" target="_blank" style="color:#0195f4;">{{ __('product.tos_link') }}</a>
                    </x-form.checkbox>
                </div>
            @endif
        </div>

        <x-captcha :form="'register'" />

        <div style="margin-top:20px;">
            <x-button.primary type="submit">{{ __('auth.sign_up') }}</x-button.primary>
        </div>

        <p style="text-align:center;font-size:13px;color:#6d708a;margin:18px 0 0;">
            {{ __('auth.already_have_account') }}
            <a href="{{ route('login') }}" wire:navigate style="color:#0195f4;font-weight:600;text-decoration:none;">{{ __('auth.sign_in') }}</a>
        </p>
    </form>
</div>
