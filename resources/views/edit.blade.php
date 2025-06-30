@extends('admino.main')
@section('main-section')

<div class="container my-5">
    <h2 class="mb-4">Edit Movie</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Movie Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Change Image (optional)</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="text-muted">Current: {{ $movie->image }}</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Movie Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $movie->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="story" class="form-label">Story</label>
            <textarea class="form-control" id="story" name="story" rows="3">{{ $movie->story }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cast" class="form-label">Cast</label>
            <textarea class="form-control" id="cast" name="cast" rows="2">{{ $movie->cast }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imdb_rating" class="form-label">IMDb Rating</label>
            <input type="text" class="form-control" id="imdb_rating" name="imdb_rating" value="{{ $movie->imdb_rating }}">
        </div>

        <div class="mb-3">
            <label for="review" class="form-label">Review</label>
            <textarea class="form-control" id="review" name="review" rows="3">{{ $movie->review }}</textarea>
        </div>

        <div class="mb-3">
            <label for="screenshots" class="form-label">Upload Screenshots</label>
            <input type="file" class="form-control" name="screenshots[]" multiple>
            <small class="text-muted">You can upload multiple screenshots. Existing will be replaced if uploaded again.</small>
        </div>

        <div class="mb-3">
            <label for="download_4k" class="form-label">Download Link (4K)</label>
            <input type="text" class="form-control" name="download_4k" value="{{ $movie->download_4k }}">
        </div>

        <div class="mb-3">
            <label for="download_1080p" class="form-label">Download Link (1080p)</label>
            <input type="text" class="form-control" name="download_1080p" value="{{ $movie->download_1080p }}">
        </div>

        <div class="mb-3">
            <label for="download_720p" class="form-label">Download Link (720p)</label>
            <input type="text" class="form-control" name="download_720p" value="{{ $movie->download_720p }}">
        </div>

        <div class="mb-3">
            <label for="download_480p" class="form-label">Download Link (480p)</label>
            <input type="text" class="form-control" name="download_480p" value="{{ $movie->download_480p }}">
        </div>

        <div class="mb-3">
            <label for="categories" class="form-label">Movie Categories</label>
            <select class="form-select" id="categories" name="categories[]" multiple required>
                @foreach($allCategories as $category)
                    <option value="{{ $category->id }}"
                        {{ $movie->categories->contains($category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (or Cmd on Mac) to select multiple categories.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update Movie</button>
        <a href="{{ route('showmovies') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
