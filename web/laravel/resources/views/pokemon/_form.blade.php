
    <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
        {!! Form::label('id', 'Id:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                    {!! Form::text('id', null, ['id' => 'id', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                                                                    @if($errors->has('id'))
            {!! Form::label('error-id', $errors->first('id'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('num') ? 'has-error' : ''}}">
        {!! Form::label('num', 'Num:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('num', null, ['id' => 'num', 'class' => 'form-control']) !!}
                                                    @if($errors->has('num'))
            {!! Form::label('error-num', $errors->first('num'), ['class' => 'control-label has-error']) !!}
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
    <div class="form-group {{ $errors->has('height') ? 'has-error' : ''}}">
        {!! Form::label('height', 'Height:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                                                    {!! Form::text('height', null, ['id' => 'height', 'class' => 'form-control']) !!}
                    @if($errors->has('height'))
            {!! Form::label('error-height', $errors->first('height'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
        {!! Form::label('weight', 'Weight:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                                                    {!! Form::text('weight', null, ['id' => 'weight', 'class' => 'form-control']) !!}
                    @if($errors->has('weight'))
            {!! Form::label('error-weight', $errors->first('weight'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('baseHP') ? 'has-error' : ''}}">
        {!! Form::label('baseHP', 'BaseHP:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('baseHP', null, ['id' => 'baseHP', 'class' => 'form-control']) !!}
                                                    @if($errors->has('baseHP'))
            {!! Form::label('error-baseHP', $errors->first('baseHP'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('baseATT') ? 'has-error' : ''}}">
        {!! Form::label('baseATT', 'BaseATT:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('baseATT', null, ['id' => 'baseATT', 'class' => 'form-control']) !!}
                                                    @if($errors->has('baseATT'))
            {!! Form::label('error-baseATT', $errors->first('baseATT'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('baseDEF') ? 'has-error' : ''}}">
        {!! Form::label('baseDEF', 'BaseDEF:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('baseDEF', null, ['id' => 'baseDEF', 'class' => 'form-control']) !!}
                                                    @if($errors->has('baseDEF'))
            {!! Form::label('error-baseDEF', $errors->first('baseDEF'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('baseSPE') ? 'has-error' : ''}}">
        {!! Form::label('baseSPE', 'BaseSPE:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('baseSPE', null, ['id' => 'baseSPE', 'class' => 'form-control']) !!}
                                                    @if($errors->has('baseSPE'))
            {!! Form::label('error-baseSPE', $errors->first('baseSPE'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('baseVIT') ? 'has-error' : ''}}">
        {!! Form::label('baseVIT', 'BaseVIT:', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
                                    {!! Form::number('baseVIT', null, ['id' => 'baseVIT', 'class' => 'form-control']) !!}
                                                    @if($errors->has('baseVIT'))
            {!! Form::label('error-baseVIT', $errors->first('baseVIT'), ['class' => 'control-label has-error']) !!}
            @endif
        </div>
    </div>
