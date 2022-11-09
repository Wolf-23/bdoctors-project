@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.profile.edit', [Auth::user()->id])}}" class="btn btn-primary mb-3">Modifica Profilo</a>
        <h1>Benvenuto {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <h3>Sei registrato con la mail {{Auth::user()->email}}</h3>
        <h4>Le tue Specializzazioni:
            @foreach (Auth::user()->specializations as $spec)
                <span>{{ $spec->name }} </span>
            @endforeach
        </h4>
    </div>

@endsection