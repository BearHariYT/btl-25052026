@props(['name', 'label' => null, 'required' => false, 'divClass' => null, 'class' => null, 'placeholder' => null, 'id' => null, 'type' => null, 'hideRequiredIndicator' => false, 'dirty' => false])
<fieldset class="flex flex-col w-full {{ $divClass ?? '' }}">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 text-xs font-medium uppercase tracking-wide" style="color:#6d708a;">
            {{ $label }}
            @if ($required && !$hideRequiredIndicator)
                <span class="text-error">*</span>
            @endif
        </label>
    @endif
    <input
        type="{{ $type ?? 'text' }}"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder ?? ($label ?? '') }}"
        class="input-bl {{ $class ?? '' }} @if($dirty && isset($attributes['wire:model'])) dirty:border-yellow-600 @endif"
        @if ($dirty && isset($attributes['wire:model'])) wire:dirty.class="!border-yellow-500" @endif
        {{ $attributes->except(['placeholder','label','id','name','type','class','divClass','required','hideRequiredIndicator','dirty']) }}
        @required($required)
    />
    @error($name)
        <p class="text-xs mt-1" style="color:#fd5c65;">{{ $message }}</p>
    @enderror
</fieldset>
