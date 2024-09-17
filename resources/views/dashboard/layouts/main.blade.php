<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../../dasbor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../dasbor/css/sb-admin-2.min.css" rel="stylesheet">


  <style>
    .wrapper {
      display: flex;
    }

    .sidebar {
      width: 150px;
      /* Adjust the width as needed */
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      padding: 20px;
      /* Sidebar takes full height of the viewport */
      overflow-y: auto;
      /* Enable scrolling for the sidebar if it's taller than the viewport */
      z-index: 1000;
      /* Ensures the sidebar appears above other content */
      background-color: #fff;
      /* Optional: set background color to ensure visibility */
    }

    /* For WebKit browsers (Chrome, Safari) */
    .sidebar::-webkit-scrollbar {
      display: none;
      /* Hides the scrollbar */
    }

    /* For Firefox */
    .sidebar {
      scrollbar-width: none;
      /* Hides scrollbar in Firefox */
    }

    /* For Edge (support for scrollbar-color) */
    .sidebar {
      -ms-overflow-style: none;
      /* Hides scrollbar in older Edge versions */
    }


    .content {
      /* width: 50%; */
      margin-left: 200px;
      /* Ensure content is pushed to the right of the sidebar */
      padding-left: 1rem;
      /* Optional: add padding to the left of the content */
      padding: 20px;
      /* Ensure that content does not overlap the sidebar */
      z-index: 1;
      /* Content has a lower z-index than the sidebar */
      /* Remove any conflicting position properties */
    }

    /* .container,
    .container-md,
    .container-sm {
      max-width: unset !important;
    } */

    /* Override default container max-width to make them full-width */
.container,
.container-sm,
.container-md,
.container-lg,
.container-xl {
    width: 100%; /* Ensure container spans full width */
    padding-right: .75rem; /* Add padding as needed */
    padding-left: .75rem; /* Add padding as needed */
    margin-right: auto; /* Center the container horizontally */
    margin-left: auto; /* Center the container horizontally */
    overflow: visible; /* Ensure that content is not clipped */
}

/* Ensure .container-fluid spans the full viewport width */
.container-fluid {
    width: 100%; /* Full width container */
    padding-right: .75rem; /* Padding as needed */
    padding-left: .75rem; /* Padding as needed */
    overflow: visible; /* Ensure that content is not clipped */

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
<script src="../../../dasbor/vendor/jquery/jquery.min.js"></script>
<script src="../../../dasbor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/dasbor/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../dasbor/js/sb-admin-2.min.js"></script>

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