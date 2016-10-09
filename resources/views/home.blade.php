@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h3>Company:{{$company->name}}</h3>
                    <hr>
                    @foreach($company->machines as $machine)
                        <h2>Machine_id:{{$machine->id}}</h2>
                        <h3>Position_id:{{$machine->position->id}}</h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
