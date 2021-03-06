@extends('layouts.app')

@section('content')

<h2 class="page-header">Type</h2>

<div class="btn-group" role="group">
    <a href="{{url('types/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('types') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        Create Type    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'types', 'class' => 'form-horizontal']) !!}

        {{ csrf_field() }}

        @include('types._form')

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