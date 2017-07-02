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
                          <!--<a href="{{route('type.edit', [$obj->id])}}"
                             class="btn btn-warning btn-sm" role="button">
                              <i class="glyphicon glyphicon-pencil"></i>
                              Update
                          </a>
                          <a href="{{route('type.destroy', [$obj->id])}}"
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
            No {{ ucfirst('types') }} found.
        @endif
        <br/>
        <div>
            <!--<a href="{{url('types/create')}}" class="btn btn-primary btn-sm" role="button">
                <i class="glyphicon glyphicon-plus"></i>
                Create {{ ucfirst('Type') }}
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
                   url: '{{ url('/types') }}/' + id,
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