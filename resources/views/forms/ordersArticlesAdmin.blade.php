<div class="form-group col-sm-6">
    {!! Form::label('articleId', 'Articulo:') !!}
    {!! Form::select('articleId', $articles, null) !!}
    @if($errors->has('articleId'))
        <div class="error">{{ $errors->first('articleId') }}</div>
    @endif
</div>
@if(isset($item))
<div class="form-group col-sm-6">
    Referencia:
    {{ $item->reference }}
</div>
<div class="form-group col-sm-6">
    Precio:
    {{ $item->price }}€
</div>
<div class="form-group col-sm-6">
    Stock:
    {{ $item->stock }}
</div>
<div class="form-group col-sm-6">
    Descripcion:
  {{ $item->description }}
</div>
@endif
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Cantidad:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
    @if($errors->has('number'))
        <div class="error">{{ $errors->first('number') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('prepare', 'Preparado:') !!}
    {!! Form::select('prepare', [1 => 'si', 0 => 'no'], null) !!}
    @if($errors->has('prepare'))
        <div class="error">{{ $errors->first('prepare') }}</div>
    @endif
</div>


