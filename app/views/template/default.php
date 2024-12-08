<?php
$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style.css" rel="stylesheet">
    <title>Forum</title>
</head>
<body>
    <nav class="navbar navbar-light sticky-top bg-white shadow-sm">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand text-primary fw-bold fs-4" href="/categories">Forum</a>
            <?php if($isLoggedIn): ?>
                <div>
                    <span class="me-3">Hello, <?php echo htmlspecialchars($username); ?></span>
                    <a href="/auth/logout" class="btn btn-outline-primary btn-sm">Logout</a>
                </div>
            <?php else: ?>
                <div>
                    <a href="/auth/login" class="btn btn-outline-primary btn-sm me-2">Login</a>
                    <a href="/auth/register" class="btn btn-primary btn-sm">Register</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <?php require_once '../app/views/pages/' . $view . '.php'; ?>

    <footer class="bg-white text-center py-3 shadow-sm">
        <small class="text-muted">© 2024 PHP-24. All Rights Reserved.</small>
    </footer>
</body>
</html>