@extends('ryr.layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">

<body>


    <!-- Header Area Start -->

    <!-- Header Area End -->
    <!-- Background Area Start -->
    <div class="slider-area">
        <div class="slider-wrapper">
            <div class="single-slide" style="background-image: url('img/slider/slider1.webp');">
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
                                        <a class="banner-btn" href="gallery.html" data-text="read more"><span>read
                                                more</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide" style="background-image: url('img/slider/slider2.webp');">
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
                                        <a class="banner-btn" href="gallery.html" data-text="read more"><span>read
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
                        <a class="banner-btn" href="about-us.html" data-text="read more"><span>read more</span></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-video active">
                        <div class="game">
                            <a href="#"><img src="img/about/about.webp" alt="about"></a>
                        </div>
                        <div class="video-icon video-hover">
                            <a class="video-popup" href="https://www.youtube.com/watch?v=A47zwWsjXgs">
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
                <div class="col-lg-4 col-md-6">
                    <div class="single-class">
                        <div class="single-img">
                            <a href="class.html"><img src="img/class/1.webp" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="img/class/1.webp">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="class.html">yoga for climbers</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>Sathi Bhuiyan</li>
                                <li><i class="zmdi zmdi-alarm"></i>10.00Am-05:00Pm</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-class">
                        <div class="single-img">
                            <a href="class.html"><img src="img/class/2.webp" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="img/class/2.webp">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="class.html">yoga for climbers</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>Sathi Bhuiyan</li>
                                <li><i class="zmdi zmdi-alarm"></i>10.00Am-05:00Pm</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="single-class">
                        <div class="single-img">
                            <a href="class.html"><img src="img/class/3.webp" alt="class"></a>
                            <div class="gallery-icon">
                                <a class="image-popup" href="img/class/3.webp">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <div class="single-content">
                            <h3><a href="class.html">yoga for climbers</a></h3>
                            <ul>
                                <li><i class="zmdi zmdi-face"></i>Sathi Bhuiyan</li>
                                <li><i class="zmdi zmdi-alarm"></i>10.00Am-05:00Pm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a class="banner-btn mt-55" href="class.html" data-text="view all classes"><span>view all
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
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
                            <tbody class="pt-30">
                                <tr>
                                    <td class="time">
                                        <p>8:00 AM</p>
                                    </td>
                                    <td class="purple">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class="purple">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td class="purple">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="time">
                                        <p>12:00 AM</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class="olive">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td class="olive">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="time">
                                        <p>3:00 PM</p>
                                    </td>
                                    <td></td>
                                    <td class="blue">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class="blue">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td class="blue">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="time">
                                        <p>6:00 PM</p>
                                    </td>
                                    <td class="pink">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class="pink">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                    <td class="pink">
                                        <h4>yoga for climbers</h4>
                                        <p>Sathi Bhuiyan</p>
                                        <p>8.00 Am-10.00Am</p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
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
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer text-center">
                        <img src="img/trainer/trainer1.webp" alt="trainer">
                        <div class="trainer-hover">
                            <h3>John laisa do</h3>
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
                        <img src="img/trainer/trainer2.webp" alt="trainer">
                        <div class="trainer-hover">
                            <h3>John laisa do</h3>
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
                        <img src="img/trainer/trainer3.webp" alt="trainer">
                        <div class="trainer-hover">
                            <h3>John laisa do</h3>
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                issss has been
                                the industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid row" style="position: relative; height: 390px;">
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 0%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="img/portfolio/gal.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/portfolio/gal.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2 cat4" style="position: absolute; left: 25%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="img/portfolio/gal2.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/portfolio/gal2.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat4" style="position: absolute; left: 50%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="img/portfolio/gal3.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/portfolio/gal3.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2" style="position: absolute; left: 75%; top: 0px;">
                    <div class="portfolio-img single-img">
                        <img src="img/portfolio/gal4.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/portfolio/gal4.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat2 cat3" style="position: absolute; left: 25%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="img/portfolio/gal5.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/portfolio/gal5.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-item cat1 cat3" style="position: absolute; left: 50%; top: 210px;">
                    <div class="portfolio-img single-img">
                        <img src="img/portfolio/gal6.webp" alt="project">
                        <div class="gallery-icon">
                            <a class="image-popup" href="img/portfolio/gal6.webp">
                                <i class="zmdi zmdi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Area End -->
    <!-- Event Area Strat -->
    <section class="event-area pt-95 pb-100 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>awesome event</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                    </div>
                    <div class="event-wrapper">
                        <div class="event-content text-center">
                            <h3>Yoga celebration in RYR</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the
                                industry'ssurvived </p>
                            <h4>25 March 2021</h4>
                            <h5>10AM - 12AM</h5>
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
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-blog">
                        <div class="blog-pic single-img">
                            <img src="img/blog/blog1.webp" alt="blog">
                            <div class="gallery-icon">
                                <a href="blog.html">
                                    <i class="zmdi zmdi-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3><a href="blog.html">Curabitur ante justo, vitae.</a></h3>
                            <h6>25 March 2021</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut nisl non justo aliquam
                                euismod ut ac
                                orci.</p>
                            <a href="blog.html">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="single-blog">
                        <div class="blog-pic single-img">
                            <img src="img/blog/blog2.webp" alt="blog">
                            <div class="gallery-icon">
                                <a href="blog.html">
                                    <i class="zmdi zmdi-link"></i>
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3><a href="blog.html">Curabitur ante justo, vitae.</a></h3>
                            <h6>25 March 2021</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut nisl non justo aliquam
                                euismod ut ac
                                orci.</p>
                            <a href="blog.html">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Area End -->
    <!-- Pricing Area Start -->
    <div class="pricing-area pt-95 pb-120 bg-gray">
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
    </div>
    <!-- Pricing Area End -->
    <!-- Client Area Strat -->
    <section class="client-area pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>Our Client Say</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the
                            industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non mi just.
                                        Aliquam vitae purus vel
                                        odio suscipit lobortis. Donec interdum finibus egestas. In eleifend ipsum eu
                                        lacinia congue.
                                        Vestibulum sodales, sapien aliquam </p>
                                    <img src="img/icon/signature.webp" alt="signature">
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
                                    <img src="img/icon/signature.webp" alt="signature">
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
                                    <img src="img/icon/signature.webp" alt="signature">
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
                                    <img src="img/icon/signature.webp" alt="signature">
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
                                    <img src="img/icon/signature.webp" alt="signature">
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1613802584124!5m2!1sen!2sbd"
                    allowfullscreen="" loading="lazy">
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

    <!-- Footer Area End -->

    <!-- All js here -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/meanmenu@2.0.8/dist/jquery.meanmenu.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajaxchimp@1.3.0/jquery.ajaxchimp.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/imagesloaded@4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/isotope-layout@4.5.4/dist/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script src="js/ajax-mail.js"></script> <!-- No CDN available, keep local -->
    <script src="js/plugins.js"></script> <!-- No CDN available, keep local -->
    <script src="js/main.js"></script> <!-- No CDN available, keep local --> --}}

    {{-- <script src="portfolio2/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="portfolio2/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="portfolio2/js/bootstrap.bundle.min.js"></script>
    <script src="portfolio2/js/owl.carousel.min.js"></script>
    <script src="portfolio2/js/jquery.meanmenu.js"></script>
    <script src="portfolio2/js/ajax-mail.js"></script>
    <script src="portfolio2/js/jquery.ajaxchimp.min.js"></script>
    <script src="portfolio2/js/slick.min.js"></script>
    <script src="portfolio2/js/imagesloaded.pkgd.min.js"></script>
    <script src="portfolio2/js/isotope.pkgd.min.js"></script>
    <script src="portfolio2/js/jquery.magnific-popup.js"></script>
    <script src="portfolio2/js/plugins.js"></script>
    <script src="portfolio2/js/main.js"></script> --}}
</body>


</html>

@endsection
