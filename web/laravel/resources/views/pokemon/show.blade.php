@extends('layouts.app')

@section('content')

<h2 class="page-header">Pokemon</h2>

<div class="btn-group" role="group">
    <a href="{{url('pokemon/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('pokemons') }}
    </a>
    <!--<a href="{{url('pokemon/create')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-plus"></i>
        Create {{ ucfirst('Pokemon') }}
    </a>
    <a href="{{route('pokemon.edit', [$model->id])}}" class="btn btn-warning btn-sm" role="button">
        <i class="glyphicon glyphicon-pencil"></i>
        Update {{ ucfirst('Pokemon') }}
    </a>
    <a href="{{route('pokemon.destroy', [$model->id])}}" class="btn btn-danger btn-sm" role="button"
       onclick="return doDelete({!! $model->id !!})">
        <i class="glyphicon glyphicon-remove"></i>
        Delete {{ ucfirst('Pokemon') }}
    </a>-->
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        View Pokemon    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'pokemon', 'class' => 'form-horizontal']) !!}

                
        <div class="form-group">
            {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                    {!! Form::text('id', $model->id, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('pokeID', 'PokeID:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('pokeID', $model->pokeID, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('species', 'Species:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('species', $model->species, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('description', $model->description, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('height', 'Height:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                                                                                    {!! Form::text('height', $model->height, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('weight', 'Weight:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                                                                                    {!! Form::text('weight', $model->weight, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('baseHP', 'BaseHP:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('baseHP', $model->baseHP, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('baseATT', 'BaseATT:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('baseATT', $model->baseATT, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('baseDEF', 'BaseDEF:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('baseDEF', $model->baseDEF, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('baseSPC', 'BaseSPC:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('baseSPC', $model->baseSPC, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('baseSPE', 'BaseSPE:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::number('baseSPE', $model->baseSPE, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
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
                url: '{{ url('/pokemon') }}/' + id,
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