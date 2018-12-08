@extends('layouts.layout')
@section('content')
    @include('layouts.search')
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
                        <a href="{{ htmlspecialchars($_SERVER['HTTP_REFERER']) }}" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                    <div><a href=""></a></div>
                </div>
            @endforeach
        </div>
        @if($count>1)
            <div class="row pagination">
                <ul class="pagination" role="navigation">
                    {!! Form::open(['route' => ['search', $ordersId,$page-1], 'method' => 'Post']) !!}
                    {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                    {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                    {!! Form::submit('<') !!}
                    {!! Form::close() !!}
                    @for($i=1; $i<=($count/count($articles));$i++)
                        @if($i==$page)
                            {!! Form::open(['route' => ['search', $ordersId,$i], 'method' => 'Post']) !!}
                            {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                            {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                            {!! Form::submit($i) !!}
                            {!! Form::close() !!}
                         @else
                            {!! Form::open(['route' => ['search', $ordersId,$i], 'method' => 'Post']) !!}
                            {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                            {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                            {!! Form::submit($i) !!}
                            {!! Form::close() !!}
                        @endif
                    @endfor
                    {!! Form::open(['route' => ['search', $ordersId,$page+1], 'method' => 'Post']) !!}
                    {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                    {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                    {!! Form::submit('>') !!}
                    {!! Form::close() !!}
                </ul>
            </div>
        @endif

    </dic>

    @endsection

