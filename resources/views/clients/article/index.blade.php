@extends('layouts.layout')
@section('content')
@include('layouts.search')
    <dic class="container">
        <div class="row">
            @if($errors->has('number'))
                <div class="error">{{ $errors->first('number') }}</div>
            @endif
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
                    </div>

                    {!! Form::close() !!}
                    <div><a href=""></a></div>
                </div>
            @endforeach
        </div>
        {{ $articles->links() }}
    </dic>

    @endsection