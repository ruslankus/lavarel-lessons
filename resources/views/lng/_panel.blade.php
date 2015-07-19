<?php //dd($controller) ?>
<ul>
    @foreach($arrLng as $lng)

        <li>
            <a href="{!! action($controller,['lng' => $lng['prefix']]) !!}">
                {{$lng['name']}}
            </a>
        </li>

    @endforeach
</ul>