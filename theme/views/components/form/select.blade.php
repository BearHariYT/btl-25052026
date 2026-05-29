@props(['name', 'label' => null, 'options' => [], 'selected' => null, 'multiple' => false, 'required' => false, 'divClass' => null, 'hideRequiredIndicator' => false])
<fieldset class="flex flex-col w-full {{ $divClass ?? '' }}">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 text-xs font-medium uppercase tracking-wide" style="color:#6d708a;">
            {{ $label }}
            @if ($required && !$hideRequiredIndicator)
                <span style="color:#fd5c65;">*</span>
            @endif
        </label>
    @endif
    <select
        id="{{ $id ?? $name }}"
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        {{ $multiple ? 'multiple' : '' }}
        {{ $attributes->except(['options','id','name','multiple'])->merge(['class' => 'input-bl select-bl']) }}>
        @if (count($options) == 0 && $slot)
            {{ $slot }}
        @else
            @foreach ($options as $key => $option)
                <option value="{{ gettype($options) == 'array' ? $option : $key }}"
                    {{ ($multiple && $selected ? in_array($key, $selected) : $selected == $option) ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        @endif
    </select>
    @if ($multiple)
        <p class="text-xs mt-1" style="color:#6d708a;">Ctrl / Cmd для выбора нескольких</p>
    @endif
    @error($name)
        <p class="text-xs mt-1" style="color:#fd5c65;">{{ $message }}</p>
    @enderror
</fieldset>
