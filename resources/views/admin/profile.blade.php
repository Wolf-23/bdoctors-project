@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.home')}}" class="btn btn-primary mb-3">Torna alla Home</a>
        <h1>Dettagli Profilo</h1>

        
        <form action="{{route('admin.profile.update' , Auth::user()->id )}}" method="POST" enctype="multipart/form-data" >

            @csrf
            @method('PUT')
            

            <div class="mb-3">

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

                <label for="profile_pic">Profile Picture</label>
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <input id="profile_pic" type="file" name="profile_pic" class="form-control-file @error('profile_pic') is-invalid @enderror" alt="">
                    @error('profile_pic')
                        <div class="d-block invalid-feedback">{{$message}}</div>
                    @enderror

                    <div class="post_image px-2 d-flex">
                        @if (Auth::user()->profile_pic)
                            <img class="img-fluid" src="{{ asset('storage/' . Auth::user()->profile_pic)}}"/>
                            <div class="px-2">Immagine corrente</div>
                        @else
                            <div>No loaded image</div>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Applica Modifiche</button>
                <a class="btn btn-primary d-inline-block" href="{{route('admin.home')}}">Annulla</a>
                
                


            </div>
        </form>
    </div>

@endsection