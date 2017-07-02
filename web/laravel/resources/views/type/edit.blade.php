@extends('layouts.app')

@section('content')

<h2 class="page-header">Type</h2>

<div class="btn-group" role="group">
    <a href="{{url('types/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('types') }}
    </a>
    <a href="{{url('types/edit')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-plus"></i>
        Create {{ ucfirst('Type') }}
    </a>
    <a href="{{route('types.destroy', [$model->id])}}" class="btn btn-danger btn-sm" role="button"
       onclick="return doDelete({!! $model->id !!})">
        <i class="glyphicon glyphicon-remove"></i>
        Delete {{ ucfirst('Type') }}
    </a>
</div>
<div class="clearfix"><div/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        Update Type    </div>

    <div class="panel-body">

        {!! Form::model($model, ['url' => 'types/' . $model->id , 'class' => 'form-horizontal']) !!}

        {{ csrf_field() }}

        <input type="hidden" name="_method" value="PATCH">

        @include('types._form')

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