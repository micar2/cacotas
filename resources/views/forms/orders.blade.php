
<div class="form-group col-sm-6">
    {!! Form::label('deliverDate', 'Fecha de entrega:') !!}
    {!! Form::text('deliverDate', null, ['class' => 'form-control']) !!}
    @if($errors->has('deliverDate'))
        <div class="error">{{ $errors->first('deliverDate') }}</div>
    @endif
</div>





