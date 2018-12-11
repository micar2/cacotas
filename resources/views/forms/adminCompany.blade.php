<div class="form-group col-sm-6">
    {!! Form::label('id', 'Identificador:') !!}
    {!! Form::text('id', null, ['readonly'=>'readonly','class' => 'form-control']) !!}
    @if($errors->has('id'))
        <div class="error">{{ $errors->first('id') }}</div>
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('userId', 'Pertenece a:') !!}
    {!! Form::select('userId',$users, null, ['class' => 'form-control']) !!}
    @if($errors->has('userId'))
        <div class="error">{{ $errors->first('userId') }}</div>
    @endif
</div>