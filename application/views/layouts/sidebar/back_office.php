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
<li class="nav-item <?php if($this->uri->segment(1) === 'customers')echo 'active'?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true" aria-controls="collapseCustomers">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Customers</span>
  </a>
  <div id="collapseCustomers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('customers')?>">View All</a>
    </div>
  </div>
</li>
<!-- Nav Item - Users Collapse Menu -->
<li class="nav-item <?php if($this->uri->segment(1) === 'cars')echo 'active'?>">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCars" aria-expanded="true" aria-controls="collapseCars">
    <i class="fas fa-fw fa-car-side"></i>
    <span>Cars</span>
  </a>
  <div id="collapseCars" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url('cars')?>">View All</a>
      <a class="collapse-item" href="<?php echo site_url('cars/create')?>">Add Car</a>
    </div>
  </div>
</li>
<br>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->