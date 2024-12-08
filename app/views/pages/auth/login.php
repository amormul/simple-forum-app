<div class="d-flex vh-100 align-items-center justify-content-center" style="background: linear-gradient(135deg, #fbc2eb, #a18cd1);">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <h3 class="text-center mb-4 fw-bold">Welcome Back</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="/auth/login">
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Log In</button>
            <p class="text-center mt-3">
                <small>Don't have an account? <a href="/auth/register" class="text-primary fw-bold">Sign up</a></small>
            </p>
        </form>
    </div>
</div>