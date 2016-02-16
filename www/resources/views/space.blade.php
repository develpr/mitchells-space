@extends('layouts.main')

@section('content')

@foreach($lights as $light)
    <div style="left:{{$light->position_x}}%; top:{{$light->position_y}}%;"
         class="star hide-for-small-only" data-light="{{$light->id}}"
         data-position-x="{{$light->position_x}}"
         data-position-y="{{$light->position_y}}">
            <a class="starpoint" href="#star-{{$light->id}}">

            </a>
            <div class="starhalo">

            </div>
    </div>
@endforeach

    <ul class="star-list hide-for-medium">
        @foreach($lights as $light)
            <li  class="star" data-light="{{$light->id}}">
                <div class="starhalo">
                </div>
                <a href="#star-{{$light->id}}">
                    {{$light->name}}
                </a>
            </li>
        @endforeach
    </ul>

@endsection