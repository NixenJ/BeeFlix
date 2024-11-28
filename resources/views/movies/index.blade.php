@extends('layout.master')

@section('beeflix')

<div class="">
    <div class="d-flex flex-column" style="margin: 0; padding: 0;">
        <div class="m-0 p-0" style="overflow: hidden;">
            <img src="{{ asset('assets/carousel.jpg') }}" class="w-100 m-0 p-0" style="height: 500px; opacity: 0.2;">
        </div>
    </div>

    <div class="d-flex justify-content-center p-3">
        <a href="{{ route('movies.create') }}" class="btn" style="background-color: black; color: white;">Add New Movie</a>
    </div>

    <div class="container ">
        @if ($movies->count())
            <div class="row ">
                @foreach ($movies as $movie)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;">
                            {{-- <img src="{{ asset('assets/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}"> --}}
                            <img src="{{ Storage::url($movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <p class="card-text">{{ $movie->description }}</p>
                                <p class="card-text"><strong>Genre:</strong> {{ $movie->genre->name }}</p>
                                <p class="card-text"><strong>Release Date:</strong> {{ \Carbon\Carbon::parse($movie->release_date)->format('m/d/Y') }}</p>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this movie?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $movies->links() }}
            </div>

        @else
            <p class="text-center">No movies available.</p>
        @endif
    </div>
</div>

@endsection
