@extends('layouts.app')
@section('content')
<h1>Hola {{ $person['name'] }}</h1>
<p>{{ $person['age'] }}</p>
@endsection