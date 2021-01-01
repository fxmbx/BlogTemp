@extends('layout.app')
@section('content')
<h1>Services</h1>
@if (!empty($Services))
<ul>
    @foreach ($Services as $item)
        <li>{{$item}}</li>
    @endforeach
</ul>
<span class=" glyphicon glyphicon=bookmark"></span>
@endif
@endsection                        
