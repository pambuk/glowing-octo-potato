<div class="radio">
    @foreach($options as $option)
        <label>
            @if(isset($selected) && $option['value'] === $selected)
                <input
                        type="radio"
                        name="{{ $name }}"
                        value="{{ $option['value'] }}"
                        checked
                        {{ (isset($required) && $required === true) ? 'required' : '' }}>
            @else
                <input
                        type="radio"
                        name="{{ $name }}"
                        value="{{ $option['value'] }}" {{ (isset($required) && $required === true) ? 'required' : '' }}>
            @endif
            {{ $option['label'] }}
        </label>

        @if(!$loop->last)
            <br/>
        @endif
    @endforeach
</div>