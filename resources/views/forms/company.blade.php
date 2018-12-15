

    <div class="form-field">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-field">
        {!! Form::label('email', 'E-mail:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div class="form-field">
        {!! Form::label('telephone', 'Telefono:') !!}
        {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
        @if($errors->has('telephone'))
            <div class="error">{{ $errors->first('telephone') }}</div>
        @endif
    </div>
    <div class="form-field">
        {!! Form::label('address', 'Dirección:') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        @if($errors->has('address'))
            <div class="error">{{ $errors->first('address') }}</div>
        @endif
    </div>
    <div class="form-field">
        {!! Form::label('schedule', 'Horario de recepción:') !!}
        {!! Form::text('schedule', null, ['class' => 'form-control']) !!}
        @if($errors->has('schedule'))
            <div class="error">{{ $errors->first('schedule') }}</div>
        @endif
    </div>

