@include('layout.header')

<div class="container my-4">
  <h2 class="section-title">Latest Releases</h2>
  <div class="movie-grid">
    @foreach($movies as $movie)
      <a href="{{ route('movie.show', $movie->id) }}" class="movie-box text-decoration-none text-white">
        <img src="{{ asset('images/' . $movie->image) }}" alt="{{ $movie->title }}">
        <div class="movie-info">
          <strong>{{ $movie->title }}</strong>
          <p>{!! nl2br(e($movie->description)) !!}</p>
        </div>
      </a>
    @endforeach
  </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $movies->links('pagination::bootstrap-5') }}
</div>



@include('layout.footer')
