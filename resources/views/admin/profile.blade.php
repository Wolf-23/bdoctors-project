@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.home')}}" class="btn btn-primary mb-3">Torna alla Home</a>
        <h1>Dettagli Profilo</h1>

        
        <form action="" method="POST" enctype="multipart/form-data" >

            @csrf
            @method('PUT')
            

            <div class="mb-3">

                {{-- NAME --}}

                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', Auth::user()->name)}}"/>

                
                @error('name')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror

                {{-- SURNAME --}}

                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="surname" name="surname" value="{{old('name', Auth::user()->surname)}}"/>

                @error('surname')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror

                {{-- PHONE --}}

                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone', Auth::user()->phone)}}"/>

                @error('phone')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror

                {{-- ADDRESS --}}
                
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address', Auth::user()->address)}}"/>

                @error('address')
                    <div class='invalid-feedback alert alert-danger p-1'>
                        {{$message}}
                    </div>
                @enderror

                {{-- PROFILE PIC --}}

                 {{--<label for="profile-pic">Profile Picture</label>
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <input id="profile-pic" type="file" name="profile-pic" class="form-control-file @error('profile-pic') is-invalid @enderror" alt="">
                    @error('profile-pic')
                        <div class="d-block invalid-feedback">{{$message}}</div>
                    @enderror

                    <div class="post_image px-2 d-flex">
                        @if ($profile->profile-pic)
                            <img class="img-fluid" src="{{ asset('storage/' .  $profile->profile-pic) }}"/>
                            <div class="px-2">Immagine corrente</div>
                        @else
                            <div>No loaded image</div>
                        @endif
                    </div>
                </div>
                 --}}
                
            {{-- SPECIALIZATION --}}
            <div class="my-2">Edit your specializations:</div>
             <div class="row ml-1">
                    @foreach ($specializations as $specialization)
                    <div class="form-group form-check mx-2 col-3">
                        @if ($errors->any())
                            <input {{(in_array($specialization->id, old('specializations', [])))?'checked':''}} name="specializations[]" type="checkbox" class="form-check-input" id="specialization_{{$specialization->id}}" value="{{$specialization->id}}">
                            <label class="form-check-label" for="specialization_{{$specialization->id}}">{{$specialization->name}}</label>
                        @else
                            <input {{(Auth::user()->specializations->contains($specialization))?'checked':''}} name="specializations[]" type="checkbox" class="form-check-input" id="specialization_{{$specialization->id}}" value="{{$specialization->id}}">
                            <label class="form-check-label" for="specialization_{{$specialization->id}}">{{$specialization->name}}</label>
                        @endif
                    </div>
                    @endforeach
                @error('specializations')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            </div>
        </form>
    </div>

@endsection