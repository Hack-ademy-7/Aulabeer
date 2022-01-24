@extends('layouts.app')
@section('content')
<div class="container my-5 py-5">
<div class="row">
    <div class="col-12 col-md-6 mx-auto text-center">
        <h1 class="">Sobre nosotros</h1>
    </div>
</div>
</div>
<div class="container my-5 py-5">
    <div class="row">
       {{--  @if(!empty($persons))
       @foreach ($persons as $person) --}}
       @forelse ($persons as $person)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ $person["img"] }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title @if($loop->first) text-danger @else text-warning  @endif ">{{ $person["name"] }} {{ $person["lastname"] }}</h5>
                  <p class="card-text">{{ $person["age"] }}</p>
                  <a href="{{ route('detalle', ['key'=>$loop->index]) }}" class="btn btn-primary">Detalle</a>
                </div>
              </div>
        </div>
        @empty
      {{--   @endforeach
        @else  --}}
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <h2>Estamos buscando empleados</h2>
                   </div>
               </div>
           </div>
           @endforelse
      {{--   @endif --}}
    </div>
</div>
@endsection