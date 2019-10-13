@extends('layouts.hiwarsaw')

@section('content')
<div class="container">
    <h2 class="text-center">List miejsc</h2>
    @foreach($places as $place)
    @if(in_array($place->id, $visited->toArray()))
        @php $style = ""; @endphp
    @else
        @php $style = "filter: grayscale(1);opacity: 0.7;"; @endphp
    @endif
    <div class="card mb-3" style="width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="/place/{{$place->id}}.jpg" class="card-img" alt="{{$place->name}}" style="height: 200px;{{$style}}"/>
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
