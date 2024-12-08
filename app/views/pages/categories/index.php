<?php
$isLoggedIn = isset($_SESSION['user_id']);
?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Explore Categories</h3>
        <?php if ($isLoggedIn): ?>
            <a href="/categories/create" class="btn btn-primary">Create Category</a>
        <?php endif; ?>
    </div>
    <div class="row">
        <?php if ($categories && $categories->num_rows > 0): ?>
            <?php while($category = $categories->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card category-card shadow-sm">
                        <img src="<?php echo htmlspecialchars($category['image_url']); ?>" class="card-img-top" alt="Category Image">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h5 class="card-title"><?php echo htmlspecialchars($category['title']); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($category['description']); ?></p>
                            <div class="mt-auto w-100 d-flex justify-content-between align-items-center">
                                <a href="/threads/index/<?php echo $category['id']; ?>" class="btn btn-primary btn-sm">View Threads</a>
                                <?php if ($isLoggedIn && $_SESSION['user_id'] == $category['user_id']): ?>
                                    <a href="/categories/delete/<?php echo $category['id']; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Are you sure?')">Delete</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center text-muted">No categories found</p>
            </div>
        <?php endif; ?>
    </div>
</div>