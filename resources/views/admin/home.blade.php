@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.profile.edit', [Auth::user()->id])}}" class="btn btn-primary">Modifica Profilo</a>
        <form class="d-inline-block" action="{{route('admin.profile.destroy', [Auth::user()->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina Profilo</button>
          </form>
        <h1>Benvenuto {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <h3>Sei registrato con la mail {{Auth::user()->email}}</h3>
        <h5>Le tue Specializzazioni: </h5>
        <div class="row">
            @foreach (Auth::user()->specializations as $spec)
                <div class="col-4">{{ $spec->name }} </div>
            @endforeach
        </div>
       
    </div>

@endsection