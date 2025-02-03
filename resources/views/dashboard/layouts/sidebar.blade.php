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

#collapseUtilities {
  height: auto !important;
  overflow: visible !important;
}

@media (max-width: 768px) {

/* Optional: To center nav items in the sidebar */
.sidebar .nav-item {
    display: flex;
    justify-content: center; /* Horizontally center nav items */
    width: 100%; /* Ensure each item takes full width */
}

.sidebar .nav-link {
    display: block; /* Make links block elements */
    text-align: center; /* Center text within each nav item */
}

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
  <hr class="sidebar-divider">
@can('super-admin')
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
    <a class="nav-link" href="/dashboard/features/index">
        <i class="fas fa-fw fa-list"></i>
        <span>Upcoming Features</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/assets/index">
            <i class="fas fa-fw fa-barcode"></i>
            <span>Aset</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/dashboard/portfolios/index">
                <i class="fas fa-fw fa-barcode"></i>
                <span>Portfolio</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/dashboard/balances/index">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Balances</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/setvalue">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Set Value</span></a>
                    </li>


                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
                        aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Transactions</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Transactions:</h6>
                            <a class="collapse-item" href="/dashboard/transactions/index">List All</a>
                            <a class="collapse-item" href="/dashboard/transactions/pending">List Pending</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/report/index">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Reports</span></a>
                    </li>

                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/ryr/classes">
                            <i class="fas fa-fw fa-file"></i>
                            <span>Classes</span></a>
                        </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/ryr/teachers">
                            <i class="fas fa-fw fa-file"></i>
                            <span>Teachers</span></a>
                        </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->
  <div class="sidebar-card d-none d-md-flex">
    <p class="text-center mb-2"><strong>Smart Dashboard</strong> For all your administration needs</p>
  </div>

</nav>
<!-- End of Sidebar -->
