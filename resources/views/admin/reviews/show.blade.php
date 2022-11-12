@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('admin.home', [Auth::user()->name])}}" class="btn btn-primary mb-3">Torna alla Home</a>
    <h1>Hai ricevuto una recensione da: {{$review->name}} {{$review->surname}}</h1>
    <h2>Voto ricevuto {{$review->vote}}</h2>
    <h3>Testo della recensione:</h3>
    <p> {{$review->review_text}}</p>
    <h5>Recensione ricevuta in data {{$review->created_at}}</h5>
</div>
    

@endsection