

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('reference', 'Referencia:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control']) !!}
    @if($errors->has('reference'))
        <div class="error">{{ $errors->first('reference') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Precio:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
    @if($errors->has('price'))
        <div class="error">{{ $errors->first('price') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::text('stock', null, ['class' => 'form-control']) !!}
    @if($errors->has('stock'))
        <div class="error">{{ $errors->first('stock') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    @if($errors->has('description'))
        <div class="error">{{ $errors->first('description') }}</div>
    @endif
</div>

