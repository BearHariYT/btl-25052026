@props(['name', 'label' => null, 'required' => false, 'divClass' => null, 'class' => null, 'placeholder' => null, 'id' => null, 'dirty' => false])
<fieldset class="flex flex-col w-full {{ $divClass ?? '' }}">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 text-xs font-medium uppercase tracking-wide" style="color:#6d708a;">
            {{ $label }}
            @if ($required)
                <span style="color:#fd5c65;">*</span>
            @endif
        </label>
    @endif
    <textarea
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder ?? ($label ?? '') }}"
        class="input-bl min-h-[100px] resize-y {{ $class ?? '' }}"
        {{ $attributes->except(['placeholder','label','id','name','class','divClass','required','dirty']) }}
        @required($required)>{{ $slot }}</textarea>
    @error($name)
        <p class="text-xs mt-1" style="color:#fd5c65;">{{ $message }}</p>
    @enderror
</fieldset>
