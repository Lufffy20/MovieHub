
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
