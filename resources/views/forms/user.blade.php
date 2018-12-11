<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @if($errors->has('email'))
        <div class="error">{{ $errors->first('email') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telefono:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
    @if($errors->has('telephone'))
        <div class="error">{{ $errors->first('telephone') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('rol', 'Rol:') !!}
    {!! Form::select('rol', ['admin' => 'Administrador', 'client' => 'Cliente'], null) !!}
    @if($errors->has('rol'))
        <div class="error">{{ $errors->first('rol') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
    @if($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
    @endif
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}
    {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
    @if($errors->has('password_confirmation'))
        <div class="error">{{ $errors->first('passwordR') }}</div>
    @endif
</div>