<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telefono:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('rol', 'Rol:') !!}
    {!! Form::select('rol', ['admin' => 'Administrador', 'client' => 'Cliente'], null) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('passwordR', 'Confirmar Contraseña:') !!}
    {!! Form::password('passwordR', null, ['class' => 'form-control']) !!}
</div>