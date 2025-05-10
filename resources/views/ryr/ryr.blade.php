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
                            <a class="banner-btn" data-text="login" href="/dashboard"><span>dashboard</span></a>
                        </div>

                        @endif
                    </div>
                    <div class="language-switcher text-end">
                        <form action="/setlanguage" method="POST">
                            @csrf
                            <button type="submit" name="language" value="en" class="btn btn-light">🇬🇧 EN</button>
                            <button type="submit" name="language" value="id" class="btn btn-light">🇮🇩 ID</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    <!-- Background Area Start -->
    <div class="slider-area">
        <div class="slider-wrapper">
            <div class="single-slide" style="background-image: url('portfolio2/img/slider/slider1.png');">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text-content-wrapper">
                                    <div class="text-content text-start">
                                        <h5>{{ __('messages.welcome_hero') }}</h5>
                                        <h1>Keep Your Body <span>Strengthened & Refreshed</span></h1>
                                        <p>{{ __('messages.hero1_text') }}</p>
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
                                        <h5>{{ __('messages.welcome_hero') }}</h5>
                                        <h1><span>Revitalize</span> Your Body & Build <span>Resilience</span></h1>
                                        <p>{{ __('messages.hero2_text') }}</p>

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
                        <h2>{{ __('messages.about_title') }}</h2>
                        <p class="m-0">{{ __('messages.about_paragraph1') }}</p>
                        <p>
                            {{ __('messages.about_paragraph2') }}
                        </p>
                        <p>
                            {{ __('messages.about_paragraph3') }}</p>
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
                        <h2>{{ __('messages.our_classes') }}</h2>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            issss has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p> --}}
                        <p>{{ __('messages.our_classes_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($classes as $class)
                @php
                if($class->foto){
                $foto = 'storage/' . $class->foto;
                } else {
                $foto = 'portfolio2/img/class/2.webp';
                }
                @endphp
                <div class="col-lg-4 col-md-6">

                    <div class="single-class">
                        <div class="single-img">
                            <a href="dashboard/ryr/classes/{{ $class->id }}"><img src="{{ $foto }}" alt="class"
                                    style="width: 370px; height: 207px;"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="{{ $foto }}" style="width: 370px; height: 207px;">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="/ryr/classes/{{ $class->id }}">{{ $class->nama_kelas }}</a></h3>
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
                    <a class="banner-btn mt-55" href="/ryr/class" data-text="view all classes"><span>{{ __('messages.view_all_classes') }}</span></a>
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
                        <h2>{{ __('messages.class_schedule') }}</h2>
                        <p>{{ __('messages.class_schedule_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="scehedule-table table-content table-responsive text-center">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('messages.schedule_time') }}</th>
                                    <th>{{ __('messages.schedule_saturday') }}</th>
                                    <th>{{ __('messages.schedule_sunday') }}</th>
                                    <th>{{ __('messages.schedule_monday') }}</th>
                                    <th>{{ __('messages.schedule_tuesday') }}</th>
                                    <th>{{ __('messages.schedule_wednesday') }}</th>
                                    <th>{{ __('messages.schedule_thursday') }}</th>
                                    <th>{{ __('messages.schedule_friday') }}</th>
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
                                return $schedule;
                                // return strtotime($schedule);
                                });
                                @endphp
                                @foreach ($sortedSchedules as $schedule)
                                <tr>
                                    <td class="time">
                                        <p>{{ $schedule }}</p>
                                    </td>
                                    @foreach ($days as $key => $day)
                                    @php
                                    $class = $classes->firstWhere('start_time', $schedule)->where('day', $day)->first();
                                    @endphp
                                    @if($class && $class['start_time'] == $schedule)
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
                        <p>{{ __('messages.teachers_description') }}
                        </p>
                    </div>
                </div>

                @foreach ($teachers as $index => $teacher)
                @php
                if($teacher->foto){
                $foto = 'storage/' . $teacher->foto;
                } else {
                $foto = 'portfolio2/img/trainer/trainer4.png';
                }
                @endphp
                @if ($index < 3) <div class="col-lg-4 col-md-6">
                    <div class="single-trainer text-center">
                        <img src="{{ $foto }}" alt="trainer" style="width: 370px; height: 345px;">
                        <div class="trainer-hover">
                            <h3>{{ $teacher->nama }}</h3>
                            <ul>
                                {{-- <li><a href="{{ $teacher->fb }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $teacher->twitter }}"><i class="fa fa-twitter"></i></a></li> --}}
                                <li><a href="https://www.instagram.com/{{ $teacher->instagram }}"><i class="fa fa-instagram"></i></a></li>
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
        @if (auth()->check())
        {{-- <div class="text-center"> --}}
            <div class="text-end" style="margin-right: 500px;">
            <a href="{{ route('gallery.create') }}" class="default-btn"
                style="background-color: #5fc7ae; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                Add New Item
            </a>
        </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="test-content">
                        <div class="section-title text-center">
                            <h2>gallery</h2>
                            {{-- <p>Explore our gallery to see the vibrant moments captured at Roemah Yoga Rian. From serene
                                yoga sessions to community events, our gallery showcases the essence of our studio and
                                the joy of our members.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid row" style="position: relative; height: 390px;">
                @foreach ($galleries as $gallery)

                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="portfolio-img single-img">
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
    <!-- Event Area Start -->
    <section class="event-area pt-95 pb-100 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>special class</h2>
                        <p>{{ __('messages.events_description') }}</p>
                    </div>
                    <div class="event-wrapper d-flex justify-content-center flex-wrap">
                        @foreach ($specials as $special)
                        <div class="event-content text-center m-3">
                            <h3>{{ $special->class_name }}</h3>
                            <p>Rp.{{ number_format($special->harga, '2', ',', '.') }}</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur corrupti quae repellendus, et nihil ducimus eius molestiae minima enim ipsum ratione </p>
                            <h4>{{ \Carbon\Carbon::parse($special->tanggal)->format('l, d  M  Y') }}</h4>
                            <h5>{{ $special->start_time }} - {{ $special->end_time }}</h5>
                        </div>
                        @endforeach
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
                            <h2>blog</h2>
                            <p>{{ __('messages.blog_description') }}</p>
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
                                    <a href="/blog/{{ $blog->id }}">
                                        <i class="zmdi zmdi-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></h3>
                                <h6>{{ $blog->updated_at }}</h6>
                                <p>{{$blog->body}}</p>
                                <a href="/blog/{{ $blog->id }}">{{ __('messages.read_more') }}</a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    {{-- <div class="col-lg-6">
                        <div class="single-blog">
                            <div class="blog-pic single-img">
                                <img src="img/blog/blog1.webp" alt="blog">
                                <div class="gallery-icon">
                                    <a href="blog">
                                        <i class="zmdi zmdi-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog">Curabitur ante justo, vitae.</a></h3>
                                <h6>25 March 2021</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut nisl non justo aliquam
                                    euismod ut ac orci.</p>
                                <a href="blog">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="single-blog">
                            <div class="blog-pic single-img">
                                <img src="img/blog/blog2.webp" alt="blog">
                                <div class="gallery-icon">
                                    <a href="blog">
                                        <i class="zmdi zmdi-link"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog">Curabitur ante justo, vitae.</a></h3>
                                <h6>25 March 2021</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut nisl non justo aliquam
                                    euismod ut ac orci.</p>
                                <a href="blog">read more</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- Blog Area End -->
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
    <section class="client-area bg-gray pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>{{ __('messages.client_section_title') }}</h2>
                        {{-- <p>They love the peaceful and welcoming environment at Roemah Yoga Rian. They appreciate the
                            personalized attention from our experienced instructors and the variety of classes that
                            cater to all levels. Join our community and experience the transformative power of yoga.</p> --}}
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
                                    <p>{{ __('messages.client_testimonial_1') }}
                                    </p>
                                    <h4 style="font-family: 'Great Vibes', cursive;">Rian</h4>
                                    {{-- <img src="portfolio2/img/icon/signature.webp" alt="signature"> --}}
                                    <h6>Founder</h6>
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="single-testimonial">
                                    <p>Roemah Yoga Rian is life changing. The instructors are incredibly knowledgeable
                                        and supportive, and the classes are both challenging and rejuvenating. I highly
                                        recommend this studio to anyone looking to deepen their yoga practice.</p>
                                    <h4 style="font-family: 'Great Vibes', cursive;">Owen</h4>
                                    <h6>Co-Founder</h6>
                                </div>
                            </div> --}}

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
                                    <input id="mc-email" type="email" name="email" placeholder={{ __('messages.newsletter_placeholder') }}>
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
                            <a href="/portfolio"><img src="portfolio2//img/logo/logo.webp" alt="Roemah Yoga Rian"></a>
                            <p>{{ __('messages.footer_contact_title') }}
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
                            <h3>Social Media</h3>
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
