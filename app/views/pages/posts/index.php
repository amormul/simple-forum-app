<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Discussion</h3>
        <a href="/threads/index/<?php echo $thread_id; ?>" class="btn btn-outline-primary">Back to Threads</a>
    </div>
    <?php while($post = $posts->fetch_assoc()): ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong><?php echo htmlspecialchars($post['username']); ?></strong>
                        <span class="text-muted ms-2"><?php echo date('M j, Y g:i A', strtotime($post['created_at'])); ?></span>
                    </div>
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                        <a href="/posts/delete/<?php echo $post['id']; ?>" class="text-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    <?php endif; ?>
                </div>
                <p class="mt-2"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            </div>
        </div>
    <?php endwhile; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold">Add Your Reply</h5>
                <form method="POST" action="/posts/create/<?php echo $thread_id; ?>">
                    <div class="mb-3">
                        <textarea class="form-control" name="content" rows="3" required placeholder="Write your reply..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Reply</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>