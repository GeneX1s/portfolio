<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
{{--

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="../../use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head> --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Roemah Yoga Rian</title>
    <meta name="description"
        content="Official website for Roemah Yoga Rian, which is a yoga studio situated in Central jakarta | Jakarta Pusat. Has Hatha, Power, and Ashtanga Yoga classes.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <link rel="stylesheet" href="/../../portfolio2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/../../portfolio2/css/font-awesome.min.css">
    <link rel="stylesheet" href="/../../portfolio2/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="/../../portfolio2/css/slick.css">
    <link rel="stylesheet" href="/../../portfolio2/style.css">
    <link rel="stylesheet" href="/../../portfolio2/style/blogstyle.css">
    <link rel="stylesheet" href="/../../portfolio2/css/responsive.css">




    <script src="/../../portfolio2/js/vendor/modernizr-3.11.2.min.js" defer></script>


</head>

<body>
    <!-- Header Area Start -->
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
                                        <li><a href="ryr/class">classes</a></li>
                                        <li><a href="ryr/gallery">gallery</a></li>
                                        <li><a href="ryr/blog">blog</a></li>
                                        @if (auth()->check())

                                        <li>
                                            <a href="#">Account</a>
                                            <ul class="dropdown">
                                                <li><a href="/dashboard">Dashboard</a></li>
                                                <li>
                                                    <a href="/logout"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                        @else
                                        <li><a href="/dashboard">Login</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu d-block d-lg-none"></div>
                            <!-- Main Menu End -->
                        </div>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block">
                        @if (auth()->check())
                        <div class="header-contact text-end">
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="banner-btn" data-text="sign out" href="/logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>logout</span>
                            </a>
                        </div>
                        @else
                        <div class="header-contact text-end">
                            <a class="banner-btn" data-text="dashboard" href="/dashboard"><span>login</span></a>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Page Header-->
    <header class="masthead"
        style="background-image: url('{{ asset('portfolio2/img/assets/img/post-bg.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $blog->title }}</h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">{{ $blog->author }}</a>
                            on {{ $blog->created_at }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>{{ $blog->body }}</p>
                    <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no
                        turning back from science. The early warnings about technological dangers also come from
                        science.</p>
                    <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that
                        they set eye on the earth.</p>
                    <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become
                        her protectors rather than her violators. That's how I felt seeing the Earth for the first time.
                        I could not help but love and cherish her.</p>
                    <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who
                        will, the experience most certainly changes your perspective. The things that we share in our
                        world are far more valuable than those which divide us.</p>
                    <h2 class="section-heading">The Final Frontier</h2>
                    <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally,
                        it is a task to occupy the generations. And no matter how much progress one makes, there is
                        always the thrill of just beginning.</p>
                    <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally,
                        it is a task to occupy the generations. And no matter how much progress one makes, there is
                        always the thrill of just beginning.</p>
                    <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of
                        tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet
                        far too little for the next ten.</blockquote>
                    <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is
                        a historical process which mankind is carrying out in accordance with the natural laws of human
                        development.</p>
                    <h2 class="section-heading">Reaching for the Stars</h2>
                    <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the
                        size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked
                        so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart.
                        Seeing this has to change a man.</p>
                    <a href="#!"><img class="img-fluid" src="/portfolio2/img/assets/img/post-sample-image.jpg"
                            alt="..." /></a>
                    <span class="caption text-muted">To go places and do things that have never been done before –
                        that’s what living is all about.</span>
                    <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year
                        mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go
                        where no man has gone before.</p>
                    <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a
                        fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>
                    <p>
                        Placeholder text by
                        <a href="http://spaceipsum.com/">Space Ipsum</a>
                        &middot; Images by
                        <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                    </p>
                </div>
            </div>
        </div>
    </article>
    <!-- Footer Area Start -->
    <footer class="footer-area bg-gray">
        <div class="footer-widget-area bg-3 pt-98 pb-90 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-footer-widget">
                            <a href="/portfolio"><img src="/../../portfolio2//img/logo/logo.webp"
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