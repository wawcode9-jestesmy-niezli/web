@extends('layouts.hiwarsaw')

@section('content')

<div class="mb-5" style="background-image: url('./warsaw.jpg');background-size: cover;background-position:top center;">
    <div class="container">
        <div class="row">
            <div class="col text-center" style="color: white;padding: 150px 15px;">
                <h1>Discover Warsaw with the <strong>"Hi!&nbsp;Warsaw"</strong> app</h1>
                @auth
                    <button onclick="disover()" type="button" class="btn" style="margin-top: 20px; padding:15px 25px;border-radius:0;color: white;background: rgba(0, 0, 0, 0.5);border: 2px solid white;font-size:20px;">Discover!</button>
                    <script>
                        if ("geolocation" in navigator) {
                            console.log("Geolocation available");
                        }
                        function disover() {
                            navigator.geolocation.getCurrentPosition((position) => {
                                const latitude  = position.coords.latitude;
                                const longitude = position.coords.longitude;
                                fetch(myRequest)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.id) {
                                            window.location.href="/place/" + data.id;
                                        } else {
                                            alert("No new places to discover!")
                                        }
                                    })
                                    .catch(() => {
                                        alert("Error, please try again later!");
                                    });
                            }, () => {
                                alert("Geolocation services are unavailable, please enable it in your browser!");
                            });
                        }
                    </script>
                @endauth
            </div>
        </div>
    </div>
</div>

<div class="container text-center mb-5" style="font-size: 25px;line-height: 70px;">
    <div class="row">
        <div class="col" style="background-color: #f6f6f6;">
            #discover
        </div>
        <div class="col" style="background-color: #eae9e9;">
            #play
        </div>
    </div>
    <div class="row">
        <div class="col" style="background-color: #eae9e9;">
            #explore
        </div>
        <div class="col" style="background-color: #f6f6f6;">
            #win
        </div>
    </div>
</div>

<div class="container">
    <div class="mb-3 text-center">
        <h2>Nearby places</h2>
    </div>
</div>

@foreach($places as $place)
<div class="container">
    <div class="card mb-3" style="width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/warsaw.jpg" class="card-img" alt="{{$place->name}}" style="height: 100%">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$place->name}}</h5>
                    <p class="card-text">{{$place->description}}</p>
                    @if($place->type !== "default")
                        <p class="card-text">
                            <small class="badge badge-primary">{{$place->type}}</small>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
