<h1>{{ $film->title }}</h1>
<p>{{ $film->description }}</p>

<form action="{{ url('films/' . $film->id . '/reviews') }}" method="POST">
    @csrf
    <textarea name="review" placeholder="Write your review"></textarea>
    <button type="submit">Submit Review</button>
</form>
