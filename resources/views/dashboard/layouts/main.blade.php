<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Genexyz | Dashboard &amp; My Website</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <link rel="apple-touch-icon" sizes="180x180" href="../../../../dasbor/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../../../dasbor/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../../../dasbor/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="../../../../dasbor/img/favicons/favicon.ico">
  <link rel="manifest" href="../../../../dasbor/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="../../../../dasbor/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <script src="../../../../dasbor/js/config.js"></script>
  <script src="../../../../dasbor/vendors/simplebar/simplebar.min.js"></script>

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.gstatic.com/">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">
  <link href="../../../../dasbor/vendors/simplebar/simplebar.min.css" rel="stylesheet">
  <link href="../../../../dasbor/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
  <link href="../../../../dasbor/css/theme.min.css" rel="stylesheet" id="style-default">
  <link href="../../../../dasbor/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
  <link href="../../../../dasbor/css/user.min.css" rel="stylesheet" id="user-style-default">
  <script>
    var isRTL = JSON.parse(localStorage.getItem('isRTL'));
if (isRTL) {
  var linkDefault = document.getElementById('style-default');
  var userLinkDefault = document.getElementById('user-style-default');
  linkDefault.setAttribute('disabled', true);
  userLinkDefault.setAttribute('disabled', true);
  document.querySelector('html').setAttribute('dir', 'rtl');
} else {
  var linkRTL = document.getElementById('style-rtl');
  var userLinkRTL = document.getElementById('user-style-rtl');
  linkRTL.setAttribute('disabled', true);
  userLinkRTL.setAttribute('disabled', true);
}
  </script>


  <style>
    .wrapper {
      display: flex;
    }

    .sidebar {
      flex: 0 0 auto;
      /* Sidebar does not grow or shrink */
    }

    .content {
      flex: 1;
      /* Content area takes up remaining space */
    }

    .container,
    .container-md,
    .container-sm {
      max-width: unset !important;
    }

    .container,
    .container-fluid,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl {
      width: 100%;
      padding-right: .75rem;
      padding-left: .75rem;
      margin-right: auto;
      margin-left: auto;
    }

    /* .navbar-top {
  position: sticky;
  top: 0;
  font-size: .8333333333rem;
  font-weight: 600;
  margin-left: -1rem;
  margin-right: -1rem;
  z-index: 1020;
  background-image: none;
  min-height: var(--falcon-top-nav-height)
}

.navbar-top .navbar-nav-icons .dropdown-menu {
  position: absolute
}

.navbar-top .navbar-collapse {
  overflow: auto;
  max-height: calc(100vh - var(--falcon-top-nav-height));
  margin: 0 -0.75rem;
  padding: 0 .75rem;
  -webkit-box-flex: 1;
  -ms-flex: 1 0 100%;
  flex: 1 0 100%;
  -webkit-box-ordinal-group: 2;
  -ms-flex-order: 1;
  order: 1
}

.navbar-top .navbar-toggler {
  margin-left: -0.625rem
}

.navbar-top[data-navbar-top=combo] .navbar-collapse {
  width: auto
} */
  </style>



<body>
  <div class="wrapper">
    {{-- <div class="sidebar">
      @include('dashboard.layouts.sidebar')
    </div> --}}
    <div class="content">
      <div class="container">
        @yield('container')
      </div>
    </div>
  </div>
  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="../../../../dasbor/vendors/popper/popper.min.js"></script>
  <script src="../../../../dasbor/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="../../../../dasbor/vendors/anchorjs/anchor.min.js"></script>
  <script src="../../../../dasbor/vendors/is/is.min.js"></script>
  <script src="../../../../dasbor/vendors/echarts/echarts.min.js"></script>
  <script src="../../../../dasbor/vendors/fontawesome/all.min.js"></script>
  <script src="../../../../dasbor/vendors/lodash/lodash.min.js"></script>
  <script src="../../../../dasbor/js/polyfill.min58be.js?features=window.scroll"></script>
  <script src="../../../../dasbor/vendors/list.js/list.min.js"></script>
  <script src="../../../../dasbor/js/theme.js"></script>
</body>