<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-car"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Auzrentcar</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if($this->uri->segment(1) === 'dashboard')echo 'active'?>">
  <a class="nav-link" href="<?php echo site_url('dashboard')?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Users Collapse Menu -->
<li class="nav-item <?php if($this->uri->segment(1) === 'users')echo 'active'?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
    <i class="fas fa-fw fa-user-alt"></i>
    <span>Users</span>
  </a>
  <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('users')?>">View All</a>
      <a class="collapse-item" href="<?php echo site_url('users/create')?>">Add User</a>
    </div>
  </div>
</li>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->