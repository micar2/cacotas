@extends('layouts.layout')
@section('content')
    <section id="contact" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Crear pedido</h3>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">

            <div class="formulario">

                <h3 class="h6">Rellene los campos</h3>
                {!! Form::open(['route' => ['orders.store', $companyId], 'method' => 'Post']) !!}

                @include('forms.orders')

                <br/>
                <br/>
                <div class="form-field">
                    {!! Form::submit('Guardar', ['class' => 'full-width btn--primary']) !!}
                </div>
                <div class="form-field">
                    <a href="{{ route('orders',$companyId) }}" >
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