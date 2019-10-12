@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($places as $place)
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 10px;">
                <div class="card-header">
                    {{$place->id}} {{$place->name}}
                    <span>{{$place->type}}</span>
                </div>
                <div class="card-body">
                    {{$place->description}}
                </div>
                <div class="card-footer">
                    <span>latitude: {{$place->latitude}}</span>,
                    <span>longitude: {{$place->longitude}}</span>,
                    <span>from: {{$place->availablefrom}}</span>,
                    <span>to: {{$place->availableto}}</span>,
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
