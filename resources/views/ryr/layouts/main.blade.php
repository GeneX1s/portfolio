<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Roemah Yoga Rian</title>
    <meta name="description" content="The template is built for Sport Clubs, Health Clubs, Gyms, Fitness Centers, Personal Trainers and other sport">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <style>
        .top {
            max-width: unset !important;
        }
        .slider-area {
            max-width: unset !important;
        }

        .container {
            max-width: unset !important;
            display: none ;
        }
    </style>
    <!-- Preload CSS for faster rendering -->
    <link rel="preload" href="/../../portfolio2/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="/../../portfolio2/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="/../../portfolio2/css/shortcode/shortcodes.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="/../../portfolio2/css/slick.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="/../../portfolio2/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="/../../portfolio2/css/responsive.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <!-- Fallback for browsers without JS -->
    <noscript>
        <link rel="stylesheet" href="/../../portfolio2/css/bootstrap.min.css">
        <link rel="stylesheet" href="/../../portfolio2/css/font-awesome.min.css">
        <link rel="stylesheet" href="/../../portfolio2/css/shortcode/shortcodes.css">
        <link rel="stylesheet" href="/../../portfolio2/css/slick.css">
        <link rel="stylesheet" href="/../../portfolio2/style.css" media="all" !important>
        <link rel="stylesheet" href="/../../portfolio2/css/responsive.css">
    </noscript>


    <style>
        .container {
            display: block !important;
        }
    </style>
    <!-- Modernizr for feature detection -->
    <script src="/../../portfolio2/js/vendor/modernizr-3.11.2.min.js"></script>

    <!-- Inline style to fix width constraints -->

</head>


<body>
    <header>
        @include('ryr.layouts.header')
    </header>

    <main>
        @yield('container')
    </main>

    <footer>
        @include('ryr.layouts.footer')
    </footer>

    <script src="{{ asset('portfolio2/js/vendor/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/vendor/jquery-migrate-3.3.2.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/jquery.meanmenu.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/ajax-mail.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/jquery.ajaxchimp.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/slick.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/jquery.magnific-popup.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/plugins.js') }}" defer></script>
    <script src="{{ asset('portfolio2/js/main.js') }}" defer></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.content').style.display = 'block';
        });
    </script>
</body>
</html>
