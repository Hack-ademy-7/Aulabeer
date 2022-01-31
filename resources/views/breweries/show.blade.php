@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://picsum.photos/600/400?a=1" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://picsum.photos/600/400?a=2" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://picsum.photos/600/400?a=3" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div class="col-12 col-md-6">
            <h1>{{$brewery->name}}</h1>
            <div>Capacity: {{$brewery->capacity}}</div>
            <p class="card-text"><small class="text-muted">Created by {{$brewery->user->name}}</small></p>

            <p>{{$brewery->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum nisi in cupiditate, libero impedit ad ex dolor quibusdam pariatur qui. Blanditiis accusamus vitae adipisci molestiae! Reiciendis totam beatae repellat itaque.</p>
            <a href="{{route('breweries.edit',['id'=>$brewery->id])}}" class="btn btn-warning btn-sm">Edit</a>
            <form id="deleteForm" action="{{route('breweries.destroy',['id'=>$brewery->id])}}" method="POST">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger btn-sm btnDelete">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{mix('js/breweryDelete.js')}}"></script>
@endpush