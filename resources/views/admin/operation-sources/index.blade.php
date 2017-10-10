@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Operation sources

            <a href="" type="button" class="btn btn-default pull-right" aria-label="Right Align">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
            </a>
        </h1>

        <operation-sources :items="{{ json_encode($sources) }}"></operation-sources>
    </div>
@endsection