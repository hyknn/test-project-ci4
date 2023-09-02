<?= $this->extend('layouts/base') ?>

<?= $this->section('page_title') ?>
Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid my-5 py-2">
    <div class="d-flex justify-content-center mb-5">
        <div class="col-lg-9 mt-lg-0 mt-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Edit User</h5>
                </div>
                <div class="card-body pt-0">
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
                        <div class="alert alert-success font-weight-bold text-white mt-4" role="alert"><?= session('message') ?></div>
                    <?php endif ?>

                    <form method="POST" action="<?= base_url('user/update/') . $users->user_id; ?>" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <div class="input-group">
                                    <input id="first_name" name="first_name" class="form-control" type="text" placeholder="First Name" value="<?= $users->first_name; ?>" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <div class="input-group">
                                    <input id="last_name" name="last_name" class="form-control" type="text" placeholder="Last Name" value="<?= $users->last_name; ?>" onfocus="focused(this)" onfocusout="defocused(this)" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="form-label">Role</label>
                            <select id="role-select" name="group">
                                <option value="superadmin" <?= $users->group == 'superadmin' ? ' selected' : '' ?>>Super Admin</option>
                                <option value="admin" <?= $users->group == 'admin' ? ' selected' : '' ?>>Admin</option>
                                <option value="user" <?= $users->group == 'user' ? ' selected' : '' ?>>User</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <a href="<?= base_url('user') ?>" class="btn btn-light m-0">Back</a>
                            <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?= $this->endSection() ?>

<?= $this->section('pageScript') ?>
<script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>

<script>
    // Initialize Choices.js 
    const roleselect = new Choices('#role-select', {
        searchEnabled: false,
        placeholder: true,
        placeholderValue: 'Select an option',
    });
</script>
<?= $this->endSection() ?>