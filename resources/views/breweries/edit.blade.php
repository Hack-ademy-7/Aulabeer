@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Modify brewery</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{route('breweries.update',['id'=>$brewery->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name') ?? $brewery->name}}">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Capacity</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="capacity" value="{{old('capacity') ?? $brewery->capacity}}">
                </div>
                <textarea name="description" id="" cols="30" rows="10" class="form-control mb-3">{{old('description') ?? $brewery->description}}</textarea>
                @foreach ($beers as $beer)
                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="{{ $beer->id }}" id="flexCheckChecked" name="beers[]" @if($brewery->beers->contains($beer)) checked @endif>
                  <label class="form-check-label" for="flexCheckChecked">
                    {{ $beer->name }}
                  </label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
</div>
@endsection