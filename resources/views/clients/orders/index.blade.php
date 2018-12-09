@extends('layouts.layout')
@section('content')

    <nav>
        <a href="{{ route('orders.create', $company->id) }}">crear pedido</a>
    </nav>
    <div class="container">
        <div class="row">
            @foreach($orderss as $orders)
                <div class="col-12 card">
                    <div class="card-body">
                        <h5 class="card-title">de {{ $company->name }}</h5>
                        <h5 class="card-title">para el{{ $orders->deliverDate }}</h5>
                        <h5 class="card-title">coste total:{{ $orders->total }}</h5>
                        <a href="{{ route( 'orders.show' , $orders->id ) }}">detalle</a>
                        @if($orders->open && $orders->deliverDate >= now()->format('d-m-Y'))
                            {!! Form::model($orders,['route' => ['orders.delete',$orders->id,$company->id], 'method' => 'Delete']) !!}
                            {!! Form::submit('Borrar') !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection