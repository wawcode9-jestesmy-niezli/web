@extends('layouts.hiwarsaw')

@section('content')
<div class="container">
    <h2 class="text-center">Moje miejsca</h2>
    @foreach($places as $place)
    <div class="card mb-3" style="width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <a href="/place/{{$place->id}}">
                    <img src="/place/{{$place->id}}.jpg" class="card-img" alt="{{$place->name}}" style="height: 200px;">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$place->name}}</h5>
                    <p class="card-text">
                        {{$place->description}}
                    </p>
                    @if($place->type !== "default")
                        <p class="card-text">
                            <small class="badge badge-primary">{{$place->type}}</small>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
