@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="row">
                <div class="col-12 card">
                    <div class="card-body">
                        <h5 class="card-title">de {{ $company->name }}</h5>
                        <h5 class="card-title">para el {{ $orders->deliverDate }}</h5>

                        @if($orders->open && $orders->deliverDate > now()->format('d-m-Y'))
                            <a href="{{ route( 'orders.delete' , [$orders->id,$company->id]) }}">cancelar</a>
                        @endif

                    </div>
                </div>
            <table>

                @foreach($ordersArticles as $ordersArticle)
                <tr>
                    <td>{{ $ordersArticle->id }}</td>
                    <td>{{ $ordersArticle->name }}</td>
                    <td>pedidos{{ $ordersArticle->number }}</td>

                    @if($orders->open && $orders->deliverDate > now()->format('d-m-Y'))
                        <td>quedan{{ $articles =$ordersArticle->stock }}</td>
                    @endif

                    <td>precio:{{ $ordersArticle->price }}€</td>
                    <td>total:{{ $totalPrice = $ordersArticle->number*$ordersArticle->price }}€</td>
                    {{ now()->format('d-m-Y') }}

                    @if($orders->open && $orders->deliverDate > now()->format('d-m-Y'))
                        <td><a href="{{ route('ordersArticles.plusLess', [$ordersArticle->id,1,$orders->id,'plus' ]) }}">+</a></td>
                        <td><a href="{{ route('ordersArticles.plusLess', [$ordersArticle->id,1,$orders->id,'less' ]) }}">-</a></td>
                        <td><a href="{{ route('ordersArticles.delete', [$ordersArticle->id, $orders->id]) }}">Borrar</a></td>
                    @endif

                </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">coste total:*javascript</td>

                </tr>
                <tr>

                    @if($orders->open && $orders->deliverDate > now()->format('d-m-Y'))
                        <td><a href="{{ route('ordersArticles.create', $orders->id) }}">Agregar articulo</a></td>
                        <td><a href="{{ route('orders.update', $orders->id) }}">Guardar</a></td>
                    @endif
                        <td><a href="{{ route( 'orders' , $company->id ) }}">atras</a></td>
                </tr>
            </table>

        </div>
    </div>

@endsection