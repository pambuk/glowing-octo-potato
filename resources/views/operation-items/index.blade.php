@extends('layouts.app')

@section('content')

    <div class="container col-lg-11 col-lg-offset-1">
        <ol class="breadcrumb">
            <li><a href="{{ route('operations.index') }}">Operations</a></li>
            <li><a href="{{ route('operations.show', ['operation' => $operation]) }}">{{ $operation->description }}</a></li>
            <li class="active">Add operation item</li>
        </ol>
    </div>

    <div class="container col-lg-6 col-lg-offset-1">
        <h1>Add operation item</h1>

        @include('form.errors')

        <form method="post" action="{{ route('operation-items.store', ['operation' => $operation]) }}">

            {{ csrf_field() }}

            @include('operation-items.inputs-create')

            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>

    <div class="col-lg-5">
        <h1>Items</h1>
        @include('operation-items.list', ['items' => $operation->items->toArray()])
    </div>
@endsection