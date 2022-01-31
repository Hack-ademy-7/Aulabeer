@extends('layouts.app')
@section('content')
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto text-center">
            <h1 class="">All Breweries</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($breweries as $brewery)
            @include('breweries._brewery-card')
        @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script src="{{mix('js/breweryDelete.js')}}"></script>
@endpush
