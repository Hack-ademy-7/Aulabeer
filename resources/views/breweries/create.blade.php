@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Add new brewery</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{route('breweries.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Capacity</label>
                  <input type="number" class="form-control" id="exampleInputPassword1" name="capacity">
                </div>
                <textarea name="description" id="" cols="30" rows="10" class="form-control mb-3"></textarea>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
        </div>
    </div>
</div>
@endsection