@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{route('admin.profile.edit', [Auth::user()->name])}}" class="btn btn-primary">Modifica Profilo</a>
            <a href="{{route('admin.messages.index', [Auth::user()->name])}}" class="btn btn-primary">Vedi Messaggi</a>
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
       
    </div> 

@endsection