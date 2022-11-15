@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Sponsorizza il tuo profilo</h1>
        <p class="text-center">Sponsorizzando il tuo profilo, nelle ricerche comparirà prima degli altri dottori, inoltre il tuo profilo verrà aggiunto alla sezione "Medici in evidenza".</p>
        @foreach ($sponsorships as $sponsorship )
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $sponsorship->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Questa sponsorizzazione dura {{  $sponsorship->duration }} ore!</h6>
                    <h6 class="card-text">Prezzo: {{  $sponsorship->price }} €</h6>
                    <a href="#" class="card-link btn btn-success">Sponsorizza il tuo profilo</a>
                    <a href="{{route('admin.home')}}" class="card-link btn btn-primary">Torna alla Home</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection