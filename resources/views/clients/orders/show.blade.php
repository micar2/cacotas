@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="row" style="overflow:scroll;">
                <div class="col-12 card">
                    <div class="card-body">
                        <h5 class="card-title">de {{ $company->name }}</h5>
                        <h5 class="card-title">para el {{ Carbon\Carbon::parse($orders->deliverDate)->format('d-m-Y') }}</h5>

                        @if($orders->open && Carbon\Carbon::parse($orders->deliverDate)->format('d-m-Y') > now()->format('d-m-Y'))
                            {!! Form::model($orders,['route' => ['orders.delete',$orders->id,$company->id], 'method' => 'Delete']) !!}
                            {!! Form::submit('cancelar pedido') !!}
                            {!! Form::close() !!}
                        @endif

                    </div>
                </div>
            <table >

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


                    @if($orders->open && Carbon\Carbon::parse($orders->deliverDate)->format('d-m-Y') > now()->format('d-m-Y'))
                       <td>
                            {!! Form::model($ordersArticle,['route' => ['ordersArticles.plusLess',$ordersArticle->id,1,$orders->id,'plus'], 'method' => 'Patch']) !!}
                            {!! Form::submit('+') !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::model($ordersArticle,['route' => ['ordersArticles.plusLess',$ordersArticle->id,1,$orders->id,'less'], 'method' => 'Patch']) !!}
                            {!! Form::submit('-') !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::model($ordersArticle,['route' => ['ordersArticles.delete',$ordersArticle->id,$orders->id], 'method' => 'Delete']) !!}
                            {!! Form::submit('Borrar') !!}
                            {!! Form::close() !!}
                        </td>
                    @endif

                </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2">coste total:*javascript</td>

                </tr>
                <tr>

                    @if($orders->open && Carbon\Carbon::parse($orders->deliverDate)->format('d-m-Y') > now()->format('d-m-Y'))
                        <td><a href="{{ route('ordersArticles.create', $orders->id) }}">Agregar articulo</a></td>
                        <td>{!! Form::model($orders,['route' => ['orders.update',$orders->id], 'method' => 'Patch']) !!}
                            {!! Form::submit('Guardar') !!}
                            {!! Form::close() !!}</td>
                        @else
                        <td><a target="_blank" href="{{ action('PdfController@getGenerar',['accion'=>'ver','tipo'=>'digital','orderId'=>$orders->id]) }}">Ver Factura</a></td>
                        <td><a target="_blank" href="{{ action('PdfController@getGenerar',['accion'=>'descargar','tipo'=>'digital','orderId'=>$orders->id]) }}">Descargar Factura</a></td>
                    @endif
                        <td><a href="{{ route( 'orders' , $company->id ) }}">atras</a></td>
                </tr>
            </table>

        </div>
    </div>

@endsection