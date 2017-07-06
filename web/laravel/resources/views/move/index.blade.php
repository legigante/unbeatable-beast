@extends('layouts.crud')

@section('content')

<h2 class="page-header">{{ ucfirst('move') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('move') }}
    </div>

    <div class="panel-body">
        @if(!$model->isEmpty())
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
              @foreach($model as $obj)
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
            <div>
                {!! $model->render() !!}
            </div>
        </div>
        @else
            No {{ ucfirst('move') }} found.
        @endif
        <br/>
    </div>
</div>

@endsection