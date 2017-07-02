@extends('layouts.app')

@section('content')

<h2 class="page-header">Move</h2>

<div class="btn-group" role="group">
    <a href="{{url('moves/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('move') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        Create Move    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'moves', 'class' => 'form-horizontal']) !!}

        {{ csrf_field() }}

        @include('move._form')

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success">
                    <i class="glyphicon glyphicon-ok"></i>
                    Save
                </button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection