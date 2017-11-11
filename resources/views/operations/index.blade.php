@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Operations for {{ $date->format('F Y') }}

            <a href="/operations/create" type="button" class="btn btn-default pull-right" aria-label="Right Align">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add
            </a>
        </h1>

        <div class="row">
            <span class="col-lg-10">
                <a href="{{ route('operations.index', ['date' => $prevMonth->format('Ym')]) }}">
                    &lt; {{ $prevMonth->format('F Y') }}
                </a>
            </span>
            <span class="col-lg-2" style="text-align: right">
                <a href="{{ route('operations.index', ['date' => $nextMonth->format('Ym')]) }}">
                    {{ $nextMonth->format('F Y') }} &gt;
                </a>
            </span>
        </div>

        <operation-list :items="{{ json_encode($operations) }}"></operation-list>
    </div>
@endsection