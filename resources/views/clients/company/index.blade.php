@extends('layouts.layout')
@section('content')
    <section id='services' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <a href="{{ route('company.create') }}"><h3 class="subhead">crear empresa</h3></a>
            </div>
        </div> <!-- end section-header -->

        <div class="row services-list block-1-2 block-tab-full">
            @foreach($companies as $company)
            <div class="col-block service-item" data-aos="fade-up">
                <div class="service-icon">
                    <i class="icon-paint-brush"></i>
                </div>
                <div class="service-text">
                    <h3 class="h2">{{ $company->name }}</h3>
                    <p>
                        tlf:{{ $company->telephone }}<br/>
                        acumulado:{{ $company->debt }}€<br/>
                        email:{{ $company->email }}</p>
                        <div class="botonesCompañias">
                            {!! Form::model($company,['route' => ['orders',$company->id], 'method' => 'Get']) !!}
                            {!! Form::submit('Pedidos') !!}
                            {!! Form::close() !!}

                            {!! Form::model($company,['route' => ['company.change',$company->id], 'method' => 'Get']) !!}
                            {!! Form::submit('Modificar') !!}
                            {!! Form::close() !!}

                            {!! Form::model($company,['route' => ['company.delete',$company->id], 'method' => 'Delete']) !!}
                            {!! Form::submit('Borrar') !!}
                            {!! Form::close() !!}
                        </div>




                </div>
            </div>
            @endforeach
        </div> <!-- end services-list -->

    </section> <!-- end s-services -->
<nav>
    <a href="{{ route('company.create') }}">crear empresa</a>
</nav>
<div class="container">
    <div class="row">
        @foreach($companies as $company)
            <div class="col-12 card">
                <div class="card-body">
                    <h5 class="card-title">{{ $company->name }}</h5>
                    <h5 class="card-title">{{ $company->telephone }}</h5>
                    <h5 class="card-title">acumulado:{{ $company->debt }}€</h5>
                    <h5 class="card-title">{{ $company->email }}</h5>
                    <a href="{{ route( 'orders' , $company->id ) }}">Pedidos</a>
                    <a href="{{ route( 'company.change' , $company->id ) }}">modificar</a>
                    {{--<a href="{{ route( 'company.delete' , $company->id ) }}">borrar</a>--}}
                    {!! Form::model($company,['route' => ['company.delete',$company->id], 'method' => 'Delete']) !!}
                    {!! Form::submit('Borrar') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection