@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="container">
                <div class="alert alert-success">
                    <i class="fa-solid  fa-circle-check"></i> {{ session('success') }} 
                </div>
            </div>
        @endif
        <div class="mb-3">
            <a href="{{route('admin.profile.edit', [Auth::user()->name])}}" class="btn btn-primary">Modifica Profilo</a>
           <form class="d-inline-block" action="{{route('admin.profile.destroy', [Auth::user()->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina Profilo</button>
            </form>
        </div>
        <h1>Benvenuto Dr. {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <h3>Sei registrato con la mail {{Auth::user()->email}}</h3>
        <h5>Le tue Specializzazioni: </h5>
        <div class="row">
            @foreach (Auth::user()->specializations as $specialization)
            <div class="col-2">{{ $specialization->name }} </div>
            @endforeach
        </div>
        <div>
            @if (Auth::user()->profile_pic) 
                <img style="width:150px;" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
            @else
                <img style="width:150px;" src="{{asset('images/avatar.png')}}">   
            @endif
        </div>
        @if ( Auth::user()->cv)
            <a class="btn btn-primary mt-3" href="{{ asset('storage/' .  Auth::user()->cv) }}" download>Download CV</a>
        @else
            <h5 class="mt-3">Nessun CV caricato!</h5>  
        @endif
        @if (Auth::user()->services)
            <h5>Prestazioni offerte:</h5>
            <p>{{ Auth::user()->services }}</p>
        @endif
        <div class="d-flex">    
            <div class="col-6 my-3">
                <h3>Hai ricevuto {{ count(Auth::user()->reviews) }} recensioni</h3>
                <a href="{{route('admin.reviews.index', [Auth::user()->name])}}" class="btn btn-primary">Vedi Recensioni</a>
            </div>
            <div class="col-6 my-3">
                <h3>Hai ricevuto {{ count(Auth::user()->messages) }} messaggi</h3>
                <a href="{{route('admin.messages.index', [Auth::user()->name])}}" class="btn btn-primary">Vedi Messaggi</a>
            </div>
        </div>   
    </div>
 
@endsection