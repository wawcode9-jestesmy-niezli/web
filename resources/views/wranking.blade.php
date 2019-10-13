@extends('layouts.hiwarsaw')

@section('content')
<div class="container">
    <h2 class="text-center">Ranking Warszawiaka</h2>
    @foreach($items as $key => $item)
    <ul class="list-group">
        <li class="list-group-item mb-1">
            <strong>#{{$key+1}}</strong> {{$item}}
            @if($key === 0)
                <i class="fa fa-trophy" aria-hidden="true"></i>
                <i class="fa fa-trophy" aria-hidden="true"></i>
                <i class="fa fa-trophy" aria-hidden="true"></i>
            @elseif($key === 1)
                <i class="fa fa-trophy" aria-hidden="true"></i>
            @endif
        </li>
    </ul>
    @endforeach
</div>
@endsection
