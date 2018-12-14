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
                @if(isset($failAuthenticated))
                    <h3 class="h6">{{ $failAuthenticated }}</h3>
                    @endif
                <h3 class="h6">Rellene los campos</h3>
                {!! Form::open(['route' => 'login', 'method' => 'Post','name'=>'contactForm','class'=>'contactForm']) !!}

                <div class="form-field">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                    {!! Form::label('email', 'E-mail:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}

                </div>

                <div class="form-field">
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                    {!! Form::label('password', 'Contraseña:') !!}
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}

                </div>
                <br/>
                <br/>
                <div class="form-field">
                    {!! Form::submit('Entrar', ['class' => 'full-width btn--primary']) !!}

                </div>
                <div class="form-field">
                    <a href="{{ route('login') }}" >
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