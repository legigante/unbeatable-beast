@extends('layouts.crud')

@section('content')

<h2 class="page-header">Type</h2>

<div class="btn-group" role="group">
    <a href="{{url('type/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('types') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        View Type    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'types', 'class' => 'form-horizontal']) !!}

                
        <div class="form-group">
            {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                    {!! Form::text('id', $model->id, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                                
            </div>
        </div>
        
                
        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6">
                                                    {!! Form::text('name', $model->name, ['class' => 'form-control', 'readonly' => 'readonly'])!!}
                                                                                                
            </div>
        </div>
        
        
        {!! Form::close() !!}
		
		<h2>Moves</h2>
		
        <div class="">
            <table class="table table-striped" id="tbl-datatable">
              <thead>
                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
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
		
		<h2>Pokemons</h2>
        <div class="">
            <table class="table table-striped" id="tbl-datatable2">
              <thead>
                <tr>
                                    <th>PokeID</th>
                                    <th>Species</th>
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
                                        <td>{{ $obj->pokeID }}</td>
                                        <td><a href="{{route('pokemon.show', [$obj->id])}}">{{ $obj->species }}</a></td>
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