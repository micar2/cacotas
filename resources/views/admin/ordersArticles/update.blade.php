@extends('admin.layouts.layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
        {!! Form::model($item,['route' => ['admin.ordersArticles.update',$item->id], 'method' => 'Patch']) !!}

        @include('forms.ordersArticlesAdmin')

        <div class="form-group col-sm-12">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('admin.orders.change',$item->orderId) }}" class="btn btn-default">Cancelar</a>
        </div>

        {!! Form::close() !!}
            </div>
        </div>
    </section>


    @endsection