@extends('admin.layouts.layout')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                {!! Form::open(['route' => 'admin.users.store', 'method' => 'Post']) !!}

                @include('forms.user')

                <div class="form-group col-sm-12">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('admin.users.show') }}" class="btn btn-default">Cancel</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection