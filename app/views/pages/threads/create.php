<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="fw-bold mb-4">Create Thread</h3>
            <form method="POST" action="/threads/create/<?php echo $category_id; ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/threads/index/<?php echo $category_id; ?>" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Thread</button>
                </div>
            </form>
        </div>
    </div>
</div>