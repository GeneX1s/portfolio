{{-- @extends('ryr.layouts.main') --}}

<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="portfolio2/css/bootstrap.min.css">
    <link rel="stylesheet" href="portfolio2/css/font-awesome.min.css">
    <link rel="stylesheet" href="portfolio2/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="portfolio2/css/slick.css">
    <link rel="stylesheet" href="portfolio2/style.css">
    <link rel="stylesheet" href="portfolio2/css/responsive.css">




    <script src="portfolio2/js/vendor/modernizr-3.11.2.min.js" defer></script>


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
                                        <li><a href="ryr/about-us">About us</a></li>
                                        <li><a href="ryr/class">classes</a></li>
                                        <li><a href="ryr/gallery">gallery</a></li>
                                        <li><a href="ryr/blog">blog</a></li>
                                        <li><a href="ryr/contact">Contact</a></li>
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
    <!-- Background Area Start -->
    <div class="slider-area">
        <div class="slider-wrapper">
            <div class="single-slide" style="background-image: url('portfolio2/img/slider/slider1.webp');">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text-content-wrapper">
                                    <div class="text-content text-start">
                                        <h5>Welcome to Roemah Yoga Rian</h5>
                                        <h1>Keep Your Body <span>Strengthened & Refreshed</span></h1>
                                        <p>Discover the power of yoga to transform your mind, body, and spirit in a
                                            welcoming and peaceful environment.</p>
                                        <a class="banner-btn" href="/ryr/gallery" data-text="read more"><span>read
                                                more</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide" style="background-image: url('portfolio2/img/slider/slider2.webp');">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text-content-wrapper">
                                    <div class="text-content text-start">
                                        <h5>Welcome to Roemah Yoga Rian</h5>
                                        <h1><span>Revitalize</span> Your Body & Build <span>Resilience</span></h1>
                                        <p>Uncover the benefits of yoga to nurture your body, calm your mind, and
                                            rejuvenate your spirit in a supportive and serene space.</p>

                                        <a class="banner-btn" href="/ryr/gallery" data-text="read more"><span>read
                                                more</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Background Area End -->
    <!-- About Start -->
    <section class="about-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>about Roemah Yoga Rian</h2>
                        <p class="m-0">Welcome to Roemah Yoga Rian, your serene space to explore the transformative
                            power of yoga. Our studio offers a variety of yoga styles designed to promote physical
                            strength, mental clarity, and emotional balance. Whether you're a beginner or an advanced
                            practitioner, our experienced instructors guide you through each session with personalized
                            attention, ensuring you deepen your practice at your own pace.</p>
                        <p>
                            We believe that yoga is not just a workout, but a holistic approach to wellness that
                            nurtures the mind, body, and spirit. Join us for our calming and invigorating classes,
                            including Vinyasa, Hatha, Yin, and Restorative Yoga, all set in a peaceful and welcoming
                            environment.
                        </p>
                        <p>
                            At Roemah Yoga Rian, we aim to create a community where individuals can cultivate
                            mindfulness, reduce stress, and enhance overall well-being. Take your first step towards a
                            healthier lifestyle today!</p>
                        <a class="banner-btn" href="ryr/about-us" data-text="read more"><span>read more</span></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-video active">
                        <div class="game">
                            <a href="#"><img src="portfolio2/img/about/about.webp" alt="about"></a>
                        </div>
                        <div class="video-icon video-hover">
                            {{-- <a class="video-popup" href="https://www.youtube.com/watch?v=A47zwWsjXgs"> --}}
                                {{-- format nya : https://www.youtube.com/watch?v={link video} --}}
                                <a class="video-popup" href="https://www.youtube.com/watch?v=zh7_MuszLhE">
                                    <i class="zmdi zmdi-play"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome End -->
    <!-- Classes Start -->
    <section class="class-area fix bg-gray pb-100 pt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>our classes</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            issss has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p> --}}
                        <p>Here are a list of our variety of classes in Roemah Yoga Rian. Feel free to try out all our
                            classes!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($classes as $class)
                <div class="col-lg-4 col-md-6">

                    <div class="single-class">
                        <div class="single-img">
                            <a href="/ryr/class"><img src="{{ asset('storage/' . $class->foto) }}" alt="class" style="width: 370px; height: 207px;"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="{{ asset('storage/' . $class->foto) }}" style="width: 370px; height: 207px;">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="/ryr/class">{{ $class->nama_kelas }}</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>{{ $class->teacher }}</li>
                                <li><i class="zmdi zmdi-alarm"></i>{{ $class->schedule }}</li>
                                <li><i class="zmdi zmdi-calendar"></i>{{ $class->day }}</li>
                            </ul>
                        </div>
                    </div>

                </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="single-class">
                        <div class="single-img">
                            <a href="/ryr/class"><img src="portfolio2/img/class/2.webp" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="portfolio2/img/class/2.webp">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="/ryr/class">Power Yoga</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>Aan</li>
                                <li><i class="zmdi zmdi-alarm"></i>Tuesday Morning</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="single-class">
                        <div class="single-img">
                            <a href="/ryr/class"><img src="portfolio2/img/class/3.webp" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="portfolio2/img/class/3.webp">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="/ryr/class">Wallrope Yoga</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>Rian</li>
                                <li><i class="zmdi zmdi-alarm"></i>Mon, Tue, Thu, Fri</li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a class="banner-btn mt-55" href="/ryr/class" data-text="view all classes"><span>view all
                            classes</span></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Area End -->
    <!-- Schedule Area Strat -->
    <section class="schedule-area pt-85 pb-90 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title">
                        <h2>class schedule</h2>
                        <p>Check out our weekly class schedule to find the perfect time for your yoga practice. We offer
                            a variety of classes throughout the week to fit your busy lifestyle.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="scehedule-table table-content table-responsive text-center">
                        <table>
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>saturday</th>
                                    <th>sunday</th>
                                    <th>monday</th>
                                    <th>tuesday</th>
                                    <th>wednesday</th>
                                    <th>thursday</th>
                                    <th>friday</th>
                                </tr>
                            </thead>
                            @php
                            $days = ['Sabtu', 'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                            $colors = ['purple', 'olive', 'blue', 'pink', 'red', 'green', 'teal', 'cyan', 'indigo',
                            'brown','yellow', 'orange',];
                            @endphp

                            <tbody class="pt-30">
                                @php
                                $sortedSchedules = $schedules->sortBy(function($schedule) {
                                return strtotime($schedule);
                                });
                                @endphp
                                @foreach ($sortedSchedules as $schedule)
                                <tr>
                                    <td class="time">
                                        <p>{{ $schedule }}</p>
                                    </td>
                                    @foreach ($days as $key => $day)
                                    @php
                                    $class = $classes->firstWhere('schedule', $schedule)->firstWhere('day', $day);
                                    @endphp
                                    @if($class)
                                    <td class="{{ $colors[$key] }}">
                                        <h4>{{ $class['nama_kelas'] }}</h4>
                                        <p>{{$class['teacher']}}</p>
                                        <p>Details..</p>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>

                            {{-- bg colors --}}
                            {{--
                            {background:#b2a1c7}td.olive{background:#c2d69b}td.blue{background:#9cf}td.pink{background:#ff91b8}td.red{background:#ff6666}td.yellow{background:#ffeb3b}td.orange{background:#ff9800}td.green{background:#4caf50}td.teal{background:#009688}td.cyan{background:#00bcd4}td.indigo{background:#3f51b5}td.brown{background:#795548}.
                            --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Schedule Area End -->
    <!-- Trainer Area Start -->
    <div class="trainer-area pt-90 pb-100 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>teachers</h2>
                        <p>Our experienced and passionate yoga instructors are dedicated to guiding you on your journey
                            toward physical and mental well-being. With diverse expertise in various yoga styles, they
                            create a supportive environment where every student can thrive and grow in their practice.
                        </p>
                    </div>
                </div>

                @foreach ($teachers as $index => $teacher)
                    @if ($index < 3)
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer text-center">
                        <img src="{{ asset('storage/' . $teacher->foto) }}" alt="trainer" style="width: 370px; height: 345px;">
                        <div class="trainer-hover">
                            <h3>{{ $teacher->nama }}</h3>
                            <ul>
                                <li><a href="{{ $teacher->fb }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $teacher->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $teacher->insta }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

                {{-- <div class="col-lg-4 col-md-6">
                    <div class="single-trainer text-center">
                        <img src="portfolio2/img/trainer/trainer1.webp" alt="trainer">
                        <div class="trainer-hover">
                            <h3>Okta</h3>
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer text-center">
                        <img src="portfolio2/img/trainer/trainer2.webp" alt="trainer">
                        <div class="trainer-hover">
                            <h3>Agung</h3>
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="single-trainer text-center">
                        <img src="portfolio2/img/trainer/trainer3.webp" alt="trainer">
                        <div class="trainer-hover">
                            <h3>Rian</h3>
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Trainer Area End -->
    <!-- Gallery Area Start -->
    <section class="gallery-area pt-90 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="test-content">
                        <div class="section-title text-center">
                            <h2>gallery</h2>
                            <p>Explore our gallery to see the vibrant moments captured at Roemah Yoga Rian. From serene
                                yoga sessions to community events, our gallery showcases the essence of our studio and
                                the joy of our members.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid row" style="position: relative; height: 390px;">
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="portfolio2/img/portfolio/gal.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="portfolio2/img/portfolio/gal.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2 cat4" style="position: absolute; left: 25%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="portfolio2/img/portfolio/gal2.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="portfolio2/img/portfolio/gal2.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat4" style="position: absolute; left: 50%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="portfolio2/img/portfolio/gal3.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="portfolio2/img/portfolio/gal3.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2" style="position: absolute; left: 75%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="portfolio2/img/portfolio/gal4.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="portfolio2/img/portfolio/gal4.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2 cat3" style="position: absolute; left: 25%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="portfolio2/img/portfolio/gal5.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="portfolio2/img/portfolio/gal5.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="portfolio2/img/portfolio/gal6.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="portfolio2/img/portfolio/gal6.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Area End -->
    <!-- Event Area Start -->
    <section class="event-area pt-95 pb-100 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>awesome events</h2>
                        <p>Join us for our exciting events that celebrate the spirit of yoga and community. From
                            workshops to special classes, there's always something happening at Roemah Yoga Rian. Stay
                            tuned for our upcoming events and be a part of our vibrant community.</p>
                    </div>
                    <div class="event-wrapper">
                        <div class="event-content text-center">
                            <h3>Christmas in RYR</h3>
                            <p>Join us for a festive Potluck Christmas event! Bring your favorite dish to share and
                                enjoy a joyful celebration with our yoga community.</p>
                            <h4>25 December 2023</h4>
                            <h5>08PM - 09PM</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Area End -->
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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-blog">
                            <div class="blog-pic single-img">
                                <img src="portfolio2/img/blog/blog1.webp" alt="blog">
                                <div class="gallery-icon">
                                    <a href="/ryr/blog">
                                        <i class="zmdi zmdi-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3><a href="/ryr/blog">The Importance of Consistent Yoga Practice</a></h3>
                                <h6>15 September 2023</h6>
                                <p>Learn how maintaining a regular yoga practice can enhance your physical health,
                                    mental clarity, and overall well-being. Discover tips for staying consistent and
                                    motivated in your yoga journey.</p>
                                <a href="/ryr/blog">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="single-blog">
                            <div class="blog-pic single-img">
                                <img src="portfolio2/img/blog/blog2.webp" alt="blog">
                                <div class="gallery-icon">
                                    <a href="/ryr/blog">
                                        <i class="zmdi zmdi-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3><a href="/ryr/blog">The Benefits of Yoga for Mental Health</a></h3>
                                <h6>10 October 2023</h6>
                                <p>Explore how yoga can help reduce stress, improve mood, and enhance overall mental
                                    well-being. Join us as we delve into the mental health benefits of a regular yoga
                                    practice.</p>
                                <a href="/ryr/blog">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Event Area End -->
    <!-- Pricing Area Start -->
    {{-- <div class="pricing-area pt-95 pb-120 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>pricing table</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-table text-center">
                        <div class="table-head">
                            <h2>silver package</h2>
                            <h1>$30<span>/month</span></h1>
                        </div>
                        <div class="table-body">
                            <ul>
                                <li>Free T-Shirt & swags</li>
                                <li>Free of all message treatments</li>
                                <li>Access Clup Facilites</li>
                                <li>Out Door activites</li>
                            </ul>
                            <a href="#">get started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-table text-center">
                        <div class="table-head">
                            <h2>gold package</h2>
                            <h1>$50<span>/month</span></h1>
                        </div>
                        <div class="table-body">
                            <ul>
                                <li>Free T-Shirt & swags</li>
                                <li>Free of all message treatments</li>
                                <li>Access Clup Facilites</li>
                                <li>Out Door activites</li>
                            </ul>
                            <a href="#">get started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                    <div class="single-table text-center">
                        <div class="table-head">
                            <h2>platinum package</h2>
                            <h1>$70<span>/month</span></h1>
                        </div>
                        <div class="table-body">
                            <ul>
                                <li>Free T-Shirt & swags</li>
                                <li>Free of all message treatments</li>
                                <li>Access Clup Facilites</li>
                                <li>Out Door activites</li>
                            </ul>
                            <a href="#">get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Pricing Area End -->
    <!-- Client Area Strat -->
    <section class="client-area pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>Our Client Say</h2>
                        <p>They love the peaceful and welcoming environment at Roemah Yoga Rian. They appreciate the
                            personalized attention from our experienced instructors and the variety of classes that
                            cater to all levels. Join our community and experience the transformative power of yoga.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-xl-1 offset-lg-1">
                    <div class="row">
                        <div class="testimonial-owl">
                            <div class="col-12">
                                <div class="single-testimonial">
                                    <i class="zmdi zmdi-quote"></i>
                                    <p>Roemah Yoga Rian is a place where we believe in the power of yoga to transform
                                        lives. Our dedicated instructors and welcoming community make it a special place
                                        to practice and grow. Join us and experience the benefits of yoga for yourself.
                                    </p>
                                    <h4 style="font-family: 'Great Vibes', cursive;">Rian</h4>
                                    {{-- <img src="portfolio2/img/icon/signature.webp" alt="signature"> --}}
                                    <h6>Founder</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-testimonial">
                                    <p>Roemah Yoga Rian is life changing. The instructors are incredibly knowledgeable
                                        and supportive, and the classes are both challenging and rejuvenating. I highly
                                        recommend this studio to anyone looking to deepen their yoga practice.</p>
                                    <h4 style="font-family: 'Great Vibes', cursive;">Owen</h4>
                                    {{-- <img src="portfolio2/img/icon/signature.webp" alt="signature"> --}}
                                    <h6>Co-Founder</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-testimonial">
                                    <i class="zmdi zmdi-quote"></i>
                                    <p>Roemah Yoga Rian is life changing. The instructors are incredibly knowledgeable
                                        and supportive, and the classes are both challenging and rejuvenating. I highly
                                        recommend this studio to anyone looking to deepen their yoga practice.</p>
                                    <h4 style="font-family: 'Great Vibes', cursive;">Owen</h4>
                                    {{-- <img src="portfolio2/img/icon/signature.webp" alt="signature"> --}}
                                    <h6>Co-Founder</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-testimonial">
                                    <i class="zmdi zmdi-quote"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just.
                                        Aliquam vitae purus vel
                                        odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu
                                        lacinia congue.
                                        Vestibulum sodales, sapien aliquam </p>
                                    <img src="portfolio2/img/icon/signature.webp" alt="signature">
                                    <h6>Co-Founder Of Company</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="single-testimonial">
                                    <i class="zmdi zmdi-quote"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just.
                                        Aliquam vitae purus vel
                                        odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu
                                        lacinia congue.
                                        Vestibulum sodales, sapien aliquam </p>
                                    <img src="portfolio2/img/icon/signature.webp" alt="signature">
                                    <h6>Co-Founder Of Company</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Area End -->
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
                            <a href="/portfolio"><img src="portfolio2//img/logo/logo.webp" alt="handstand"></a>
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

                            @if ($submitCount < 2)
                            <form method="post" action="/dashboard/contactus">
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/meanmenu@2.0.8/dist/jquery.meanmenu.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajaxchimp@1.3.0/jquery.ajaxchimp.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/imagesloaded@4.1.4/imagesloaded.pkgd.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/isotope-layout@4.5.4/dist/isotope.pkgd.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" defer>
    </script>

    <script src="js/ajax-mail.js" defer></script> <!-- No CDN available, keep local -->
    <script src="js/plugins.js" defer></script> <!-- No CDN available, keep local -->
    <script src="js/main.js" defer></script> <!-- No CDN available, keep local --> --}}

    <script src="portfolio2/js/vendor/jquery-3.6.0.min.js" defer></script>
    <script src="portfolio2/js/vendor/jquery-migrate-3.3.2.min.js" defer></script>
    <script src="portfolio2/js/bootstrap.bundle.min.js" defer></script>
    <script src="portfolio2/js/owl.carousel.min.js" defer></script>
    <script src="portfolio2/js/jquery.meanmenu.js" defer></script>
    <script src="portfolio2/js/ajax-mail.js" defer></script>
    <script src="portfolio2/js/jquery.ajaxchimp.min.js" defer></script>
    <script src="portfolio2/js/slick.min.js" defer></script>
    <script src="portfolio2/js/imagesloaded.pkgd.min.js" defer></script>
    <script src="portfolio2/js/isotope.pkgd.min.js" defer></script>
    <script src="portfolio2/js/jquery.magnific-popup.js" defer></script>
    <script src="portfolio2/js/plugins.js" defer></script>
    <script src="portfolio2/js/main.js" defer></script>
</body>


</html>
