<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
  <meta name="viewport" content="width=1024, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../../../dasbor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../../dasbor/css/sb-admin-2.min.css" rel="stylesheet">


<style>
    /* Base styling */
    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Ensure full height for body */
    }

    .wrapper {
    display: flex; /* Use flexbox for layout */
    }

    /* Sidebar styling */
    .sidebar {
    /* width: 270px !important; Fixed width for the sidebar */
    width: 300px; /* Fixed width for the sidebar */
    height: 100vh; /* Full height for the sidebar */
    top: 0; /* Align to the top */
    left: 0; /* Align to the left */
    overflow-y: auto; /* Enable scrolling if content overflows */
    overflow: visible;
    background-color: #f8f9fa; /* Background color */
    transition: width 0.3s; /* Smooth transition for resizing */
    position: fixed; /* Center vertically */

    }


    /* Content styling */
    .content {
    margin-left: 300px; Leave space for sidebar
    padding: 20px; /* Padding for content */
    flex-grow: 1; /* Allow content to fill available space */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
    .sidebar {
        position: fixed; /* Change to relative on mobile */
        height: auto; /* Allow height to adjust */
        width: 100%; /* Full width on mobile */
        display: block !important; /* Ensure sidebar is shown */;
        z-index: 1000; /* Ensures sidebar is on top */
        align-content: center;

        overflow-y: auto; /* Enable scrolling if content overflows */
    overflow: visible;
    background-color: #f8f9fa; /* Background color */
    transition: width 0.3s; /* Smooth transition for resizing */

    }

    .topbar {
        z-index: 1001;          /* Ensures it stays on top of other content */
        position: fixed;        /* Makes the topbar stay fixed when scrolling */
        top: 0;                 /* Position it at the top of the page */
        left: 0;                /* Align it to the left of the page */
        width: 100%;            /* Make it span the full width of the page */
        margin-bottom: 10%
    }

    /* Ensure the sidebar doesn't collapse immediately on small screens */
    .sidebar.toggled {
        display: none !important;
    }
    .wrapper {
        flex-direction: column; /* Stack items on top of each other */
    }

    .content {
        margin-left: 400px; /* Remove left margin */
        padding: 10px; /* Reduce padding on mobile */
    }

    .sidebar.active {
        display: block; /* Show sidebar when active */
    }
    }

  </style>

{{-- <p class="d-none d-md-block">Visible on medium screens and up</p> --}}
{{-- <p class="d-block d-md-none">Visible on small screens</p> --}}

</head>


<body>
  <div class="wrapper">
    @auth
    <div class="sidebar">
      @include('dashboard.layouts.sidebar')
    </div>
    @endauth
    <div class="content">
      <div class="container-fluid">
        @yield('container')
        <style>
            .container, .container-md, .container-sm {
                max-width: unset !important;
            }
            </style>
      </div>
    </div>
  </div>
</body>


<!-- Footer -->
{{-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; NOD 2023</span>
    </div>
  </div>
</footer> --}}
<!-- End of Footer -->



<!-- Bootstrap core JavaScript-->
<script src="../../../../dasbor/vendor/jquery/jquery.min.js"></script>
<script src="../../../../dasbor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/dasbor/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../../dasbor/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/dasbor/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/dasbor/js/demo/chart-area-demo.js"></script>
<script src="/dasbor/js/demo/chart-pie-demo.js"></script>

<script>
  // Get the sidebar element
const sidebar = document.querySelector('.sidebar');

// Function to handle scroll event
const handleScroll = () => {
    // Get the current scroll position
    const scrollY = window.scrollY || window.pageYOffset;

    // Set the top position of the sidebar based on the scroll position
    sidebar.style.top = `${scrollY}px`;
};

// Add scroll event listener to window
window.addEventListener('scroll', handleScroll);
</script>
