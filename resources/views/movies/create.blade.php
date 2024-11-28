@extends('layout.master')

@section('beeflix')
<div class="container mt-5 p-5">
    <h2>Add New Movie</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="title">Movie Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="genre_id">Genre</label>
            <select id="genre_id" name="genre_id" class="form-control" required>
                <option value="">Select a Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
            @error('release_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">Movie Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="poster">Movie Poster</label>
            <input type="file" class="form-control" id="poster" name="poster" required placeholder=''>
            @error('poster')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="form-group mb-3">
            <label for="photo" class="form-label">Movie Poster</label>
            <input type="file" name="poster" id="poster" class="form-control" placeholder="" value="{{old('poster')}}"/>
            @error('poster')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div> --}}

        <button type="submit" class="btn btn-dark">Add Movie</button>
    </form>
</div>
@endsection
