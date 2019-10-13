@extends('layouts.hiwarsaw')

@section('content')
@include('blocks')
<div class="container">
    <div class="mb-3">
        <h2 class="text-center">{{$place->name}}</h2>
        <p class="text-center">{{$place->description}}</p>
    </div>
</div>
@endsection
