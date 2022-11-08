@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('admin.home')}}" class="btn btn-primary mb-3">Torna alla Home</a>
        <h1>Dettagli Profilo</h1>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('media') is-invalid @enderror" id="media" name="media" value="{{old('media', $post->media)}}"/>
            @error('media')
                <div class='invalid-feedback alert alert-danger p-1'>
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>

@endsection