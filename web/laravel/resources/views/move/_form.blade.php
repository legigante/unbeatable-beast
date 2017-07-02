
    <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
        {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                    {!! Form::text('id', null, ['id' => 'id', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                                                                    @if($errors->has('id'))
            {!! Form::label('error-id', $errors->first('id'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('typeID') ? 'has-error' : ''}}">
        {!! Form::label('typeID', 'TypeID:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('typeID', null, ['id' => 'typeID', 'class' => 'form-control']) !!}
                                                    @if($errors->has('typeID'))
            {!! Form::label('error-typeID', $errors->first('typeID'), ['class' => 'control-label has-error']) !!}
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
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        {!! Form::label('description', 'Description:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                            {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control']) !!}
                                                            @if($errors->has('description'))
            {!! Form::label('error-description', $errors->first('description'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('pp') ? 'has-error' : ''}}">
        {!! Form::label('pp', 'Pp:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('pp', null, ['id' => 'pp', 'class' => 'form-control']) !!}
                                                    @if($errors->has('pp'))
            {!! Form::label('error-pp', $errors->first('pp'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('power') ? 'has-error' : ''}}">
        {!! Form::label('power', 'Power:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('power', null, ['id' => 'power', 'class' => 'form-control']) !!}
                                                    @if($errors->has('power'))
            {!! Form::label('error-power', $errors->first('power'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('accuracy') ? 'has-error' : ''}}">
        {!! Form::label('accuracy', 'Accuracy:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('accuracy', null, ['id' => 'accuracy', 'class' => 'form-control']) !!}
                                                    @if($errors->has('accuracy'))
            {!! Form::label('error-accuracy', $errors->first('accuracy'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('effectPerCent') ? 'has-error' : ''}}">
        {!! Form::label('effectPerCent', 'EffectPerCent:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('effectPerCent', null, ['id' => 'effectPerCent', 'class' => 'form-control']) !!}
                                                    @if($errors->has('effectPerCent'))
            {!! Form::label('error-effectPerCent', $errors->first('effectPerCent'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
