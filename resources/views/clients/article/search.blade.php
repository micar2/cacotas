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
                        <a href="" class="btn btn-default">Cancel</a>
                    </div>

                    {!! Form::close() !!}
                    <div><a href=""></a></div>
                </div>
            @endforeach
        </div>
        @if($count>1)
            <div class="row pagination">
                <ul class="pagination" role="navigation">
                    <li class="page-item">
                        <a class="page-link" href="http://realtfc.test/ordersArticles/create/1010?page=1" rel="prev" aria-label="« Previous"><</a>                </li>
                    @for($i=1, $i<=($count/count($articles)),$i++)
                        <li class="page-item">
                            <a class="page-link" href="http://realtfc.test/ordersArticles/create/{{  }}" rel="previous" aria-label="Previous »">{{ $i }}</a>
                        </li>


                    @endfor
                    <li class="page-item">
                        <a class="page-link" href="http://realtfc.test/ordersArticles/create/1010?page=2" rel="next" aria-label="Next »">></a>
                    </li>
                </ul>
            </div>
        @endif
    </dic>

@endsection