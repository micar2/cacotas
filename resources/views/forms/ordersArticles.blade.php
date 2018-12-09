
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Cantidad:') !!}
    {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'en kg']) !!}
    @if($errors->has('number'))
        <div class="error">{{ $errors->first('number') }}</div>
    @endif
</div>
