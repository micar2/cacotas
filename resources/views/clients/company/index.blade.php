@extends('layouts.layout')
@section('content')
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
                    <h5 class="card-title">{{ $company->email }}</h5>
                    <a href="{{ route( 'orders' , $company->id ) }}">Pedidos</a>
                    <a href="{{ route( 'company.change' , $company->id ) }}">modificar</a>
                    <a href="{{ route( 'company.delete' , $company->id ) }}">borrar</a>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection