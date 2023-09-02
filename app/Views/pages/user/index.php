<?= $this->extend('layouts/base') ?>

<?= $this->section('page_title') ?>
User Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Users Management</h5>
                    <a href="<?= base_url('user/create') ?>" class="btn bg-gradient-dark btn-sm float-end mb-0">Add User</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="datatable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create Date</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <h6 class="mb-0 text-sm"><?= $user->username; ?></h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm <?= $user->status == 1 ? 'bg-gradient-success' : 'bg-gradient-secondary'; ?>"> <?= $user->status == 1 ? 'Online' : 'Offline'; ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $user->created_at; ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="<?= site_url('user/edit/' . $user->id); ?>" class="text-secondary font-weight-bold text-xs ms-1" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                            <a href="<?= site_url('user/delete/' . $user->id); ?>" class="text-secondary font-weight-bold text-xs ms-1" data-toggle="tooltip" data-original-title="Delete user">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('pageStyles') ?>
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<?= $this->endSection() ?>

<?= $this->section('pageScript') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    const dataTableBasic = new simpleDatatables.DataTable("#datatable", {
        searchable: true,
        fixedHeight: true
    });
</script>
<?= $this->endSection() ?>