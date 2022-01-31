@extends('layouts.app')
@section('content')
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto text-center">
            <h1 class="">Profile Info of {{$user->name}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Breweries created:</h3>
        </div>
        @forelse ($user->breweries as $brewery)
            @include('breweries._brewery-card')
        @empty
            <h3>No breweries created, please <a href="{{route('breweries.create')}}">create one</a> </h3>
        @endforelse
    </div>
</div>
@endsection