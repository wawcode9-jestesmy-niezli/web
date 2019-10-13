@extends('layouts.hiwarsaw')

@section('content')
<div class="container">
    @foreach($places as $place)
    <div class="card mb-3" style="width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/warsaw.jpg" class="card-img" alt="{{$place->name}}" style="height: 100%">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$place->name}}</h5>
                    <p class="card-text">
                        {{$place->description}}
                    </p>
                    <p class="card-text d-none">
                        id: {{$place->id}}
                    </p>
                    <p class="card-text d-none1">
                        latitude: {{$place->latitude}}
                    </p>
                    <p class="card-text d-none1">
                        longitude: {{$place->longitude}}
                    </p>
                    <p class="card-text d-none">
                        from: {{$place->availablefrom}}
                    </p>
                    <p class="card-text d-none">
                        to: {{$place->availableto}}
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
