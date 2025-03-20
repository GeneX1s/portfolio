<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog || Roemah Yoga Rian</title>
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
<header class="top">
    <div class="header-area ptb-18 header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="/"><img src="portfolio2//img/logo/logo.webp" alt="COFFEE" /></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="content-wrapper">
                        <!-- Main Menu Start -->
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    {{-- <li><a href="ryr/about-us">About us</a></li> --}}
                                    <li><a href="/ryr/class">classes</a></li>
                                    <li><a href="/ryr/gallery">gallery</a></li>
                                    <li><a href="/ryr/blog">blog</a></li>
                                    {{-- <li><a href="ryr/contact">Contact</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu d-block d-lg-none"></div>
                        <!-- Main Menu End -->
                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="header-contact text-end">
                        <a class="banner-btn" data-text="dashboard" href="dashboard"><span>login</span></a>
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
                            <h2>blog</h2>
                            <div class="banner-breadcrumb">
                                <ul>
                                    <li><a href="/">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                    <li>blog</li>
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
        <a href="{{ route('blog.create') }}" class="default-btn"
            style="background-color: #5fc7ae; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
            Add New Item
        </a>
    </div>
    @endif

    <!-- Blog Area Start -->
    <section class="blog-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>our blog</h2>
                        <p>Stay updated with our latest blog posts and insights on yoga, wellness, and healthy living.
                            Our blog is a great resource for tips, inspiration, and information to support your yoga
                            journey.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-6">
                    <div class="single-blog">
                        <div class="blog-pic single-img">
                            <img src="{{ $blog->foto }}" alt="goblog">
                            <div class="gallery-icon">
                                <a href="/ryr/blog-detail/{{ $blog->id }}">
                                    <i class="zmdi zmdi-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3><a href="/ryr/blog-detail/{{ $blog->id }}">{{ $blog->title }}</a></h3>
                            <h6>{{ $blog->updated_at }}</h6>
                            <p>{{$blog->body}}</p>
                            <a href="/ryr/blog-detail/{{ $blog->id }}">read more</a>
                        </div>
                    </div>
                </div>

                @endforeach
                {{-- <div class="col-lg-6">
                    <div class="single-blog">
                        <div class="blog-pic single-img">
                            <img src="img/blog/blog1.webp" alt="blog">
                            <div class="gallery-icon">
                                <a href="/ryr/blog-detail">
                                    <i class="zmdi zmdi-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3><a href="/ryr/blog-detail">Curabitur ante justo, vitae.</a></h3>
                            <h6>25 March 2021</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut nisl non justo aliquam
                                euismod ut ac orci.</p>
                            <a href="/ryr/blog-detail">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="single-blog">
                        <div class="blog-pic single-img">
                            <img src="img/blog/blog2.webp" alt="blog">
                            <div class="gallery-icon">
                                <a href="/ryr/blog-detail">
                                    <i class="zmdi zmdi-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3><a href="/ryr/blog-detail">Curabitur ante justo, vitae.</a></h3>
                            <h6>25 March 2021</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut nisl non justo aliquam
                                euismod ut ac orci.</p>
                            <a href="/ryr/blog-detail">read more</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Blog Area End -->
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
                            <a href="/portfolio"><img src="/../../portfolio2/img/logo/logo.webp" alt="Roemah Yoga Rian"></a>
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

<!-- Mirrored from htmldemo.net/Roemah Yoga Rian/Roemah Yoga Rian//ryr/blog-detail by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 01:57:36 GMT -->

</html>
