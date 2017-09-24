@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            Operations for {{ $date->format('F Y') }}

            <a href="/operations/create" type="button" class="btn btn-default pull-right" aria-label="Left Align">
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

        <table class="table table-striped">
            <tr>
                <th>Description</th>
                <th>Type</th>
                <th style="text-align: right">Amount</th>
                <th>Options</th>
            </tr>
            @foreach($operations as $operation)
                <tr>
                    <td>
                        <a href="{{ route('operations.show', ['operation' => $operation->id]) }}">
                            {{ $operation->description }}
                        </a>
                    </td>
                    <td>{{ $operation->type }}</td>
                    <td style="text-align: right">{{ $operation->value }}</td>
                    <td>
                        <button
                                class="btn btn-sm"
                                @click.prevent="confirmAction('/operations/delete/{{ $operation->id }}')"
                                style="cursor: pointer">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td><strong>Total: </strong></td>
                <td colspan="2" style="text-align: right">
                    <strong>{{ number_format($operations->sum('value'), 2) }}</strong>
                </td>
            </tr>
        </table>
    </div>
@endsection