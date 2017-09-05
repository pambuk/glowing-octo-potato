<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input
            name="{{ $name }}"
            value="{{ old($name) ?? $value ?? '' }}"
            type="{{ $type ?? 'text' }}"
            class="form-control"
            id="{{ $name }}"
            placeholder="{{ $placeholder ?? '' }}"
            {{ (isset($required) && $required === true) ? 'required' : '' }}>
</div>