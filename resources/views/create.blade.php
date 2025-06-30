@extends('admino.main')
@section('main-section')

<div class="container my-5">
    <div class="header bg-primary text-white text-center py-3 rounded shadow-sm mb-4">
        <h2 class="fw-bold">Add New Movie</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm rounded p-4">
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-semibold">Movie Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-semibold">Movie Poster</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Movie Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="story" class="form-label fw-semibold">Movie Story</label>
                <textarea class="form-control" id="story" name="story" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="cast" class="form-label fw-semibold">Cast</label>
                <input type="text" class="form-control" id="cast" name="cast">
            </div>

            <div class="mb-3">
                <label for="imdb_rating" class="form-label fw-semibold">IMDb Rating</label>
                <input type="text" class="form-control" id="imdb_rating" name="imdb_rating">
            </div>

            <div class="mb-3">
                <label for="review" class="form-label fw-semibold">Review</label>
                <textarea class="form-control" id="review" name="review" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="screenshots" class="form-label fw-semibold">Screenshots (multiple)</label>
                <input type="file" class="form-control" id="screenshots" name="screenshots[]" accept="image/*" multiple>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="download_4k" class="form-label fw-semibold">Download Link 4K</label>
                    <input type="url" class="form-control" id="download_4k" name="download_4k">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="download_1080p" class="form-label fw-semibold">Download Link 1080p</label>
                    <input type="url" class="form-control" id="download_1080p" name="download_1080p">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="download_720p" class="form-label fw-semibold">Download Link 720p</label>
                    <input type="url" class="form-control" id="download_720p" name="download_720p">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="download_480p" class="form-label fw-semibold">Download Link 480p</label>
                    <input type="url" class="form-control" id="download_480p" name="download_480p">
                </div>
            </div>

            <div class="mb-4">
                <label for="categories" class="form-label fw-semibold">Movie Categories</label>
                <select class="form-select" id="categories" name="categories[]" multiple required>
                    @foreach($allCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple</small>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                <i class="bi bi-upload"></i> Add Movie
            </button>
        </form>
    </div>
</div>



<div class="card mb-4">
    <div class="card-header bg-secondary text-white">
        <strong>Add New Category</strong>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store1') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Add Category</button>
        </form>
    </div>
</div>

<style>
    body {
        background-color: #f4f7fc;
        font-family: 'Poppins', sans-serif;
    }

    .header {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control,
    .form-select {
        border: 2px solid #212529 !important; /* DARKER BORDER */
        border-radius: 8px;
        box-shadow: none !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0056b3 !important;
        box-shadow: 0 0 0 0.2rem rgba(0, 91, 187, 0.25);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

@endsection
