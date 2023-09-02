<?= $this->extend('auth/layout') ?>

<?= $this->section('content') ?>

<form action="<?= url_to('login') ?>" method="post" role="form">
    <?= csrf_field() ?>
    <!-- Email -->
    <div class="mb-3">
        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" value="<?= old('email') ?>" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
    </div>

    <!-- Remember me -->
    <?php if (setting('Auth.sessionConfig')['allowRemembering']) : ?>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" <?php if (old('remember')) : ?> checked<?php endif ?>>
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
    <?php endif; ?>

    <div class="text-center">
        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
    </div>
</form>

<?php if (session('error') !== null) : ?>
    <div class="alert alert-danger font-weight-bold text-white mt-4" role="alert"><?= session('error') ?></div>
<?php elseif (session('errors') !== null) : ?>
    <div class="alert alert-danger font-weight-bold text-white mt-4" role="alert">
        <?php if (is_array(session('errors'))) : ?>
            <?php foreach (session('errors') as $error) : ?>
                <?= $error ?>
                <br>
            <?php endforeach ?>
        <?php else : ?>
            <?= session('errors') ?>
        <?php endif ?>
    </div>
<?php endif ?>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

<?= $this->endSection() ?>