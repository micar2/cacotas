@extends('layouts.layout')
@section('content')

    <dic class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-3">
                    <div>{{ $article->name }}</div>
                    <div>{{ $article->price }}</div>
                    <div>{{ $article->description }}</div>
                    <div>{{ $article->stock }}</div>
                    {!! Form::model($article,['route' => ['ordersArticles.store', $article->id, $ordersId], 'method' => 'Post']) !!}
                    {{--{!! Form::model($company,['route' => ['company.change',$company->id], 'method' => 'Post']) !!}--}}

                    @include('forms.ordersArticles')

                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                    <div><a href=""></a></div>
                </div>
            @endforeach
        </div>
    </dic>

    @endsection