@extends('layouts.layout')
@section('content')

    <section id='services' class="s-services">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <a href="{{ route('orders.create', $company->id) }}"><h3 class="subhead">crear pedido</h3></a>
            </div>
        </div> <!-- end section-header -->

        <div class="row services-list block-1-2 block-tab-full">
            @foreach($orderss as $orders)
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon">
                        <i class="icon-paint-brush"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h2">{{ $company->name }}</h3>
                        <p>
                            de {{ $company->name }}<br/>
                            para el{{ $orders->deliverDate }}<br/>
                            coste total:{{ $orders->total }}</p>
                        <div class="botonesCompañias">
                            <div>
                                {!! Form::model($company,['route' => ['orders.show' , $orders->id], 'method' => 'Get']) !!}
                                {!! Form::submit('Detalle') !!}
                                {!! Form::close() !!}
                            </div>

                            @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                            <div>
                                    {!! Form::model($orders,['route' => ['orders.delete',$orders->id,$company->id], 'method' => 'Delete']) !!}
                                    {!! Form::submit('Borrar') !!}
                                    {!! Form::close() !!}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
            <div>
                <a class="boton verde abajoIzq" href="{{ route('company', $company->id) }}">Volver</a>
            </div>
        </div> <!-- end services-list -->

    </section> <!-- end s-services -->
@endsection