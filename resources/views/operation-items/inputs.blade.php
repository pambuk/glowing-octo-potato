<input type="hidden" name="operation_id" value="{{ $operation->id }}"/>

@include('form.input', ['label' => 'Amount', 'name' => 'value', 'required' => true, 'value' => old('value')])
@include('form.input', ['label' => 'Description', 'name' => 'description', 'value' => old('description'),])

<div class="row">
    <div class="col-lg-2">
        @include('form.input', ['label' => 'Qty.:', 'name' => 'quantity',
            'value' => old('value') ?: 1, 'type' => 'number'])
    </div>
    <div class="col-lg-3">
        @include('form.input', ['label' => 'Volume/Weight', 'name' => 'volume_weight',
            'value' => old('volume_weight'), 'placeholder' => '1kg, 0.5l, 250g, ...'])
    </div>
</div>