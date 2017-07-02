@extends('layouts.crud')

@section('content')

<h2 class="page-header">{{ ucfirst('pokemons') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('pokemons') }}
    </div>

    <div class="panel-body">
        @if(!$model->isEmpty())
        <div class="">
            <table class="table table-striped" id="tbl-datatable">
              <thead>
                <tr>
                                    <th>Id</th>
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
              @foreach($model as $obj)
                <tr>
                                        <td>{{ $obj->id }}</td>
                                        <td>{{ $obj->pokeID }}</td>
                                        <td>{{ $obj->species }}</td>
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
                          <!--<a href="{{route('pokemon.edit', [$obj->id])}}"
                             class="btn btn-warning btn-sm" role="button">
                              <i class="glyphicon glyphicon-pencil"></i>
                              Update
                          </a>
                          <a href="{{route('pokemon.destroy', [$obj->id])}}"
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
            No {{ ucfirst('pokemons') }} found.
        @endif
        <br/>
        <div>
            <!--<a href="{{url('pokemon/create')}}" class="btn btn-primary btn-sm" role="button">
                <i class="glyphicon glyphicon-plus"></i>
                Create {{ ucfirst('Pokemon') }}
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