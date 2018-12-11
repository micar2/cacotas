@extends('admin.layouts.layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
    {!! Form::model($item,['route' => ['admin.users.update',$item->id], 'method' => 'Patch']) !!}

    @include('forms.user')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ htmlspecialchars($_SERVER['HTTP_REFERER']) }}" class="btn btn-default">Cancelar</a>
    </div>

    {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection