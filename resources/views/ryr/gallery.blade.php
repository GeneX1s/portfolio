<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from htmldemo.net/Roemah Yoga Rian/Roemah Yoga Rian/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 01:57:36 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gallery || Roemah Yoga Rian</title>
    <meta name="description"
        content="The template is built for Sport Clubs, Health Clubs, Gyms, Fitness Centers, Personal Trainers and other sport">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">

    <link rel="stylesheet" href="../../portfolio2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../portfolio2/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../portfolio2/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="../../portfolio2/css/slick.css">
    <link rel="stylesheet" href="../../portfolio2/style.css">
    <link rel="stylesheet" href="../../portfolio2/css/responsive.css">
    <script src="../../portfolio2/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- Header Area Start -->
    <header class="top">
        <div class="header-area ptb-18 header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/"><img src="/../../portfolio2/img/logo/logo.webp" alt="gallery" /></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="content-wrapper">
                            <!-- Main Menu Start -->
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        {{-- <li><a href="/ryr/about-us">About us</a></li> --}}
                                        <li><a href="/ryr/class">classes</a></li>
                                        <li><a href="/ryr/gallery">gallery</a></li>
                                        <li><a href="/ryr/blog">blog</a></li>
                                        {{-- <li><a href="/ryr/contact">Contact</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu d-block d-lg-none"></div>
                            <!-- Main Menu End -->
                        </div>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block">
                        <div class="header-contact text-end">
                            <a class="banner-btn" data-text="dashboard" href="/dashboard"><span>login</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    <!-- Banner Area Start -->
    <section class="banner-area text-start">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-wrapper">
                        <div class="banner-content">
                            <h2>gallery</h2>
                            <div class="banner-breadcrumb">
                                <ul>
                                    <li><a href="/">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                    <li>gallery</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->
    @if (auth()->check())
    {{-- <div class="text-center"> --}}
        <div class="text-end" style="margin-right: 500px;">
        <a href="{{ route('gallery.create') }}" class="default-btn"
            style="background-color: #5fc7ae; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
            Add New Item
        </a>
    </div>
    @endif
    <!-- Gallery Area Start -->
    <section class="gallery-area pt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="test-content">
                        <div class="section-title text-center">
                            <h2>our gallery</h2>
                            <p>Explore our gallery to see the vibrant moments captured at Roemah Yoga Rian. From serene
                                yoga sessions to community events, our gallery showcases the essence of our studio and
                                the joy of our members.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid row" style="position: relative; height: 390px;">
                @foreach ($galleries as $gallery)

                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="portfolio-img single-img">
                        {{-- {{ dd($gallery->foto); }} --}}
                        {{-- <img src="/storage/portfolio2/img/gallery/7vpCijbQg7PyondJ2YxXMUzwzthz8fraA3r3A7VO.png"
                            alt="shola" style="width: 370px; height: 207px;"> --}}
                        @php
                        $url = "'/storage/'";
                        @endphp
                        <img src="{{'/' . 'storage/' . $gallery->foto }}" alt="shola"
                            style="width: 432px; height: 370px;">
                        <div class="gallery-icon">
                            <a class="image-popup" href="{{'/' . 'storage/' . $gallery->foto }}"
                                style="width: 740px; height: 414px;">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                        <div class="gallery-options" style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                            <button class="options-button-lg"
                                style="background: rgba(102, 162, 132, 0.7); border: none; color: white; cursor: pointer; font-size: 20px; padding: 10px 15px; border-radius: 50%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">
                                ...
                            </button>
                            <div class="options-menu"
                                style="display: none; position: absolute; top: 20px; right: 0; background: #f9f9f9; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 20; width: 200px;">

                                <a href="/gallery/{{ $gallery->id }}/edit"
                                    style="display: block; padding: 15px; font-size: 16px; color: #333; text-decoration: none; border-bottom: 1px solid #eee; transition: background 0.3s;">
                                    Edit
                                </a>

                                <form action="/gallery/{{$gallery->id}}" method="post" class="d-inline"
                                    style="margin: 0;">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        style="display: block; width: 100%; padding: 15px; font-size: 16px; background: none; border: none; color: #333; text-align: left; cursor: pointer; border-bottom: 1px solid #eee; transition: background 0.3s;"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>

                                <a style="display: block; padding: 15px; font-size: 16px; color: #333; text-decoration: none; transition: background 0.3s;">
                                    Set as
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                <script>
                    document.querySelectorAll('.options-button-lg').forEach(button => {
                        button.addEventListener('click', (event) => {
                            event.stopPropagation(); // Prevent click from propagating
                            const menu = button.nextElementSibling;
                            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
                        });
                    });

                    document.addEventListener('click', () => {
                        document.querySelectorAll('.options-menu').forEach(menu => {
                            menu.style.display = 'none'; // Close all dropdowns on outside click
                        });
                    });
                </script>

                {{-- <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2 cat4" style="position: absolute; left: 25%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal2.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal2.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat4" style="position: absolute; left: 50%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal3.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal3.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2" style="position: absolute; left: 75%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal4.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal4.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2 cat3" style="position: absolute; left: 25%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal5.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal5.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal6.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal6.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal7.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal7.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal8.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal8.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="/portfolio2/img/portfolio/gal9.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="/portfolio2/img/portfolio/gal9.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Gallery Area End -->
    <!-- Start of Map Area -->
    <div class="map-area">
        <!-- google-map-area start -->
        <div class="google-map-area">
            <!--  Map Section -->
            <div id="contacts" class="map-area">
                <iframe class="contact-map-size"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.6973113638185!2d106.83132382844991!3d-6.158974866248367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5c305a28127%3A0x87393457227b08c!2sRoemah%20Yoga%20Rian!5e0!3m2!1sen!2sid!4v1741074554055!5m2!1sen!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
    <!-- End of Map Area -->
    <!-- Newsletter Area Start -->
    <section class="newsletter-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="newsletter-wrapper fix">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="newsletter-content section-title text-center">
                            <h2>subscribe now for latest update!</h2>
                            <div class="newsletter-form">
                                <form action="#" id="mc-form" class="mc-form fix">
                                    <input id="mc-email" type="email" name="email" placeholder="Enter Your E-mail ID">
                                    <button id="mc-submit" type="submit" class="default-btn"
                                        data-text="submit"><span>submit</span></button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div>
                                <!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Area End -->
    <!-- Footer Area Start -->
    <footer class="footer-area bg-gray">
        <div class="footer-widget-area bg-3 pt-98 pb-90 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <a href="/portfolio"><img src="/../../portfolio2/img/logo/logo.webp"
                                    alt="Roemah Yoga Rian"></a>
                            <p>Contact us here, for further inquiries or questions.
                            </p>
                            <ul>
                                <li><i class="zmdi zmdi-email"></i> apriyanti_lesmana@gmail.com</li>
                                <li><i class="zmdi zmdi-phone"></i> (+62 812 8090 0988)</li>
                                <li><i class="zmdi zmdi-home"></i> Jl. Krekot Bunder 3 No.47 | Sawah Besar | Ps.Baru |
                                    Jakarta Pusat</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h3>Our Social Media</h3>
                            <ul class="social-icons">
                                <li><a
                                        href="https://www.facebook.com/people/Roemah-Yoga-Rian/pfbid021qFFWSgGsUgBWdks587Zr6U5yZqQmTXw4MzCW4j6HS8DsbpH4n6AzDA1qkx8S6tVl/"><i
                                            class="zmdi zmdi-facebook"></i>Facebook</a></li>
                                <li><a href="https://www.instagram.com/roemahyogarian47/"><i
                                            class="zmdi zmdi-instagram"></i>Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <h3>get in touch</h3>

                            @php
                            $submitCount = session('submit_count', 0);
                            @endphp

                            @if ($submitCount < 2) <form method="post" action="/dashboard/contactus">
                                @php
                                session(['submit_count' => $submitCount + 1]);
                                @endphp
                                @else
                                <p>You have reached the submission limit for this session.</p>
                                @endif

                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Name" name="name" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" placeholder="Email" name="email" required="required">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="7" name="message" placeholder="subject"></textarea>

                                        <button type="submit" class="button btn-send"
                                            onsubmit="return ('Thanks for reaching out!')">Submit </button>
                                        <p class="subscribe-message"></p>
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-text-area fix bg-coffee ptb-18">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-text text-center">
                            <span>Copyright &copy; <a href="/portfolio">Check out my other works!</a>
                                2022. All Rights Reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- All js here -->
    <script src="/../../portfolio2/js/vendor/jquery-3.6.0.min.js" defer></script>
    <script src="/../../portfolio2/js/vendor/jquery-migrate-3.3.2.min.js" defer></script>
    <script src="/../../portfolio2/js/bootstrap.bundle.min.js" defer></script>
    <script src="/../../portfolio2/js/owl.carousel.min.js" defer></script>
    <script src="/../../portfolio2/js/jquery.meanmenu.js" defer></script>
    <script src="/../../portfolio2/js/ajax-mail.js" defer></script>
    <script src="/../../portfolio2/js/jquery.ajaxchimp.min.js" defer></script>
    <script src="/../../portfolio2/js/slick.min.js" defer></script>
    <script src="/../../portfolio2/js/imagesloaded.pkgd.min.js" defer></script>
    <script src="/../../portfolio2/js/isotope.pkgd.min.js" defer></script>
    <script src="/../../portfolio2/js/jquery.magnific-popup.js" defer></script>
    <script src="/../../portfolio2/js/plugins.js" defer></script>
    <script src="/../../portfolio2/js/main.js" defer></script>
</body>

</html>
