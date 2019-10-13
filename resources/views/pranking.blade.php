@extends('layouts.hiwarsaw')

@section('content')
<div class="container">
    <h2 class="text-center">Ranking miejsc</h2>
    @foreach($items as $key => $item)
    <ul class="list-group">
        <li class="list-group-item mb-1"><strong>#{{$key+1}}</strong> {{$item}}</li>
    </ul>
    @endforeach
</div>
@endsection
