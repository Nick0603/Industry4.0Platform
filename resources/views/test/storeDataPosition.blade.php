@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">

            <h1>座標測試</h1>
            {{ Form::open(array('url' => 'data/machines/'.$position->id))}}

            <div class="form-group row">
                <div class="col-md-3">
                {{Form::label('m_x', 'mechine_x：',['class' => 'label label-default'])}}
                </div>
                {{Form::text('m_x', $position->m_x)}}
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                {{Form::label('m_y', 'mechine_y：',['class' => 'label label-default'])}}
                </div>
                {{Form::text('m_y', $position->m_y)}}
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                {{Form::label('m_z', 'mechine_z：',['class' => 'label label-default'])}}
                </div>
                {{Form::text('m_z', $position->m_z)}}
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                {{Form::label('abs_x', 'absolute_x：',['class' => 'label label-default'])}}
                </div>
                {{Form::text('abs_x', $position->abs_x)}}
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                {{Form::label('abs_y', 'absolute_y：',['class' => 'label label-default'])}}
                </div>
                {{Form::text('abs_y', $position->abs_y)}}
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                {{Form::label('abs_z', 'absolute_z：',['class' => 'label label-default'])}}
                </div>
                {{Form::text('abs_z', $position->abs_z)}}
            </div>

            <div class="form-group row">
                <div class="col-md-2 col-md-offset-5">
                    {{Form::submit('更新',['class' => 'btn btn-primary'])}}<br>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
