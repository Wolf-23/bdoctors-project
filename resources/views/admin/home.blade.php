@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.profile.edit', [Auth::user()->id])}}" class="btn btn-primary">Modifica Profilo</a>
        <form class="d-inline-block" action="{{route('admin.profile.destroy', [Auth::user()->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina Profilo</button>
          </form>
        <h1>Benvenuto Dr. {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <h3>Sei registrato con la mail {{Auth::user()->email}}</h3>
        <h5>Le tue Specializzazioni: </h5>
        <div class="row">
            @foreach (Auth::user()->specializations as $spec)
                <div class="col-4">{{ $spec->name }} </div>
            @endforeach
        </div>
        <div>
            @if (Auth::user()->profile_pic)
                <img style="width:150px;" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
            @else
                <img style="width:150px;" src="{{asset('images/avatar.png')}}">   
            @endif
        </div>
        <a class="btn btn-primary mt-3" href="{{ asset('storage/' .  Auth::user()->cv) }}" download>Download CV</a>
    </div> 

@endsection