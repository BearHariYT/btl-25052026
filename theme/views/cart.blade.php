<div class="container mt-14 pb-16">
    <h1 class="text-2xl font-bold text-white mb-6">Корзина</h1>

    <div class="flex flex-col md:grid md:grid-cols-4 gap-6">

        {{-- Cart items --}}
        <div class="flex flex-col col-span-3 gap-3">
            @if (Cart::items()->count() === 0)
                <div class="flex flex-col items-center justify-center py-20 rounded-2xl"
                    style="background:rgba(28,31,55,0.55);backdrop-filter:blur(18px);border:1px solid rgba(255,255,255,0.08);">
                    <svg class="w-12 h-12 mb-4" style="color:#6d708a;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h14M17 21a1 1 0 100-2 1 1 0 000 2zM9 21a1 1 0 100-2 1 1 0 000 2"/></svg>
                    <p class="text-lg font-semibold text-white mb-1">{{ __('product.empty_cart') }}</p>
                    <p class="text-sm" style="color:#6d708a;">Выберите услугу в витрине</p>
                    <a href="{{ route('home') }}" wire:navigate class="mt-4">
                        <x-button.primary class="!w-auto !px-6">Перейти в витрину</x-button.primary>
                    </a>
                </div>
            @endif

            @foreach (Cart::items() as $item)
                <div class="flex flex-row justify-between w-full p-4 rounded-2xl"
                    style="background:rgba(28,31,55,0.55);backdrop-filter:blur(18px);border:1px solid rgba(255,255,255,0.08);">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg font-bold text-white">{{ $item->product->name }}</h2>
                        <p class="text-sm" style="color:#6d708a;">
                            @foreach ($item->config_options as $option)
                                {{ $option['option_name'] }}: {{ $option['value_name'] }}<br>
                            @endforeach
                        </p>
                    </div>
                    <div class="flex flex-col justify-between items-end gap-3">
                        <h3 class="text-xl font-bold text-white">
                            {{ $item->price->format($item->price->total * $item->quantity) }}
                            @if ($item->quantity > 1)
                                <span class="text-sm font-normal" style="color:#6d708a;">({{ $item->price }} за шт.)</span>
                            @endif
                        </h3>
                        <div class="flex flex-row gap-2">
                            @if ($item->product->allow_quantity == 'combined')
                                <div class="flex items-center gap-1">
                                    <x-button.secondary wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})" class="!w-8 !h-8 !p-0 !text-lg">−</x-button.secondary>
                                    <x-form.input class="!w-12 text-center !py-1" disabled divClass="!mt-0" value="{{ $item->quantity }}" name="quantity" />
                                    <x-button.secondary wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})" class="!w-8 !h-8 !p-0 !text-lg">+</x-button.secondary>
                                </div>
                            @endif
                            <a href="{{ route('products.checkout', [$item->product->category, $item->product, 'edit' => $item->id]) }}" wire:navigate>
                                <x-button.secondary class="!w-auto !py-2 !px-4 !text-sm">{{ __('product.edit') }}</x-button.secondary>
                            </a>
                            <x-button.danger wire:click="removeProduct({{ $item->id }})" class="!w-auto !py-2 !px-4 !text-sm">
                                <span wire:loading wire:target="removeProduct({{ $item->id }})">
                                    <svg class="w-3.5 h-3.5 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg>
                                </span>
                                <span wire:loading.remove wire:target="removeProduct({{ $item->id }})">{{ __('product.remove') }}</span>
                            </x-button.danger>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Order summary --}}
        @if (Cart::items()->count() > 0)
        <div class="flex flex-col gap-4 col-span-1 p-5 rounded-2xl h-fit sticky top-24"
            style="background:rgba(28,31,55,0.55);backdrop-filter:blur(18px);border:1px solid rgba(255,255,255,0.08);">
            <h2 class="text-lg font-bold text-white">{{ __('product.order_summary') }}</h2>

            {{-- Coupon --}}
            <div>
                @if(!$coupon)
                    <div class="flex gap-2">
                        <x-form.input wire:model="coupon" name="coupon" :label="__('Промокод')" />
                        <x-button.secondary wire:click="applyCoupon" class="!w-auto !self-end !py-2.5 !px-3 !text-sm" wire:loading.attr="disabled">
                            <span wire:loading wire:target="applyCoupon"><svg class="w-3.5 h-3.5 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg></span>
                            <span wire:loading.remove wire:target="applyCoupon">{{ __('product.apply') }}</span>
                        </x-button.secondary>
                    </div>
                @else
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-semibold text-white">{{ $coupon->code }}</span>
                        <x-button.secondary wire:click="removeCoupon" class="!w-auto !py-1.5 !px-3 !text-xs">{{ __('product.remove') }}</x-button.secondary>
                    </div>
                @endif
            </div>

            {{-- Totals --}}
            <div class="flex flex-col gap-1.5 pt-2" style="border-top:1px solid rgba(255,255,255,0.07);">
                <div class="flex justify-between text-sm">
                    <span style="color:#6d708a;">{{ __('invoices.subtotal') }}:</span>
                    <span class="text-white font-medium">{{ $total->format($total->subtotal) }}</span>
                </div>
                @if ($total->tax > 0)
                    <div class="flex justify-between text-sm">
                        <span style="color:#6d708a;">{{ \App\Classes\Settings::tax()->name }} ({{ \App\Classes\Settings::tax()->rate }}%):</span>
                        <span class="text-white font-medium">{{ $total->format($total->tax) }}</span>
                    </div>
                @endif
                <div class="flex justify-between text-base font-bold text-white pt-1" style="border-top:1px solid rgba(255,255,255,0.07);margin-top:4px;">
                    <span>{{ __('invoices.total') }}:</span>
                    <span>{{ $total->format($total->total) }}</span>
                </div>
            </div>

            {{-- ToS --}}
            @if(config('settings.tos'))
                <x-form.checkbox wire:model="tos" name="tos">
                    {{ __('product.tos') }}
                    <a href="{{ config('settings.tos') }}" target="_blank" class="text-primary hover:underline">
                        {{ __('product.tos_link') }}
                    </a>
                </x-form.checkbox>
            @endif

            <x-button.primary wire:click="checkout" wire:loading.attr="disabled">
                <span wire:loading wire:target="checkout"><svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg></span>
                <span wire:loading.remove wire:target="checkout">{{ __('product.checkout') }}</span>
            </x-button.primary>
        </div>
        @endif
    </div>
</div>
