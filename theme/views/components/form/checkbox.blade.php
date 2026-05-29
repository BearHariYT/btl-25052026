@props(['name', 'label' => null, 'id' => null, 'divClass' => null])
<div style="display:flex;align-items:center;gap:8px;" class="{{ $divClass ?? '' }}">
    <input
        type="checkbox"
        id="{{ $id ?? $name }}"
        name="{{ $name }}"
        {{ $attributes->except(['label','name','id','class','divClass','required']) }}
        style="width:16px;height:16px;cursor:pointer;accent-color:#0195f4;flex-shrink:0;"
    />
    <label style="font-size:14px;color:#cdcfe3;cursor:pointer;line-height:1.4;" for="{{ $id ?? $name }}">
        @if(isset($label)){{ $label }}@else{{ $slot }}@endif
    </label>
    @error($name)
        <p style="font-size:12px;color:#fd5c65;">{{ $message }}</p>
    @enderror
</div>
