@extends('layouts.crud')

@section('content')

<h2 class="page-header">{{ ucfirst('users') }}</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        List of {{ ucfirst('users') }}
    </div>

    <div class="panel-body">
        <div class="">
            <table class="table table-striped" id="tbl-datatable">
              <thead>
                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
									<th>Rank</th>
									<th>Qualifier</th>
									<th>Admin</th>
                                    <th style="width:200px"></th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $obj)
                <tr>
                                        <td>{{ $obj->id }}</td>
                                        <td>{{ $obj->name }}</td>
										<td>{{ $obj->rank }}</td>
										<td>{{ $obj->qualifier }}</td>
										<td>{{ $obj->admin }}</td>
                                        <td>
                        <div class="btn-group" role="group">
                          <a href="{{ route('users::show', $obj->id) }}"
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
        <br/>
    </div>
</div>

@endsection