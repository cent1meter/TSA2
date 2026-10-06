<?= $this->include('partials/header') ?>

<section class="section form-section">
    <div class="container">
        <div class="form-card auth-card">
            <p class="eyebrow">Protected management</p>
            <h1>Log in</h1>
            <p>Sign in to create, edit, or archive tasks. Public pages remain available without an account.</p>

            <form action="<?= site_url('login') ?>" method="post" novalidate>
                <?= csrf_field() ?>

                <label for="username">Username</label>
                <input id="username" name="username" type="text" maxlength="50" autocomplete="username" required value="<?= esc(old('username')) ?>">

                <label for="password">Password</label>
                <input id="password" name="password" type="password" maxlength="255" autocomplete="current-password" required>

                <button class="button button-primary" type="submit">Log in</button>
            </form>

            <p class="demo-note"><strong>Demo:</strong> admin01 / password</p>
        </div>
    </div>
</section>

<?= $this->include('partials/footer') ?>
