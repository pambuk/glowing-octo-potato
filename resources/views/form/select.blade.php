<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        <option>Pick {{ $label }}</option>
        @foreach($options as $option)
            @if(isset($selected) && $option['value'] === $selected)
                <option value="{{ $option['value'] }}" selected>{{ $option['label'] }}</option>
            @else
                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
            @endif
        @endforeach
    </select>
</div>