@extends('layouts.app')

@section('content')

<h2 class="page-header">Move</h2>

<div class="btn-group" role="group">
    <a href="{{url('move/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('move') }}
    </a>
    <!--<a href="{{url('move/create')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-plus"></i>
        Create {{ ucfirst('Move') }}
    </a>
    <a href="{{route('move.edit', [$model->id])}}" class="btn btn-warning btn-sm" role="button">
        <i class="glyphicon glyphicon-pencil"></i>
        Update {{ ucfirst('Move') }}
    </a>
    <a href="{{route('move.destroy', [$model->id])}}" class="btn btn-danger btn-sm" role="button"
       onclick="return doDelete({!! $model->id !!})">
        <i class="glyphicon glyphicon-remove"></i>
        Delete {{ ucfirst('Move') }}
    </a>-->
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        View Move    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'moves', 'class' => 'form-horizontal']) !!}

                
        <div class="form-group">
            {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                    {!! Form::text('id', $model->id, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('typeID', 'TypeID:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('typeID', $model->typeID, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('name', $model->name, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('description', $model->description, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('pp', 'Pp:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('pp', $model->pp, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('power', 'Power:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('power', $model->power, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('accuracy', 'Accuracy:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('accuracy', $model->accuracy, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('effectProbability', 'EffectProbability:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('effectProbability', $model->effectProbability, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
        
        {!! Form::close() !!}

    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    function doDelete(id) {
        if(confirm('Do you really want to delete this record?')) {
            $.ajax({
                url: '{{ url('/moves') }}/' + id,
                type: 'DELETE',
                success: function() {
                    window.location.reload();
                },
                error: function() {
                    alert('Woops! Something went wrong. Internal error.');
                }
            });
        }
        return false;
    }
</script>

@endsection