@extends('layouts.layout')
@section('content')



    <section id="contact" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Registrarse</h3>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">

            <div class="formulario">

                <h3 class="h6">Rellene los campos</h3>
                {!! Form::open(['route' => 'register.store', 'method' => 'Post','name'=>'contactForm','class'=>'contactForm']) !!}

                <div class="form-field">
                    @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-field">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                    {!! Form::label('email', 'E-mail:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-field">
                    @if($errors->has('telephone'))
                        <div class="error">{{ $errors->first('telephone') }}</div>
                    @endif
                    {!! Form::label('telephone', 'Telefono:') !!}
                    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-field">
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                    {!! Form::label('password', 'Contraseña:') !!}
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}

                </div>
                <div class="form-field">
                    @if($errors->has('password_confirmation'))
                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                    {!! Form::label('password_confirmation', 'Confirmar Contraseña:') !!}
                    {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}

                </div>
                <br/>
                <br/>
                <div class="form-field">
                    {!! Form::submit('Guardar', ['class' => 'full-width btn--primary']) !!}

                </div>
                <div class="form-field">
                        <a href="{{ route('welcome') }}" >
                            <div class="cancelar">Cancelar</div>
                        </a>
                </div>

                {!! Form::close() !!}

                <!-- contact-warning -->
                <div class="message-warning">
                    Something went wrong. Please try again.
                </div>

                <!-- contact-success -->
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>

            </div> <!-- end contact-primary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->
    @endsection