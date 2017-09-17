@extends('layouts.app')

@section('content')
    <div class="container col-lg-6 col-lg-offset-1">
        <h1>Add operation item</h1>

        @include('form.errors')

        <form method="post" action="{{ route('operation-items.store', ['operation' => $operation]) }}">

            {{ csrf_field() }}

            <input type="hidden" name="operation_id" value="{{ $operation->id }}" />

            @include('form.input', ['label' => 'Amount', 'name' => 'value', 'required' => true, 'value' => old('value')])
            @include('form.input', ['label' => 'Description', 'name' => 'description', 'value' => old('description'),])

            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>

    <div class="col-lg-5">
        <h1>Items</h1>
        @include('operation-items.list', ['items' => $operation->items->toArray()])
    </div>
@endsection