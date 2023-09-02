<li class="nav-item">
    <a class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : ''; ?>" href="<?= base_url('dashboard'); ?>">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?= (uri_string() == 'users') ? 'active' : ''; ?>" href="<?= base_url('users'); ?>">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-badge text-warning text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">User</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link <?= (uri_string() == 'employees') ? 'active' : ''; ?>" href="<?= base_url('employees'); ?>">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-briefcase-24 text-info text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Employee</span>
    </a>
</li>
<li class="nav-item mt-3">
    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Settings</h6>
</li>
<li class="nav-item">
    <a class="nav-link <?= (uri_string() == 'profile') ? 'active' : ''; ?>" href="<?= base_url('profile'); ?>">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Profile</span>
    </a>
</li>