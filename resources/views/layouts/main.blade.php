<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nicholas Owen- Portfolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Nicholas Owen- Portfolio" />
  <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Unique, portfolio" />
  <meta name="author" content="lmtheme" />
  {{-- <link rel="shortcut icon" href="/public/images/favicon.ico"> --}}

  <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

  <link rel="stylesheet" href="/public/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="/public/css/normalize.css" type="text/css">
  <link rel="stylesheet" href="/public/css/animate.css" type="text/css">
  <link rel="stylesheet" href="/public/css/transition-animations.css" type="text/css">
  <link rel="stylesheet" href="/public/css/jquery.mCustomScrollbar.min.css" type="text/css">
  <link rel="stylesheet" href="/public/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="/public/css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="/public/css/main-red.css" type="text/css">
  <link rel="stylesheet" href="/public/css/pe-icon-7-stroke.css" type="text/css">


  <!-- This styles needs for demo -->
  <link rel="stylesheet" href="/public/css/lmpixels-demo-panel.css" type="text/css">
  <!-- /This styles needs for demo -->

  <script>
    (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-96534204-1', 'auto');
    ga('send', 'pageview');

  </script>

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/modernizr.custom.js"></script>
</head>

<body>



  <div class="container">
    @yield('container')
    <style>
      .container,
      .container-md,
      .container-sm {
        max-width: unset !important;
      }
    </style>
    {{-- yield container supaya bisa dipanggil dari child class(page lain) --}}
  </div>

  <script data-cfasync="false" src="js/email-decode.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/pages-switcher.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/validator.js"></script>
  <script src="js/jquery.shuffle.min.js"></script>
  <script src="js/masonry.pkgd.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/tilt.jquery.min.js"></script>
  <script src="js/jquery.hoverdir.js"></script>
  <script src="js/main.js"></script>

  <!-- Demo Color changer Script -->
  <script src="js/lmpixels-demo-panel.js"></script>
  <!-- /Demo Color changer Script -->
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
    integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
    data-cf-beacon='{"rayId":"8674ae701eb568d6","version":"2024.3.0","r":1,"token":"94b99c0576dc45bf9d669fb5e9256829","b":1}'
    crossorigin="anonymous"></script>

</body>
<footer>
  {{-- @include('layouts.footer') --}}
</footer>

</html>
