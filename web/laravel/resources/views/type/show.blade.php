@extends('layouts.app')

@section('content')

<h2 class="page-header">Type</h2>

<div class="btn-group" role="group">
    <a href="{{url('type/')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-th-list"></i>
        List of {{ ucfirst('types') }}
    </a>
    <!--<a href="{{url('type/create')}}" class="btn btn-primary btn-sm" role="button">
        <i class="glyphicon glyphicon-plus"></i>
        Create {{ ucfirst('Type') }}
    </a>
    <a href="{{route('type.edit', [$model->id])}}" class="btn btn-warning btn-sm" role="button">
        <i class="glyphicon glyphicon-pencil"></i>
        Update {{ ucfirst('Type') }}
    </a>
    <a href="{{route('type.destroy', [$model->id])}}" class="btn btn-danger btn-sm" role="button"
       onclick="return doDelete({!! $model->id !!})">
        <i class="glyphicon glyphicon-remove"></i>
        Delete {{ ucfirst('Type') }}
    </a>-->
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