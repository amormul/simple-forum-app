<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Threads</h3>
        <div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/threads/create/<?php echo $category_id; ?>" class="btn btn-primary">Create Thread</a>
            <?php endif; ?>
            <a href="/categories" class="btn btn-outline-primary ms-2">Back to Categories</a>
        </div>
    </div>
    
    <div class="row">
        <?php if ($threads && $threads->num_rows > 0): ?>
            <?php while($thread = $threads->fetch_assoc()): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex">
                            <img src="https://picsum.photos/50" class="avatar me-3 w-25" alt="User Avatar">
                            <div class="w-100">
                                <h5 class="fw-bold"><?php echo htmlspecialchars($thread['title']); ?></h5>
                                <p class="text-muted">Started by <span class="fw-bold"><?php echo htmlspecialchars($thread['username']); ?></span></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/posts/index/<?php echo $thread['id']; ?>" class="btn btn-primary btn-sm">Join Discussion</a>
                                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $thread['user_id']): ?>
                                        <a href="/threads/delete/<?php echo $thread['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center text-muted">No threads found</p>
            </div>
        <?php endif; ?>
    </div>
</div>