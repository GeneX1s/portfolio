<style>
  /* Ensure nav items are aligned */
.navbar-nav .nav-item {
  display: flex;
  align-items: center; /* Align items vertically */
    margin: 0; /* Remove any extra margins */
    padding: 0; /* Remove any extra padding */
}

/* Adjust alignment if necessary */
.navbar-nav .nav-link {
    padding: 0.5rem 1rem; /* Adjust padding as needed */
    align-items: center; /* Align items vertically */
}

  </style>

<!-- Sidebar -->
<nav class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin <sup>:)</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  {{-- <hr class="sidebar-divider"> --}}

  <!-- Heading -->
  {{-- <div class="sidebar-heading">
    Website Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-utensils"></i>
      <span>Foods</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Foods:</h6>
        <a class="collapse-item" href="/dashboard/menus/index">Menus</a>
        <a class="collapse-item" href="/dashboard/ingredients/index">Ingredients</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/dashboard/specials/index">
      <i class="fas fa-fw fa-star"></i>
      <span>Specials</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/dashboard/events/index">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Events</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/dashboard/chefs/index">
      <i class="fas fa-fw fa-person"></i>
      <span>Chefs</span></a>
  </li>


  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-image"></i>
      <span>Gallery</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="utilities-color.html">Colors</a>
        <a class="collapse-item" href="utilities-border.html">Borders</a>
        <a class="collapse-item" href="utilities-animation.html">Animations</a>
        <a class="collapse-item" href="utilities-other.html">Other</a>
      </div>
    </div>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Administration
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-person"></i>
      <span>Users</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded" style="position: relative; z-index: 999999999;">
        <a class="collapse-item" href="/dashboard/users/manage">Change My Password</a>
        <a class="collapse-item" href="/dashboard/users/index">Users List</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/features">
      <i class="fas fa-fw fa-list"></i>
      <span>Upcoming Features</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/assets/index">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Aset</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/dashboard/balances/index">  
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Balances</span></a>
  </li>

  {{-- <li class="nav-item">
    <a class="nav-link" href="/dashboard/users/{{ Auth::id() }}/edit">  
      <i class="fas fa-fw fa-person"></i>
      <span>User</span></a>
  </li> --}}

  <li class="nav-item">
    <a class="nav-link" href="/dashboard/setvalue">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Set Value</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="/dashboard/transactions/index">
      <i class="fas fa-fw fa-table"></i>
      <span>Transactions</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->
  <div class="sidebar-card d-none d-lg-flex">
    <p class="text-center mb-2"><strong>Smart Dashboard</strong> For all your administration needs</p>
  </div>

</nav>
<!-- End of Sidebar -->