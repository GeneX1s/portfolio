<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Class || Roemah Yoga Rian</title>
    <meta name="description"
        content="The template is built for Sport Clubs, Health Clubs, Gyms, Fitness Centers, Personal Trainers and other sport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon.ico">

    <link rel="stylesheet" href="../../portfolio2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../portfolio2/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../portfolio2/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="../../portfolio2/css/slick.css">
    <link rel="stylesheet" href="../../portfolio2/style.css">
    <link rel="stylesheet" href="../../portfolio2/css/responsive.css">
    <script src="../../portfolio2/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<script src='../portfolio2/js/calendar/index.global.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialDate: '2023-01-12',
        navLinks: true,
        selectable: true,
        selectMirror: true,

        // Event selection handler
        select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
            var newEvent = {
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
            };
            calendar.addEvent(newEvent);

            // Send the new event to the server
            sendEventToServer(newEvent);
        }
        calendar.unselect();
        },

        // Event click handler for deletion
        eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
            var eventToDelete = arg.event;

            // Remove the event from the calendar
            eventToDelete.remove();

            // Send a request to delete the event from the server
            deleteEventFromServer(eventToDelete.id);
        }
        },

        // Event edit handler (for updating events)
        eventChange: function(arg) {
        var updatedEvent = arg.event;

        // Send the updated event data to the server
        updateEventInServer(updatedEvent);
        },

        editable: true,
        dayMaxEvents: true,
        // events: '/api/events'

        events: [
        {
            id: 1,
            title: 'All Day Event',
            start: '2023-01-01'
        },
        {
            id: 2,
            title: 'Meeting',
            start: '2023-01-12T10:30:00',
            end: '2023-01-12T12:30:00'
        }
        ]
    });

    calendar.render();

    // Function to send the new event to your server
    function sendEventToServer(eventData) {
        fetch('/api/events', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
        },
        body: JSON.stringify(eventData)
        })
        .then(response => response.json())
        .then(data => {
        console.log('Event created on server:', data);
        })
        .catch((error) => {
        console.error('Error creating event:', error);
        });
    }

    // Function to send the updated event to your server
    function updateEventInServer(eventData) {
        fetch(`/api/events/${eventData.id}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
        },
        body: JSON.stringify({
            title: eventData.title,
            start: eventData.start,
            end: eventData.end,
            allDay: eventData.allDay
        })
        })
        .then(response => response.json())
        .then(data => {
        console.log('Event updated on server:', data);
        })
        .catch((error) => {
        console.error('Error updating event:', error);
        });
    }

    // Function to delete the event on the server
    function deleteEventFromServer(eventId) {
        fetch(`/api/events/${eventId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
        },
        })
        .then(response => response.json())
        .then(data => {
        console.log('Event deleted from server:', data);
        })
        .catch((error) => {
        console.error('Error deleting event:', error);
        });
    }

    });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>

<body>


    <!-- Header Area Start -->
    <header class="top">
        <div class="header-area ptb-18 header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="/"><img src="/../../portfolio2/img/logo/logo.webp" alt="COFFEE" /></a>
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
                            <h2>class</h2>
                            <div class="banner-breadcrumb">
                                <ul>
                                    <li><a href="/">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                    <li>class</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->
    <!-- Classes Start -->
    <section class="class-area fix bg-gray pb-100 pt-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>our classes</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
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
                    <a class="banner-btn mt-55" href="javascript:void(0);" data-text="view all classes" id="view-all-classes-btn"><span>view all classes</span></a>
                    <div id="hidden-classes" style="display: none;">
                        <!-- Add your hidden content here -->
                        <div class="single-class">
                            <div class="single-img">
                                <a href="class.html"><img src="img/class/4.webp" alt="class"></a>
                                <div class="gallery-icon">
                                    <a class="image-popup" href="img/class/4.webp">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="single-content">
                                <h3><a href="class.html">advanced yoga</a></h3>
                                <ul>
                                    <li><i class="zmdi zmdi-face"></i>John Doe</li>
                                    <li><i class="zmdi zmdi-alarm"></i>11.00Am-01:00Pm</li>
                                </ul>
                            </div>
                        </div>
                        <a class="banner-btn mt-55" href="javascript:void(0);" data-text="hide classes" id="hide-classes-btn"><span>hide classes</span></a>
                    </div>

                    <script>
                        document.getElementById('view-all-classes-btn').addEventListener('click', function() {
                            document.getElementById('hidden-classes').style.display = 'block';
                            this.style.display = 'none';
                        });

                        document.getElementById('hide-classes-btn').addEventListener('click', function() {
                            document.getElementById('hidden-classes').style.display = 'none';
                            document.getElementById('view-all-classes-btn').style.display = 'inline-block';
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Area End -->

    <section class="class-area fix bg-white pb-100 pt-95">
        <div class="section-title text-center">
            <h2>Special Classes/ Schedules</h2>

        </div>
    </section>
    <!-- Schedule Area Strat -->
    <section class="schedule-area pt-85 pb-90 bg-gray text-center">
        <body>

            <div id='calendar'></div>

          </body>
    </section>
    <!-- Schedule Area End -->
    <!-- Pricing Area Start -->
    {{-- <div class="pricing-area pt-95 pb-120 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-xl-2 offset-lg-2">
                    <div class="section-title text-center">
                        <h2>pricing table</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum issss
                            has been the industry's standard dummy text ever since the 1500s, when an unknown lorem </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-table text-center">
                        <div class="table-head">
                            <h2>silver package</h2>
                            <h1>Rp.800.000,00<span>/month</span></h1>
                        </div>
                        <div class="table-body">
                            <ul>
                                <li>Hatha Classes</li>
                                <li>Wallrope Classes</li>
                                <li>Morning & Evening Class</li>
                            </ul>
                            <a href="#">get started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-table text-center">
                        <div class="table-head">
                            <h2>gold package</h2>
                            <h1>Rp.400.000,00<span>/month</span></h1>
                        </div>
                        <div class="table-body">
                            <ul>
                                <li>Hatha and Ashtanga Class</li>
                                <li>Every Wed and Thu Evening</li>
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
    <script src="/../portfolio2/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/../portfolio2/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="/../portfolio2/js/bootstrap.bundle.min.js"></script>
    <script src="/../portfolio2/js/owl.carousel.min.js"></script>
    <script src="/../portfolio2/js/jquery.meanmenu.js"></script>
    <script src="/../portfolio2/js/ajax-mail.js"></script>
    <script src="/../portfolio2/js/jquery.ajaxchimp.min.js"></script>
    <script src="/../portfolio2/js/slick.min.js"></script>
    <script src="/../portfolio2/js/imagesloaded.pkgd.min.js"></script>
    <script src="/../portfolio2/js/isotope.pkgd.min.js"></script>
    <script src="/../portfolio2/js/jquery.magnific-popup.js"></script>
    <script src="/../portfolio2/js/plugins.js"></script>
    <script src="/../portfolio2/js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.net/Roemah Yoga Rian/Roemah Yoga Rian/class.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Mar 2025 01:57:36 GMT -->

</html>
