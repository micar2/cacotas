@extends('layouts.layout')
@section('content')

    {!! Form::open(['route' => 'company.store', 'method' => 'Post']) !!}

    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

   @include('forms.company')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('company') }}" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
@endsection