@extends('layouts.layout')
@section('content')
    @include('layouts.search')
    <section id='services' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                @if($articles)
                <h1 class="display-2">Estos son los articulos seleccionados</h1>
                @else
                <h1 class="display-2">No se han encontrado articulos con esas caracteristicas</h1>
                    @endif
            </div>
            @if($errors->has('number'))
                <div align="center" class="error col-full">{{ $errors->first('number') }}</div>
            @endif
        </div> <!-- end section-header -->

        <div class="row services-list block-1-2 block-tab-full">
            @if($articles)
            @foreach($articles as $article)
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon">
                        <i class="icon-paint-brush"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h2">{{ $article->name }}</h3>
                        <p>{{ $article->description }}<br/>
                            Precio:{{ $article->price }}€<br/>
                            Disponibilidad:{{ $article->stock }}Kg<br/>
                        {!! Form::model($article,['route' => ['ordersArticles.store', $article->id, $ordersId], 'method' => 'Post']) !!}
                        {{--{!! Form::model($company,['route' => ['company.change',$company->id], 'method' => 'Post']) !!}--}}

                        @include('forms.ordersArticles')

                        <div class="form-group col-sm-12">
                            {!! Form::submit('Guardar', ['class' => 'boton articulo']) !!}
                        </div>

                        {!! Form::close() !!}</p>
                    </div>
                </div>
            @endforeach
                @endif
        </div> <!-- end services-list -->
        @if($count>1)
            <div class="row pagination">
                <ul class="pagination" role="navigation">
                    @include('forms.search')
                </ul>
            </div>
        @endif
    </section> <!-- end s-services -->



    @endsection

