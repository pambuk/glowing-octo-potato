@include('form.input', ['label' => 'Amount', 'name' => 'value', 'required' => true, 'value' => $item->value])
@include('form.input', ['label' => 'Description', 'name' => 'description', 'value' => $item->description,])

<div class="row">
    <div class="col-lg-2">
        @include('form.input', ['label' => 'Qty.:', 'name' => 'quantity',
            'value' => $item->quantity, 'type' => 'number'])
    </div>
    <div class="col-lg-3">
        @include('form.input', ['label' => 'Volume/Weight', 'name' => 'volume_weight',
            'value' => $item->volume_weight, 'placeholder' => '1kg, 0.5l, 250g, ...'])
    </div>
</div>