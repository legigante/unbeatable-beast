@extends('layouts.crud')

@section('content')

<h2 class="page-header">Pokemon</h2>

<div class="btn-group" role="group">
    <a href="{{url('pokemon/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('pokemons') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        View Pokemon    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'pokemon', 'class' => 'form-horizontal']) !!}
		
		<img style="display: block; margin: auto;" src="/img/pokemon/{{ $model->id }}.png">

                
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
		
		@foreach ($types as $type)
			<div class="form-group">
				{!! Form::label('Type', 'Type:', ['class' => 'col-sm-3 control-label']) !!}
				<div class="col-sm-6">
					{!! Form::text('Type', $type->name, ['class' => 'form-control', 'readonly' => 'readonly'])!!}                                                                           
				</div>
					<div class="btn-group" role="group">
					  <a href="{{route('type.show', [$type->id])}}" class="btn btn-info btn-sm" role="button">
						  <i class="glyphicon glyphicon-zoom-in"></i>
						  Details
					  </a>
					 </div>
			</div>

		@endforeach
                
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
		
		<h2>Moves</h2>
		
        <div class="">
            <table class="table table-striped" id="tbl-datatable">
              <thead>
                <tr>
                                    <th>TypeID</th>
                                    <th>Name</th>
									<th>Level</th>
                                    <th>Description</th>
                                    <th>Pp</th>
                                    <th>Power</th>
                                    <th>Accuracy</th>
                                    <th>EffectProbability</th>
                                    <th style="width:200px"></th>
                </tr>
              </thead>
              <tbody>
              @foreach($moves as $obj)
                <tr>
                                        <td><a href="{{route('type.show', [$obj->typeID])}}">{{ $mapType[$obj->typeID] }}</a></td>
                                        <td><a href="{{route('move.show', [$obj->id])}}">{{ $obj->name }}</a></td>
										<td>{{ $obj->pivot->level }}</td>
                                        <td>{{ $obj->description }}</td>
                                        <td>{{ $obj->pp }}</td>
                                        <td>{{ $obj->power }}</td>
                                        <td>{{ $obj->accuracy }}</td>
                                        <td>{{ $obj->effectProbability }}</td>
                                        <td>
                        <div class="btn-group" role="group">
                          <a href="{{route('move.show', [$obj->id])}}"
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