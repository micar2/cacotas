<ul class="paginacion">
    <li>
        {!! Form::open(['route' => ['search', $ordersId,$page-1], 'method' => 'Post']) !!}
        {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
        {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
        {!! Form::submit('<') !!}
        {!! Form::close() !!}
    </li>

    @for($i=1; $i<=($count/count($articles));$i++)
        @if($i==$page)
            <li>
                {!! Form::open(['route' => ['search', $ordersId,$i], 'method' => 'Post']) !!}
                {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                {!! Form::submit($i) !!}
                {!! Form::close() !!}
            </li>

        @else
            <li>
                {!! Form::open(['route' => ['search', $ordersId,$i], 'method' => 'Post']) !!}
                {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
                {!! Form::submit($i) !!}
                {!! Form::close() !!}
            </li>

        @endif
    @endfor
    <li>
        {!! Form::open(['route' => ['search', $ordersId,$page+1], 'method' => 'Post']) !!}
        {!!  Form::text('selection', $selection, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
        {!!  Form::text('text', $text, ['style' => 'visibility:hidden!important;height:0px!important;']) !!}
        {!! Form::submit('>') !!}
        {!! Form::close() !!}
    </li>

</ul>