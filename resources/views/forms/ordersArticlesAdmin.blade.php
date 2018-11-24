<div class="form-group col-sm-6">
    {!! Form::label('articleId', 'Articulo:') !!}
    {!! Form::select('articleId', $articles, null) !!}
</div>

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
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Cantidad:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('prepare', 'Preparado:') !!}
    {!! Form::select('prepare', [1 => 'si', 0 => 'no'], null) !!}
</div>


