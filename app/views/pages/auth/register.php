<div class="d-flex vh-100 align-items-center justify-content-center" style="background: linear-gradient(135deg, #89f7fe, #66a6ff);">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%; border-radius: 15px;">
        <h3 class="text-center mb-4 fw-bold">Create Account</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="/auth/register">
            <div class="mb-3">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Choose a username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Create a password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            <p class="text-center mt-3">
                <small>Already have an account? <a href="/auth/login" class="text-primary fw-bold">Log in</a></small>
            </p>
        </form>
    </div>
</div>