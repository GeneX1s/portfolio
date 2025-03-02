@extends('dashboard.layouts.main')

@section('container')

<body id="page-top">

    <div class="container-fluid">

        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        {{-- <form
                            class="d-none d-sm-inline-block form-inline mr-2 ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}

                        <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search"
                            action="{{ route('dashboard') }}" method="GET">
                            @csrf
                            <div class="input-group">
                                <select class="form-control bg-light small" name="year" id="year">
                                    @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>

                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Search for..." aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            @can('super-admin')

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                December 12, 2019</div>
                                            <span class="font-weight-bold">A
                                                new
                                                monthly report is ready
                                                to
                                                download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                December 7, 2019</div>
                                            $290.29 has been deposited into
                                            your
                                            account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                December 2, 2019</div>
                                            Spending Alert: We've noticed
                                            unusually
                                            high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All
                                        Alerts</a>
                                </div>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="messagesDropdown">
                                    <h6 class="dropdown-header">
                                        Message Center
                                    </h6>
                                    @foreach ($messages as $msg)
                                    <a class="dropdown-item d-flex align-items-center" href="dashboard/contactus/index">
                                        <div class="dropdown-list mr-3">

                                            <div class="status-indicator bg-success">
                                            </div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate">{{$msg->message}}</div>
                                            <div class="small text-gray-500">
                                                {{$msg->name}}</div>
                                        </div>
                                    </a>
                                    @endforeach
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                            <div class="status-indicator">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">I
                                                have the
                                                photos that you ordered
                                                last
                                                month, how
                                                would you like them sent
                                                to you?
                                            </div>
                                            <div class="small text-gray-500">
                                                Jae
                                                Chun · 1d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                            <div class="status-indicator bg-warning">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Last
                                                month's
                                                report looks great, I am
                                                very
                                                happy with
                                                the progress so far,
                                                keep up the
                                                good work!</div>
                                            <div class="small text-gray-500">
                                                Morgan
                                                Alvarez · 2d</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle"
                                                src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                            <div class="status-indicator bg-success">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text-truncate">Am I
                                                a good
                                                boy? The reason I ask is
                                                because
                                                someone
                                                told me that people say
                                                this to
                                                all dogs, even if they
                                                aren't
                                                good...</div>
                                            <div class="small text-gray-500">
                                                Chicken
                                                the Dog · 2w</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500"
                                        href="/dashboard/contactus">Read More Messages</a>
                                </div>
                            </li>

                            @endcan
                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <p class="mt-3 text-gray-600">Welcome Back, {{ auth()->user()->username }}</p>
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                                    <img class="img-profile rounded-circle"
                                        style="width: 40px; height: 40px; object-fit: cover;"
                                        src="../../dasbor/img/profile.jpg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    @can('super-admin')

                                    <a class="dropdown-item" href="/dashboard/users/attempt">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Login Attempts
                                    </a>
                                    <a class="dropdown-item" href="/dashboard/audit/index">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Audit Log
                                    </a>
                                    @endcan

                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard | {{ $tahun }}</h1>
                            <a href="/generate-active-page-pdf"
                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i>
                                Generate Report</a>
                        </div>

                        <!-- Content Row -->
                        @if (auth()->user()->role == 'super-admin')
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Year Investment Target Remaining
                                                </div>
                                                @php
                                                $target = $target
                                                $anggaran = $target - $investment_tahunan;
                                                @endphp
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format($anggaran,
                                                    '2', ',', '.')
                                                    }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Remaining
                                                    Spendable
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format(($spendable),
                                                    '2',
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Earnings this
                                                    Month
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format($pendapatan_bulanan,
                                                    '2',
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    This Month Quota
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format(($quota),
                                                    '2',
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-check fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (auth()->user()->role == 'ryr')
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    This Week's Income
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format($pendapatan_mingguan,
                                                    '2', ',', '.')
                                                    }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    This month's Income
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format(($pendapatan_bulanan),
                                                    '2',
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    This year's Income
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format($pendapatan_tahunan,
                                                    '2',
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-check fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    This Month's Outcome
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp.{{
                                                    number_format(($pengeluaran_bulanan),
                                                    '2',
                                                    ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- Content Row -->

                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            Cashflow Overview</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">
                                                    Options:
                                                </div>
                                                <a class="dropdown-item" href="#">View Details</a>
                                                <a class="dropdown-item" href="#">Download Report</a>
                                                <div class="dropdown-divider">
                                                </div>
                                                <a class="dropdown-item" href="#">Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"
                                                data-transactions="{{ json_encode($area_chart) }}"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            Finance Data</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">
                                                    Dropdown Header:
                                                </div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another
                                                    action</a>
                                                <div class="dropdown-divider">
                                                </div>
                                                <a class="dropdown-item" href="#">Something
                                                    else
                                                    here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        @if (auth()->user()->role == 'super-admin')
                                        <p>Earning: Rp.{{
                                            number_format($pendapatan_tahunan,
                                            '2',
                                            ',', '.') }}</p>
                                        <p>Spending: Rp.{{
                                            number_format($pengeluaran_tahunan,
                                            '2',
                                            ',', '.') }}</p>
                                        <p>Investment: Rp.{{
                                            number_format($investment_tahunan,
                                            '2',
                                            ',', '.') }}</p>
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>

                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i>
                                                Earning
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-danger"></i>
                                                Spending
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i>
                                                Investment
                                            </span>
                                        </div>
                                        @endif
                                        @if (auth()->user()->role == 'ryr')
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>

                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i>
                                                Wallrope Class
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-danger"></i>
                                                Hatha Class
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-info"></i>
                                                Special Class
                                            </span>
                                        </div>
                                        @endif
                                    </div>

                                    @if (auth()->user()->role == 'super-admin')
                                    @php
                                    $pie = [];
                                    $pie = $piedata;
                                    @endphp

                                    @elseif (auth()->user()->role == 'ryr')

                                    @php
                                    $pie = [];
                                    $pie = $piedata_ryr;
                                    @endphp
                                    @endif <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                                                            var chartData = @json($pie); // Pass the PHP variable to JavaScript

                                                                            var ctx = document.getElementById("myPieChart").getContext('2d');
                                                                            var myPieChart = new Chart(ctx, {
                                                                                type: 'doughnut',
                                                                                data: {
                                                                                    labels: chartData.labels,
                                                                                    datasets: [{
                                                                                        data: chartData.data,
                                                                                        backgroundColor: chartData.backgroundColor,
                                                                                        hoverBackgroundColor: chartData.hoverBackgroundColor,
                                                                                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                                                                                    }],
                                                                                },
                                                                                options: {
                                                                                    maintainAspectRatio: false,
                                                                                    tooltips: {
                                                                                        backgroundColor: "rgb(255,255,255)",
                                                                                        bodyFontColor: "#858796",
                                                                                        borderColor: '#dddfeb',
                                                                                        borderWidth: 1,
                                                                                        xPadding: 15,
                                                                                        yPadding: 15,
                                                                                        displayColors: false,
                                                                                        caretPadding: 10,
                                                                                    },
                                                                                    legend: {
                                                                                        display: false
                                                                                    },
                                                                                    cutoutPercentage: 80,
                                                                                },
                                                                            });
                                                                        });
                                    </script>


                                </div>
                            </div>

                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            @php
                            // use App\Models\Transaction;

                            if(auth()->user()->role == 'ryr'){
                            $title = "Class Profit";
                            }else{
                            $title = "Incomes";
                            }
                            @endphp
                            <!-- Content Column -->
                            <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            Spendings</h6>
                                    </div>

                                    @php

                                    $transact = $transactions->filter(function($transaction) {
                                        return $transaction->kategori == 'Pengeluaran';
                                    });
                                    // Transaction::where('status','Active')->where('kategori','Pengeluaran')->where('profile',auth()->user()->role)->get();

                                    $transact2 = $transactions->filter(function($transaction) {
                                        return $transaction->kategori == 'Pendapatan';
                                    });
                                    // Transaction::where('status','Active')->where('kategori','Pendapatan')->where('profile',auth()->user()->role)->get();

                                    if($transact){
                                    $total = 0;
                                    $sub_kategori = [];
                                    $categories = $transact->pluck('sub_kategori')->unique();

                                    foreach($categories as $category){
                                    $sub_kategori[$category] = [
                                    'nominal' => $transact->where('sub_kategori',$category)->sum('nominal'),
                                    'percent' => ($transact->where('sub_kategori',$category)->sum('nominal') /
                                    $transact->sum('nominal')) * 100
                                    ];
                                    }
                                    }

                                    if($transact2){
                                    $total = 0;
                                    $sub_kategori2 = [];
                                    $categories = $transact2->pluck('sub_kategori')->unique();

                                    foreach($categories as $category){
                                    $sub_kategori2[$category] = [
                                    'nominal' => $transact2->where('sub_kategori',$category)->sum('nominal'),
                                    'percent' => ($transact2->where('sub_kategori',$category)->sum('nominal') /
                                    $transact2->sum('nominal')) * 100
                                    ];
                                    }
                                    }

                                    @endphp

                                    <div class="card-body">

                                        @foreach ($sub_kategori as $sub_name => $sub)

                                        <h4 class="small font-weight-bold">
                                            {{ $sub_name }} <span class="float-right">{{
                                                number_format($sub['percent'], 2) }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ number_format($sub['percent'], 2) }}%"
                                                aria-valuenow="{{ number_format($sub['percent'], 2)}}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        @endforeach

                                        {{-- <h4 class="small font-weight-bold">
                                            Transport/Bensin <span class="float-right">{{
                                                number_format($percentBensin,
                                                2) }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ number_format($percentBensin, 2) }}%"
                                                aria-valuenow="{{ number_format($percentBensin, 2) }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <h4 class="small font-weight-bold">
                                            Fixed <span class="float-right">{{
                                                number_format($percentFixed,
                                                2) }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ number_format($percentFixed, 2) }}%"
                                                aria-valuenow="{{ number_format($percentFixed, 2) }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <h4 class="small font-weight-bold">
                                            Internet<span class="float-right">{{
                                                number_format($percentInternet,
                                                2) }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ number_format($percentInternet, 2) }}%"
                                                aria-valuenow="{{ number_format($percentInternet, 2) }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                        <h4 class="small font-weight-bold">
                                            Lifestyle<span class="float-right">{{
                                                number_format($percentLifestyle,
                                                2) }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ number_format($percentLifestyle, 2) }}%"
                                                aria-valuenow="{{ number_format($percentLifestyle, 2) }}"
                                                aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div> --}}


                                    </div>
                                </div>

                                <!-- Color System -->
                                {{-- <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-primary text-white shadow">
                                            <div class="card-body">
                                                Primary
                                                <div class="text-white-50 small">
                                                    #4e73df
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-success text-white shadow">
                                            <div class="card-body">
                                                Success
                                                <div class="text-white-50 small">
                                                    #1cc88a
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-info text-white shadow">
                                            <div class="card-body">
                                                Info
                                                <div class="text-white-50 small">
                                                    #36b9cc
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-warning text-white shadow">
                                            <div class="card-body">
                                                Warning
                                                <div class="text-white-50 small">
                                                    #f6c23e
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-danger text-white shadow">
                                            <div class="card-body">
                                                Danger
                                                <div class="text-white-50 small">
                                                    #e74a3b
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-secondary text-white shadow">
                                            <div class="card-body">
                                                Secondary
                                                <div class="text-white-50 small">
                                                    #858796
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-light text-black shadow">
                                            <div class="card-body">
                                                Light
                                                <div class="text-black-50 small">
                                                    #f8f9fc
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card bg-dark text-white shadow">
                                            <div class="card-body">
                                                Dark
                                                <div class="text-white-50 small">
                                                    #5a5c69
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            </div>

                            <div class="col-lg-6 mb-4">

                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            {{ $title }}</h6>
                                    </div>


                                    <div class="card-body">

                                        @foreach ($sub_kategori2 as $sub_name => $sub)

                                        <h4 class="small font-weight-bold">
                                            {{ $sub_name }} <span class="float-right">{{
                                                number_format($sub['percent'], 2) }}%</span>
                                        </h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ number_format($sub['percent'], 2) }}%"
                                                aria-valuenow="{{ number_format($sub['percent'], 2)}}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>

                        </div>

                        @if (auth()->user()->role == 'super-admin')

                        <div class="row">
                            <div class="col-lg-6 mb-4">

                                <!-- Illustrations -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            To Do List Reminder:</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                                src="img/undraw_posting_photo.svg" alt="...">
                                        </div>
                                        <p>Jangan lupa konfigurasi DomPDF
                                        </p>
                                        <p>Untuk todo list lainnya ambil dari features
                                        </p>
                                        <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse
                                            Illustrations on
                                            unDraw &rarr;</a>
                                    </div>
                                </div>

                                <!-- Approach -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            Goals:
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <p>SB Admin 2 makes extensive
                                            use of Bootstrap 4
                                            utility classes in order
                                            to reduce
                                            CSS bloat and poor page
                                            performance.
                                            Custom CSS classes are
                                            used to create
                                            custom components and
                                            custom utility
                                            classes.</p>
                                        <p class="mb-0">Before working
                                            with this theme,
                                            you should become
                                            familiar with the
                                            Bootstrap framework,
                                            especially the
                                            utility classes.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end
                        your current
                        session.</div>
                    <div class="modal-footer">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" type="button">Logout</button>
                            {{-- <button type="submit" class="nav-link px-3 bg-dark border-0">Logout<span
                                    data-feather="log-out"></span></button>
                            --}}
                            {{-- <a class="btn btn-primary" href="/public/logout" method="post">Logout</a>
                            --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
@endsection
