@extends('layouts.app')

@section('content')

<h2 class="page-header">Move</h2>

<div class="btn-group" role="group">
    <a href="{{url('moves/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('move') }}
    </a>
    <a href="{{url('moves/edit')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-plus"></i>
        Create {{ ucfirst('Move') }}
    </a>
    <a href="{{route('moves.destroy', [$model->id])}}" class="btn btn-danger btn-sm" role="button"
       onclick="return doDelete({!! $model->id !!})">
        <i class="glyphicon glyphicon-remove"></i>
        Delete {{ ucfirst('Move') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        Update Move    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'moves/' . $model->id , 'class' => 'form-horizontal']) !!}

        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PATCH">

        @include('move._form')

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-success">
                    <i class="glyphicon glyphicon-ok"></i>
                    Update
                </button>
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