@extends('layouts.crud')

@section('content')

<h2 class="page-header">{{ ucfirst('types') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('types') }}
    </div>

    <div class="panel-body">
        @if(!$model->isEmpty())
        <div class="">
            <table class="table table-striped" id="tbl-datatable">
              <thead>
                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th style="width:200px"></th>
                </tr>
              </thead>
              <tbody>
              @foreach($model as $obj)
                <tr>
                                        <td>{{ $obj->id }}</td>
                                        <td>{{ $obj->name }}</td>
                                        <td>
                        <div class="btn-group" role="group">
                          <a href="{{route('type.show', [$obj->id])}}"
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
            No {{ ucfirst('types') }} found.
        @endif
        <br/>
    </div>
</div>

@endsection