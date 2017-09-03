@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Operations</h1>

        <table class="table table-striped">
            <tr>
                <th>Description</th>
                <th>Type</th>
                <th style="text-align: right">Amount</th>
            </tr>
            @foreach($operations as $operation)
                <tr>
                    <td>{{ $operation->description }}</td>
                    <td>{{ $operation->type }}</td>
                    <td style="text-align: right">{{ $operation->amount }}</td>
                </tr>
            @endforeach
            <tr>
                <td><strong>Total: </strong></td>
                <td colspan="2" style="text-align: right">
                    <strong>{{ number_format($operations->sum('amount'), 2) }}</strong>
                </td>
            </tr>
        </table>
    </div>
@endsection