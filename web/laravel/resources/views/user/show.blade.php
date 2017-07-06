@extends('layouts.crud')

@section('content')

<h2 class="page-header">User</h2>

<div class="btn-group" role="group">
    <a href="{{url('users/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('users') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        View User    </div>

    <div class="panel-body">

        {!! Form::model($user, ['url' => 'users', 'class' => 'form-horizontal']) !!}

                
        <div class="form-group">
            {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                    {!! Form::text('id', $user->id, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('rank', 'Rank:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('rank', $user->rank, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('qualifier', 'Qualifier:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('qualifier', $user->qualifier, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('admin', 'Admin:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('admin', $user->admin, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        
        
        {!! Form::close() !!}
		
    </div>
</div>

@endsection