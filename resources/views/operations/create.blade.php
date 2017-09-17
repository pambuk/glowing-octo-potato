@extends('layouts.app')

@section('content')
    <div class="container col-lg-6 col-lg-offset-1">
        @if(isset($id))
            <h1>Edit operation</h1>
        @else
            <h1>Add operation</h1>
        @endif

        @include('form.errors')

        @if(isset($id))
            <form method="post" action="{{ route('operations.update', ['operation' => $id]) }}">
                {{ method_field('PUT') }}
        @else
            <form method="post">
        @endif

                {{ csrf_field() }}

                @include('form.radio', ['name' => 'type', 'required' => true, 'selected' => old('type') ?? $type ?? '', 'options' => [
                    ['label' => 'Receipt', 'value' => \App\Operation::TYPE_RECEIPT],
                    ['label' => 'Expense', 'value' => \App\Operation::TYPE_EXPENSE],
                    ['label' => 'Income', 'value' => \App\Operation::TYPE_INCOME],
                ]])
                @include('form.input', ['label' => 'Amount', 'name' => 'value', 'required' => true, 'value' => $value ?? null])
                @include('form.input', [
                    'label' => 'Date', 'name' => 'operation_date',
                    'value' => $operation_date ?? \Carbon\Carbon::now()->toDateString(),
                    'type' => 'date',
                ])
                @include('form.input', ['label' => 'Description', 'name' => 'description', 'value' => $description ?? ''])

                <hr/>

                @include('form.select', [
                    'label' => 'Operation source', 'name' => 'operation_source_id', 'options' => $operationSourceOptions,
                    'selected' => old('operation_source_id') ?? $operation_source_id ?? ''
                ])

                <button type="submit" class="btn btn-default">
                    @if(isset($id))
                        Update
                    @else
                        Add
                    @endif
                </button>
            </form>
    </div>

    @if (isset($id))
    <div class="col-lg-5">
        <h1>
            Items

            <a href="/operation-items/{{ $id }}/index" type="button" class="btn btn-default pull-right" aria-label="Right Align">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
            </a>
        </h1>

        @include('operation-items.list')

    </div>
    @endif
@endsection