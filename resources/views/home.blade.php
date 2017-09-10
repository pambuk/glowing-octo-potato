@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!

                        <hr/>

                        <div class="links">
                            <a href="https://kanbanflow.com/board/576607c53a2598c6528e14e2d7d6023d" target="_blank">Board</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
