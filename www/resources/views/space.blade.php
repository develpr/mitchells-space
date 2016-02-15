@extends('layouts.main')

@section('content')

@foreach($lights as $light)
    <div style="left:{{$light->position_x}}%; top:{{$light->position_y}}%;"
         class="star" data-light="{{$light->id}}"
         data-position-x="{{$light->position_x}}"
         data-position-y="{{$light->position_y}}">
        STAR
    </div>
@endforeach

@endsection