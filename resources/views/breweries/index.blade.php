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
            <div class="col-12 col-md-4">
                <a href="{{route('breweries.show',['id'=>$brewery->id])}}" style="text-decoration: none;color:inherit">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="https://picsum.photos/200?a={{$loop->iteration}}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{$brewery->name}} 
                            <span class="badge bg-secondary">{{$brewery->capacity}}</span>
                          </h5>
                          <p class="card-text">{{$brewery->description}}</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          <a href="{{route('breweries.edit',['id'=>$brewery->id])}}" class="btn btn-warning btn-sm">Edit</a>
                          <form id="deleteForm" action="{{route('breweries.destroy',['id'=>$brewery->id])}}" method="POST">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-danger btn-sm btnDelete">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
@push('scripts')
<script src="{{mix('js/breweryDelete.js')}}"></script>
@endpush
