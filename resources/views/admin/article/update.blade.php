@extends('admin.layouts.layout')
@section('content')

    {!! Form::model($item,['route' => ['admin.companies.update',$item->id], 'method' => 'Patch']) !!}

    @include('forms.article')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ htmlspecialchars($_SERVER['HTTP_REFERER']) }}" class="btn btn-default">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection