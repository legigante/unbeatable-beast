@extends('layouts.crud')

@section('content')

<h2 class="page-header">Move</h2>

<div class="btn-group" role="group">
    <a href="{{url('move/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('move') }}
    </a>
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
            {!! Form::label('type', 'Type:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::text('type', $type->name, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
			<div class="btn-group" role="group">
			  <a href="{{route('type.show', [$type->id])}}" class="btn btn-info btn-sm" role="button">
				  <i class="glyphicon glyphicon-zoom-in"></i>
				  Details
			  </a>
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
                                                    {!! Form::textarea('description', $model->description, ['class' => 'form-control', 'readonly' => 'readonly', 'size' => '30x2'])!!}
                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('pp', 'Pp:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::text('pp', $model->pp, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('power', 'Power:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::text('power', $model->power, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('accuracy', 'Accuracy:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::text('accuracy', $model->accuracy, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('effectProbability', 'EffectProbability:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                                    {!! Form::text('effectProbability', $model->effectProbability, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                
            </div>
        </div>
        
        
        {!! Form::close() !!}
		
		<h2>Pokemons</h2>
        <div class="">
            <table class="table table-striped" id="tbl-datatable">
              <thead>
                <tr>
                                    <th>PokeID</th>
                                    <th>Species</th>
									<th>Level</th>
                                    <th>Description</th>
                                    <th>Height</th>
                                    <th>Weight</th>
                                    <th>BaseHP</th>
                                    <th>BaseATT</th>
                                    <th>BaseDEF</th>
                                    <th>BaseSPC</th>
                                    <th>BaseSPE</th>
                                    <th style="width:200px"></th>
                </tr>
              </thead>
              <tbody>
              @foreach($pokemons as $obj)
                <tr>
                                        <td>{{ $obj->pokeID }}<img style="display: inline; margin-left: 5px; height: 30px;" src="/img/pokemon/{{ $obj->id }}.png"></td>
                                        <td><a href="{{route('pokemon.show', [$obj->id])}}">{{ $obj->species }}</a></td>
										<td>{{ $obj->pivot->level }}</td>
                                        <td>{{ $obj->description }}</td>
                                        <td>{{ $obj->height }}</td>
                                        <td>{{ $obj->weight }}</td>
                                        <td>{{ $obj->baseHP }}</td>
                                        <td>{{ $obj->baseATT }}</td>
                                        <td>{{ $obj->baseDEF }}</td>
                                        <td>{{ $obj->baseSPC }}</td>
                                        <td>{{ $obj->baseSPE }}</td>
                                        <td>
                        <div class="btn-group" role="group">
                          <a href="{{route('pokemon.show', [$obj->id])}}"
                             class="btn btn-info btn-sm" role="button">
                              <i class="glyphicon glyphicon-zoom-in"></i>
                              Details
                          </a>
                        </div>
                    </td>
                </tr>
              @endforeach
              </tbody>
            </table>
        </div>

    </div>
</div>

@endsection