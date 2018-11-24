@extends('admin.layouts.layout')
@section('content')

    {!! Form::model($item,['route' => ['admin.companies.update',$item->id], 'method' => 'Post']) !!}

    @include('forms.ordersArticlesAdmin')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="" class="btn btn-default">Cancelar</a>
    </div>

    {!! Form::close() !!}

    @endsection