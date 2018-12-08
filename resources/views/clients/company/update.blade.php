@extends('layouts.layout')
@section('content')

    {!! Form::model($company,['route' => ['company.update',$company->id], 'method' => 'Post']) !!}

    @include('forms.company')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ htmlspecialchars($_SERVER['HTTP_REFERER']) }}" class="btn btn-default">Cancelar</a>
    </div>

    {!! Form::close() !!}
@endsection