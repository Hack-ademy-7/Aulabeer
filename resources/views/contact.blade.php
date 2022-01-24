@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <h1>Contacta con nosotros</h1>
        </div>
    </div>
</div>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('email') }}">
                   {{--  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{ old('name') }}">
                    {{-- @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        name="description">{{  old('description')  }}</textarea>
                   {{--  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
