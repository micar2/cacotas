@extends('admin.layouts.layout')
@section('content')

@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('scripts')
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection

    {!! Form::open(['route' => 'admin.companies.store', 'method' => 'Post']) !!}
        <div class="form-group col-sm-6">
            {!! Form::label('userId', 'Usuario:') !!}
            {!! Form::select('userId', $users, null) !!}
        </div>
    @include('forms.company')

    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('company') }}" class="btn btn-default">Cancel</a>
    </div>

    {!! Form::close() !!}

@endsection