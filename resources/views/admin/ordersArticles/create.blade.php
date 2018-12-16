@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
    {!! Form::open(['route' => ['admin.ordersArticles.store', $orderId], 'method' => 'Post']) !!}

    @include('forms.ordersArticlesAdmin')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.orders.change',$orderId) }}" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection