<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container">
                <div class="input-group stylish-input-group">
                    {{--<input type="text" class="form-control"  placeholder="Search" >--}}
                    {{--<span class="input-group-addon">--}}
                        {{--<button type="submit">--}}
                            {{--<span class="glyphicon glyphicon-search"></span>--}}
                        {{--</button>--}}
                    {{--</span>--}}
                    {!! Form::open(['route' => ['search', $ordersId,1], 'method' => 'Post']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('selection', 'Buscar por:') !!}
                        {!! Form::select('selection', ['name' => 'Nombre', 'description' => 'Descripción']) !!}
                        @if($errors->has('selection'))
                            <div class="error">{{ $errors->first('selection') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::text('text', null, ['class' => 'form-control', 'placeholder' => 'buscar']) !!}
                        @if($errors->has('text'))
                            <div class="error">{{ $errors->first('text') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                    </div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>