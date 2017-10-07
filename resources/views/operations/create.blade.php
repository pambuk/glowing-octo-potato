@extends('layouts.app')

@section('content')
    <div class="container col-lg-11 col-lg-offset-1">
        <ol class="breadcrumb">
            <li><a href="{{ route('operations.index') }}">Operations</a></li>
            <li class="active">Edit operation</li>
        </ol>
    </div>

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
                            ['label' => 'Receipt', 'value' => \App\Enums\OperationTypes::RECEIPT],
                            ['label' => 'Expense', 'value' => \App\Enums\OperationTypes::EXPENSE],
                            ['label' => 'Income', 'value' => \App\Enums\OperationTypes::INCOME],
                        ]])
                        @include('form.input', ['label' => 'Amount', 'name' => 'value', 'required' => true, 'value' => $value ?? null])
                        @include('form.input', [
                            'label' => 'Date', 'name' => 'operation_date',
                            'value' => $operation_date ?? \Carbon\Carbon::now()->toDateString(),
                            'type' => 'date',
                        ])
                        @include('form.input', ['label' => 'Description', 'name' => 'description', 'value' => $description ?? ''])

                        <hr/>

                        <div class="row">
                            <div class="col-lg-6">
                                @include('form.select', [
                                    'label' => 'Operation source', 'name' => 'operation_source_id', 'options' => $operationSourceOptions,
                                    'selected' => old('operation_source_id') ?? $operation_source_id ?? ''
                                ])
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="operation_sources.name">Add source</label>
                                    <input
                                            name="operation_sources.name" value="" list="sources"
                                            class="form-control" id="operation_sources.name" autocomplete="off">
                                    <datalist id="sources">
                                        @foreach($publicSources as $source)
                                            <option value="{{ $source->name }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>

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

                <a href="/operation-items/{{ $id }}/index" type="button" class="btn btn-default pull-right"
                   aria-label="Right Align">
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
                </a>
            </h1>

            @include('operation-items.list')

        </div>
    @endif
@endsection