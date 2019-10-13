@extends('layouts.hiwarsaw')

@section('content')
<div class="container">
    <div class="mb-3">
        <h2 class="text-center">{{$place->name}}</h2>
        <p class="text-center">{{$place->description}}</p>
    </div>
    <br /><br />
    @include('blocks')
</div>
@endsection
