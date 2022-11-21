@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home_admin.css')}}">
@endsection

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="container">
                <div class="alert alert-success">
                    <i class="fa-solid  fa-circle-check"></i> {{ session('success') }} 
                </div>
            </div>
        @endif
        <div class="d-flex align-items-center justify-content-center eb_square m-auto rounded-circle">
            @if (Auth::user()->profile_pic) 
                <img class="rounded-circle" src="{{ asset('storage/' .  Auth::user()->profile_pic) }}"/>
            @else
                <img class="rounded-circle" src="{{asset('images/avatar.png')}}">   
            @endif
        </div>
        <h1 class="text-center mt-2">Benvenuto Dr. {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
        <span class="d-block text-center"><span class="font-weight-bold">Mail:</span> {{Auth::user()->email}}</span>
        <div class="row d-flex align-items-center justify-content-center mt-2">
            <div class="eb_square col-md-3 col-sm-6 mx-2 mb-2">
                <h5 class="font-weight-bold text-center pt-2">Le Tue Specializzazioni</h5>
                <ul class="d-flex flex-wrap px-1 justify-content-between pt-3">
                    @foreach (Auth::user()->specializations as $specialization)
                        <li class="list-unstyled px-2">{{ $specialization->name }} </li>
                    @endforeach
                </ul>
            </div>
            <div class="eb_square d-flex align-items-center justify-content-center mx-2 col-md-3 mb-2 col-sm-6">
                @if ( Auth::user()->cv)
                    <a class="btn eb_btn mt-3" href="{{ asset('storage/' .  Auth::user()->cv) }}" download>Download CV</a>
                @else
                    <h5 class="pt-2 font-weight-bold">Nessun CV caricato!</h5>  
                @endif
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="eb_square col-md-3 col-sm-6 px-4 mt-2 mx-2">
                @if (Auth::user()->services)
                    <h5 class="text-center pt-2 font-weight-bold">Prestazioni offerte</h5>
                    <p>{{ Auth::user()->services }}</p>
                @endif
            </div>
            <div class="eb_square col-md-3 col-sm-6 mt-2 mx-2">
                <div class="my-1 border-bottom text-center py-2">
                    <h5>Hai ricevuto {{ count(Auth::user()->reviews) }} recensioni</h5>
                    <a href="{{route('admin.reviews.index', [Auth::user()->name])}}" class="btn eb_btn">Vedi Recensioni</a>
                </div>
                <div class="my-1 py-3 text-center">
                    <h5>Hai ricevuto {{ count(Auth::user()->messages) }} messaggi</h5>
                    <a href="{{route('admin.messages.index', [Auth::user()->name])}}" class="btn eb_btn">Vedi Messaggi</a>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center">
            <a href="{{route('admin.profile.edit', [Auth::user()])}}" class="btn eb_btn">Modifica Profilo</a>
            <a href="{{route('admin.sponsorship.index', [Auth::user()->name])}}" class="btn btn-success">Sponsorizza Profilo</a>
           <form class="d-inline-block" action="{{route('admin.profile.destroy', [Auth::user()->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina Profilo</button>
            </form>
        </div> 
    </div>
 
@endsection