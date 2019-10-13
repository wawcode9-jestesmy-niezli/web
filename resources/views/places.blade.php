@extends('layouts.hiwarsaw')

@section('content')
<div class="container mt-3">
    <div class="row">
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
                        id: {{$place->id}}
                    </p>
                    <p class="card-text">
                        desscription: {{$place->description}}
                    </p>
                    <p class="card-text">
                        latitude: {{$place->latitude}}
                    </p>
                    <p class="card-text">
                        longitude: {{$place->longitude}}
                    </p>
                    <p class="card-text">
                        from: {{$place->availablefrom}}
                    </p>
                    <p class="card-text">
                        to: {{$place->availableto}}
                    </p>
                    <p class="card-text"><small class="text-muted">{{$place->type}}</small></p>
                </div>
            </div>
        </div>
    </div>

        
        @endforeach
    </div>
</div>
@endsection
