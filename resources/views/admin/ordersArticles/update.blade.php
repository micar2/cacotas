@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="row">
        {!! Form::model($item,['route' => ['admin.ordersArticles.update',$item->id], 'method' => 'Patch']) !!}

        @include('forms.ordersArticlesAdmin')

        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="" class="btn btn-default">Cancelar</a>
        </div>

        {!! Form::close() !!}
        </div>
    </section>


    @endsection