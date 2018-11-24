

<div class="form-group col-sm-6">
    {!! Form::label('companyId', 'Id de compañia:') !!}
    {!! Form::text('companyId', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('deliverDate', 'Fecha de entrega:') !!}
    {!! Form::text('deliverDate', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Coste:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('charged', 'Cobrado:') !!}
    {!! Form::select('charged', [1 => 'si', 0 => 'no'], null) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('open', 'Pedido abierto:') !!}
    {!! Form::select('open', [1 => 'si', 0 => 'no'], null) !!}
</div>

