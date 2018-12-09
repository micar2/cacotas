@extends('layouts.layout')
@section('content')

    {!! Form::open(['route' => 'login', 'method' => 'Post']) !!}
    @if($errors->any())
        {{ $errors }}
    @endif
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Contraseña:') !!}
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('login') !!}" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
@endsection