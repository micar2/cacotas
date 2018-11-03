@extends('layouts.layout')
@section('content')

    {!! Form::open(['route' => ['orders.store', $companyId], 'method' => 'Post']) !!}

    @include('forms.orders')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
@endsection