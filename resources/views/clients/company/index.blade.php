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
                            <div>
                                {!! Form::model($company,['route' => ['orders',$company->id], 'method' => 'Get']) !!}
                                {!! Form::submit('Pedidos') !!}
                                {!! Form::close() !!}
                            </div>

                            <div>
                                {!! Form::model($company,['route' => ['company.change',$company->id], 'method' => 'Get']) !!}
                                {!! Form::submit('Modificar') !!}
                                {!! Form::close() !!}
                            </div>

                            <div>
                                {!! Form::model($company,['route' => ['company.delete',$company->id], 'method' => 'Delete']) !!}
                                {!! Form::submit('Borrar') !!}
                                {!! Form::close() !!}
                            </div>

                        </div>
                </div>
            </div>
            @endforeach
            <div>
                <a class="boton verde abajoIzq" href="{{ route('welcome') }}">Volver</a>
            </div>
        </div> <!-- end services-list -->

    </section> <!-- end s-services -->


@endsection