
    <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
        {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                    {!! Form::text('id', null, ['id' => 'id', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                                                                    @if($errors->has('id'))
            {!! Form::label('error-id', $errors->first('id'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
                                                            @if($errors->has('name'))
            {!! Form::label('error-name', $errors->first('name'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
