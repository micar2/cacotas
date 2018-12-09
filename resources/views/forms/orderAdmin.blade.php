

<div class="form-group col-sm-6">
    {!! Form::label('companyId', 'Id de compañia:') !!}
    {!! Form::text('companyId', null, ['class' => 'form-control']) !!}
    @if($errors->has('companyId'))
        <div class="error">{{ $errors->first('companyId') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('deliverDate', 'Fecha de entrega:') !!}
    {!! Form::text('deliverDate', null, ['class' => 'form-control']) !!}
    @if($errors->has('deliverDate'))
        <div class="error">{{ $errors->first('deliverDate') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Coste:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
    @if($errors->has('total'))
        <div class="error">{{ $errors->first('total') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('charged', 'Cobrado:') !!}
    {!! Form::select('charged', [1 => 'si', 0 => 'no'], null) !!}
    @if($errors->has('charged'))
        <div class="error">{{ $errors->first('charged') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('open', 'Pedido abierto:') !!}
    {!! Form::select('open', [1 => 'si', 0 => 'no'], null) !!}
    @if($errors->has('open'))
        <div class="error">{{ $errors->first('open') }}</div>
    @endif
</div>

