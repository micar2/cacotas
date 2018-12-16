@extends('layouts.layout')
@section('content')
    <?php $cacota=0 ?>
    <section id='about' class="s-aboutc">
        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h2 class="display-1 display-1--light">Pedido</h2>
            </div>
        </div> <!-- end section-header -->
        <div class="row espacioabajo">

            <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">

                <div class="col-block stats__col ">
                    <h5>DE: {{ $company->name }}</h5>
                </div>
                <div class="col-block stats__col">
                    <h5>PARA EL: {{ Carbon\Carbon::parse($orders->deliverDate)->format('d-m-Y') }}</h5>
                </div>
                <div class="col-block stats__col" >
                    <h5 style="margin-top: 0px!important;">
                        @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                            {!! Form::model($orders,['route' => ['orders.delete',$orders->id,$company->id], 'method' => 'Delete']) !!}
                            {!! Form::submit('cancelar pedido') !!}
                            {!! Form::close() !!}
                        @endif
                    </h5>
                </div>


            </div> <!-- end about-stats -->

            <table align="center" class="table-responsive">
                <tr bgcolor="#708090">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PEDIDOS</th>
                    @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                        <th>STOCK</th>
                    @endif
                    <th>PRECIO</th>
                    <th>TOTAL</th>
                    <th>MODIFICAR</th>
                </tr>
                @foreach($ordersArticles as $ordersArticle)
                    <?php $cacota += ($totalPrice = $ordersArticle->number*$ordersArticle->price) ?>
                <tr>
                    <td>{{ $ordersArticle->id }}</td>
                    <td>{{ $ordersArticle->name }}</td>
                    <td>{{ $ordersArticle->number }}</td>

                    @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                        <td>{{ $articles =$ordersArticle->stock }}</td>
                    @endif

                    <td>{{ $ordersArticle->price }} €</td>
                    <td>{{ $totalPrice = $ordersArticle->number*$ordersArticle->price }} €</td>


                    @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                       <td class="botonesCompañias">

                           <div>
                               {!! Form::model($ordersArticle,['route' => ['ordersArticles.plusLess',$ordersArticle->id,1,$orders->id,'plus'], 'method' => 'Patch']) !!}
                               {!! Form::submit('+') !!}
                               {!! Form::close() !!}
                           </div>

                        <div>
                            {!! Form::model($ordersArticle,['route' => ['ordersArticles.plusLess',$ordersArticle->id,1,$orders->id,'less'], 'method' => 'Patch']) !!}
                            {!! Form::submit('-') !!}
                            {!! Form::close() !!}
                        </div>

                        <div>
                            {!! Form::model($ordersArticle,['route' => ['ordersArticles.delete',$ordersArticle->id,$orders->id], 'method' => 'Delete']) !!}
                            {!! Form::submit('Borrar') !!}
                            {!! Form::close() !!}
                        </div>

                        </td>
                        @else
                        <td>
                            <strong>--</strong>
                        </td>
                    @endif

                </tr>
                @endforeach
                <tr>
                    @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                        <td>&nbsp;</td>
                    @endif
                    <td colspan="4"></td>
                    <th bgcolor="#708090">COSTE TOTAL:</th>
                    <th bgcolor="#708090">{{ $cacota }} €</th>

                </tr>
                <tr>

                    @if($orders->open && Carbon\Carbon::createFromFormat('d-m-Y', $orders->deliverDate)>= Carbon\Carbon::now())
                        <td>
                            {!! Form::model($orders,['route' => ['ordersArticles.create', $orders->id], 'method' => 'Get']) !!}
                            {!! Form::submit('Agregar articulo') !!}
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::model($orders,['route' => ['orders.update',$orders->id], 'method' => 'Patch']) !!}
                            {!! Form::submit('Guardar') !!}
                            {!! Form::close() !!}
                        </td>
                        @else
                        <td><a class="boton verde" target="_blank" href="{{ action('PdfController@getGenerar',['accion'=>'ver','tipo'=>'digital','orderId'=>$orders->id]) }}">Ver Factura</a></td>
                        <td><a class="boton verde" target="_blank" href="{{ action('PdfController@getGenerar',['accion'=>'descargar','tipo'=>'digital','orderId'=>$orders->id]) }}">Descargar Factura</a></td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
        <div>
            <a class="boton verde abajoIzq" href="{{ route('company', $company->id) }}">Volver</a>
        </div>
    </section>

@endsection