@extends('admin.layouts.layout')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
    {!! Form::open(['route' => 'admin.companies.store', 'method' => 'Post']) !!}
        <div class="form-group col-sm-6">
            {!! Form::label('userId', 'Usuario:') !!}
            {!! Form::select('userId', $users, null) !!}
        </div>
    @include('forms.company')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.companies.show') }}" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}
        </div>
    </div>
</section>

@endsection