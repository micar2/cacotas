
<div class="form-field">
    {!! Form::label('deliverDate', 'Fecha de entrega:') !!}
    {!! Form::text('deliverDate', null, ['class' => 'form-control','placeholder'=>'00-00-0000']) !!}
    @if($errors->has('deliverDate'))
        <div class="error">{{ $errors->first('deliverDate') }}</div>
    @endif
</div>





