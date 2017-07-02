@extends('layouts.app')

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
                                    <th>Id</th>
                                    <th>TypeID</th>
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
                                        <td>{{ $obj->id }}</td>
                                        <td>{{ $obj->typeID }}</td>
                                        <td>{{ $obj->name }}</td>
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
                          <!--<a href="{{route('move.edit', [$obj->id])}}"
                             class="btn btn-warning btn-sm" role="button">
                              <i class="glyphicon glyphicon-pencil"></i>
                              Update
                          </a>
                          <a href="{{route('move.destroy', [$obj->id])}}"
                             class="btn btn-danger btn-sm" role="button"
                             onclick="return doDelete({!! $obj->id !!})">
                              <i class="glyphicon glyphicon-remove"></i>
                              Delete
                          </a>-->
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
        <div>
            <!--<a href="{{url('moves/create')}}" class="btn btn-primary btn-sm" role="button">
                <i class="glyphicon glyphicon-plus"></i>
                Create {{ ucfirst('Move') }}
            </a>-->
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            table = $('#tbl-datatable').DataTable({
                "processing": true,
                "ordering": true,
                "responsive": true,
                "paging": false
            });
        });

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