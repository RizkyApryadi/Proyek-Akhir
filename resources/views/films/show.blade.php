@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $film->title }}</h1>
    <p><strong>Description:</strong> {{ $film->description }}</p>
    <p><strong>Genre:</strong> {{ $film->genre->name }}</p>

    @if ($film->photo)
        <img src="{{ Storage::url($film->photo) }}" alt="Film Photo" class="img-fluid">
    @elseif ($film->photo_url)
        <img src="{{ $film->photo_url }}" alt="Film Photo" class="img-fluid">
    @endif

    <hr>

    <h2>Reviews</h2>
    <!-- Daftar Review -->
    @foreach ($reviews as $review)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $review->user->name }} <small class="text-muted">rated: {{ $review->rating }} stars</small></h5>
            <p class="card-text">{{ $review->content }}</p>
            <p class="card-text"><small class="text-muted">Reviewed on {{ $review->created_at->format('d M Y') }}</small></p>
        </div>
    </div>
@endforeach


    <hr>

    <!-- Form Tambah Review -->
    @auth
        <h2>Write a Review</h2>
        <form action="{{ route('reviews.store', $film) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="content" class="form-label">Your Review</label>
                <textarea name="content" id="content" class="form-control" rows="4" placeholder="Write your review here..." required>{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-select" required>
                    <option value="">Select rating</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
                @error('rating')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to write a review.</p>
    @endauth
</div>
@endsection
