@extends('admino.main')
@section('main-section')

<div class="container my-5">
    <div class="header bg-primary text-white text-center py-3 rounded shadow-sm mb-4">
        <h2 class="fw-bold">All Movies</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="input-group" style="max-width: 300px;">
            <input type="text" id="searchInput" class="form-control" placeholder="Search Title...">
            <button id="searchButton" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </div>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Movie
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-striped align-middle" id="movieTable">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Poster</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td class="fw-bold text-primary">{{ $movie->id }}</td>
                    <td>
                        <img src="{{ asset('images/' . $movie->image) }}"
                             class="img-thumbnail shadow-sm"
                             style="height: 80px; width: 80px; object-fit: cover;"
                             alt="Movie Poster">
                    </td>
                    <td class="text-dark">{{ $movie->title }}</td>
                    <td class="text-info fw-semibold">
                        @foreach($movie->categories as $cat)
                            <span class="badge bg-info text-dark">{{ $cat->name }}</span>
                        @endforeach
                    </td>
                    <td style="max-width: 300px;">{{ $movie->description }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Inline Search Script -->
<script>
    document.getElementById("searchButton").addEventListener("click", function () {
        let filter = document.getElementById("searchInput").value.toLowerCase().trim();
        let rows = document.querySelectorAll("#movieTable tbody tr");

        rows.forEach(row => {
            let title = row.querySelector("td:nth-child(3)").innerText.toLowerCase();
            row.style.display = title.includes(filter) ? "" : "none";
        });
    });
</script>

<!-- Custom Styles -->
<style>
    body {
        background-color: #f4f7fc;
        font-family: 'Poppins', sans-serif;
    }

    .header {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .table-container {
        background: #ffffff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .search-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .search-bar {
        max-width: 300px;
        border-radius: 20px;
        padding: 8px 15px;
    }

    .search-button {
        background: #007bff;
        border: none;
        border-radius: 20px;
        padding: 8px 15px;
        color: white;
        transition: 0.3s ease-in-out;
    }

    .search-button:hover {
        background: #0056b3;
    }

    .btn-primary {
        background: #007bff;
        border: none;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    .table th {
        background: #007bff;
        color: white;
        padding: 12px;
    }

    .table tbody tr:hover {
        background: #f1f3f8;
        transition: 0.3s ease-in-out;
    }

    .img-thumbnail {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }

    .img-thumbnail:hover {
        transform: scale(1.1);
    }

    .btn-sm {
        font-size: 14px;
        padding: 5px 10px;
    }
</style>

@endsection
