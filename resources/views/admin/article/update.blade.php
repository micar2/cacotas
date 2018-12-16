@extends('admin.layouts.layout')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
    {!! Form::model($item,['route' => ['admin.articles.update',$item->id], 'method' => 'Patch']) !!}

    @include('forms.article')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.articles.show') }}" class="btn btn-default">Cancelar</a>
    </div>

    {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection