<!DOCTYPE html>
<html lang="en" class="no-js">

<!-- Mirrored from lmpixels.com/demo/unique/unique-vcard/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Mar 2024 09:30:11 GMT -->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nicholas Owen- Portfolio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Nicholas Owen- Portfolio" />
  <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Unique, portfolio" />
  <meta name="author" content="lmtheme" />
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/transition-animations.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/main-red.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/lmpixels-demo-panel.css') }}" type="text/css">

  <style>
    /* Increase the padding of the list items */
    li {
      padding: 10px 15px;
      /* Adjust as needed */
      line-height: 3;
      /* Adjust line-height if needed */
    }

    /* Increase the size of the icons */
    .menu-icon {
      font-size: 1.5em;
      /* Increase icon size */
      vertical-align: middle;
      /* Align icon vertically in the middle */
      margin-right: 10px;
      /* Space between icon and text */
    }
  </style>
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
  <!-- Loading animation -->
  <div class="preloader">
    <div class="preloader-animation">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>
  <!-- /Loading animation -->

  <div id="page" class="page template-style-dark">
    <!-- Header -->
    <header id="site_header" class="header mobile-menu-hide header-color-dark">
      <div class="my-photo tilt-effect">
        <img src="images/photo.png" alt="image">
      </div>

      <div class="site-title-block">
        <a class="site-title" href="/login">Nicholas Owen</a>
      </div>

      <!-- Navigation -->
      <div class="site-nav">
        <!-- Main menu -->
        <ul id="nav" class="site-main-menu">
          <li>
            <a class="pt-trigger" href="#home" data-animation="21"><i
                class="menu-icon pe-7s-icon pe-7s-home"></i>Home</a><!-- href value = data-id without # of .pt-page. -->
          </li>
          <li>
            <a class="pt-trigger" href="#about_me" data-animation="17"><i
                class="menu-icon pe-7s-icon pe-7s-user"></i>About me</a>
          </li>
          <li>
            <a class="pt-trigger" href="#resume" data-animation="18"><i
                class="menu-icon pe-7s-icon pe-7s-id"></i>Resume</a>
          </li>
          <li>
            <a class="pt-trigger" href="#portfolio" data-animation="19"><i
                class="menu-icon pe-7s-icon pe-7s-portfolio"></i>Portfolio</a>
          </li>
          <li>
            <a class="pt-trigger" href="#contact" data-animation="20"><i
                class="menu-icon pe-7s-icon pe-7s-mail"></i>Contact</a>
          </li>
        </ul>
        <!-- /Main menu -->
      </div>
      <!-- Navigation -->
    </header>
    <!-- /Header -->

    <!-- Mobile Header -->
    <div class="mobile-header mobile-visible">
      <div class="mobile-logo-container">
        <div class="mobile-site-title">Nicholas Owen</div>
      </div>

      <a class="menu-toggle mobile-visible">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    <!-- /Mobile Header -->

    <!-- Main Content -->
    <div id="main" class="site-main">
      <!-- Page changer wrapper -->
      <div class="pt-wrapper" style="background-image: url(images/main_bg_light.jpg);">
        <!-- Subpages -->
        <div class="subpages">

          <!-- Home Subpage -->
          <section class="pt-page pt-page-1 section-without-bg section-paddings-0 table" data-id="home">
            <div class="section-inner">
              <div class="home-page-block">
                <h2>Nicholas Owen</h2>
                <div class="owl-carousel text-rotation">
                  <div class="item">
                    <p class="home-page-description">Developer</p>
                  </div>
                  <div class="item">
                    <p class="home-page-description">System Analyst</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End of Home Subpage -->

          <!-- About Me Subpage -->
          <section class="pt-page pt-page-2" data-id="about_me">
            <div class="border-block-top-110"></div>
            <div class="section-inner">
              <div class="section-title-block">
                <div class="section-title-wrapper clearfix">
                  <h2 class="section-title">About Me</h2>
                  <h5 class="section-description">Developer, System Analyst, Data Specialist</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 subpage-block">
                  <div class="my-photo-block tilt-effect">
                    <img src="images/aboutmefoto.png" alt="">
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4">
                  <h3>Web Application Developer</h3>
                  <p>I'm a very passionate web developer from Jakarta, Indonesia with experience in the programming
                    industry. I have worked on various projects that require swift learning and also multiple skills
                    to accomplish. I'm always open to software development works.
                  </p>
                  <p>Some soft skills i got that will benefit in this business is my endless learning passion, fast
                    learning, teamwork capability, mentoring and public speaking skills.
                  </p>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 subpage-block">
                  <ul class="info-list">
                    @php
                    $year = date("Y");
                    $birthday = $year -2001;
                    @endphp

                    <li><span class="title">Age</span><span class="value">{{$birthday}}</span></li>
                    <li><span class="title">Residence</span><span class="value">Indonesia</span></li>
                    <li><span class="title">City</span><span class="value">Jakarta</span></li>
                    <li><span class="title">e-mail</span><span class="value"><a href="nicholas_owen@outlook.com"><span
                            class="__cf_email__"
                            data-cfemail="c7a2aaa6aeab87a2bfa6aab7aba2e9a4a8aa">nicholas_owen@outlook.com</span></a></span>
                    </li>
                    {{-- <li><span class="title">Phone</span><span class="value">-</span></li> --}}
                    <li><span class="title">Hobby</span><span class="value">Yoga/Games</span></li>
                    <li><span class="title">Freelance</span><span class="value available">Available</span></li>
                  </ul>

                  <ul class="social-links">
                    {{-- <li><a class="tip social-button" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li> --}}
                    <!-- Full list of social icons: http://fontawesome.io/icons/#brand -->
                    {{-- <li><a class="tip social-button" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li> --}}
                    <li><a class="tip social-button" href="https://id.linkedin.com/in/nicholas-owen-4262171b8" title="Google Plus"><i class="fa fa-linkedin"></i></a>
                    </li>
                    {{-- <li><a class="tip social-button" href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li> --}}
                    <li><a class="tip social-button" href="https://www.instagram.com/n_ow3n/?__d=1%3Futm_source%3Dig_embed" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                    <!--<li><a class="tip social-button" href="#" title="last.fm"><i class="fa fa-lastfm"></i></a></li>-->
                    <!--<li><a class="tip social-button" href="#" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>-->
                  </ul>
                </div>
              </div>

              <!-- Services block -->
              <div class="block-title">
                <h3>What I'm Offering</h3>
              </div>

              <div class="row">
                <div class="col-sm-6 col-md-3 subpage-block">
                  <div class="service-block">
                    <div class="service-info">
                      <img src="images/service/web_design_icon.png" alt="Responsive Design">
                      <h4>Building App/Website</h4>
                      <p>Building apps/web apps for all needs and business.</p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 subpage-block">
                  <div class="service-block">
                    <div class="service-info">
                      <img src="images/service/app_dev.png" alt="Photography">
                      <h4>Application Development</h4>
                      <p>I'm also experienced on developing various applications ranging from core banking system to
                        simple apps.</p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 subpage-block">
                  <div class="service-block">
                    <div class="service-info">
                      <img src="images/service/creativity_icon.png" alt="Creativity">
                      <h4>Prototyping</h4>
                      <p>Prototyping or consulting service for your system or business flow design.</p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 subpage-block">
                  <div class="service-block">
                    <div class="service-info">
                      <img src="images/service/database.png" alt="Advetising">
                      <h4>System/Data Migration</h4>
                      <p>I'm experienced and knowledgeable in databases such as MySQL, JBase, and Excel databases.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End of Services block -->

              <!-- Clients block -->
              {{-- <div class="block-title">
                <h3>Clients</h3>
              </div>

              <div class="row">
                <div class="col-sm-4 col-md-2 subpage-block">
                  <div class="client-block">
                    <a href="#" target="_blank"><img src="images/clients/client_1.png" alt="image"></a>
                  </div>
                </div>

                <div class="col-sm-4 col-md-2 subpage-block">
                  <div class="client-block">
                    <a href="#" target="_blank"><img src="images/clients/client_2.png" alt="image"></a>
                  </div>
                </div>

                <div class="col-sm-4 col-md-2 subpage-block">
                  <div class="client-block">
                    <a href="#" target="_blank"><img src="images/clients/client_3.png" alt="image"></a>
                  </div>
                </div>

                <div class="col-sm-4 col-md-2 subpage-block">
                  <div class="client-block">
                    <a href="#" target="_blank"><img src="images/clients/client_4.png" alt="image"></a>
                  </div>
                </div>

                <div class="col-sm-4 col-md-2 subpage-block">
                  <div class="client-block">
                    <a href="#" target="_blank"><img src="images/clients/client_5.png" alt="image"></a>
                  </div>
                </div>

                <div class="col-sm-4 col-md-2 subpage-block">
                  <div class="client-block">
                    <a href="#" target="_blank"><img src="images/clients/client_6.png" alt="image"></a>
                  </div>
                </div>
              </div> --}}
              <!-- End of Clients block -->


              <!-- Fun facts block -->
              <div class="block-title">
                <h3>Fun Facts</h3>
              </div>

              <div class="row">
                <div class="col-sm-6 col-md-3 subpage-block">
                  <div class="fun-fact-block gray-bg tilt-effect">
                    <i class="pe-7s-icon pe-7s-smile"></i>
                    <h4>Happy Clients</h4>
                    <span class="fun-value">23</span>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 subpage-block tilt-effect">
                  <div class="fun-fact-block">
                    <i class="pe-7s-icon pe-7s-portfolio"></i>
                    <h4>Experiences</h4>
                    <span class="fun-value">7 years</span>
                  </div>
                </div>

                {{-- <div class="col-sm-6 col-md-3 subpage-block tilt-effect">
                  <div class="fun-fact-block gray-bg">
                    <i class="pe-7s-icon pe-7s-medal"></i>
                    <h4>Awards Won</h4>
                    <span class="fun-value">21</span>
                  </div>
                </div> --}}

                <div class="col-sm-6 col-md-3 subpage-block tilt-effect">
                  <div class="fun-fact-block">
                    <i class="pe-7s-icon pe-7s-folder"></i>
                    <h4>Projects Done</h4>
                    <span class="fun-value">28</span>
                  </div>
                </div>
              </div>
              <!-- End of Fun fucts block -->
            </div>
          </section>
          <!-- End of About Me Subpage -->

          <!-- Resume Subpage -->
          <section class="pt-page pt-page-3" data-id="resume">
            <div class="border-block-top-110"></div>
            <div class="section-inner">
              <div class="section-title-block">
                <div class="section-title-wrapper">
                  <h2 class="section-title">Resume</h2>
                  <h5 class="section-description">Experiences</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-md-4 subpage-block">
                  <div class="block-title">
                    <h3>Education</h3>
                  </div>
                  <div class="timeline">
                    <!-- Single event -->
                    <div class="timeline-event te-primary">
                      <h5 class="event-date">2022</h5>
                      <h4 class="event-name">Binus University</h4>
                      <span class="event-description">S1 Sarjana Komputer</span>
                      <p>Graduate of Binus University (2018-2022) majoring in computer science.</p>
                    </div>
                    <!-- Single event -->
                    <!-- <div class="timeline-event te-primary">
                      <h5 class="event-date">2025</h5>
                      <h4 class="event-name">S2</h4>
                      <span class="event-description">-</span>
                      <p>I'm also planning to continue my education in computer for S2.</p>
                    </div> -->
                    <!-- Single event -->
                    {{-- <div class="timeline-event te-primary">
                      <h5 class="event-date">2008</h5>
                      <h4 class="event-name">Specialization Course</h4>
                      <span class="event-description">University of Studies</span>
                      <p>Mauris magna sapien, pharetra consectetur fringilla vitae, interdum sed tortor.</p>
                    </div> --}}
                  </div>
                </div>

                <div class="col-sm-6 col-md-4 subpage-block">
                  <div class="block-title">
                    <h3>Experience</h3>
                  </div>
                  <div class="timeline">
                    <!-- Single event -->
                    <div class="timeline-event te-primary">
                      <h5 class="event-date">Jul 2022 - Jan 2023</h5>
                      <h4 class="event-name">Developer and Support</h4>
                      <span class="event-description">PT. Duta Nitsuko Abadi</span>
                      <p>Worked as developer and support for telephone systems company.</p>
                    </div>
                    <!-- Single event -->
                    <div class="timeline-event te-primary">
                      <h5 class="event-date">Jul 2022 - Jan 2023</h5>
                      <h4 class="event-name">Retail Funding Relationship Manager</h4>
                      <span class="event-description">PT. Bank OCBC NISP Tbk.</span>
                      <p>Worked full-time as a management trainee banker in OCBC NISP.</p>
                    </div>
                    <!-- Single event -->
                    <div class="timeline-event te-primary">
                      <h5 class="event-date">Nov 2023 - Mar 2024</h5>
                      <h4 class="event-name">Back End developer</h4>
                      <span class="event-description">PT. Indo Artha Teknologi</span>
                      <p>Worked full time as backend developer in PT. IAT working on backend projects such as Artha
                        Graha Peduli's website Pasar Murah.</p>
                    </div>
                    <!-- Single event -->
                    <div class="timeline-event te-primary">
                      <h5 class="event-date">April 2024 - Ongoing</h5>
                      <h4 class="event-name">Core Banking System Developer</h4>
                      <span class="event-description">PT. Bank Artha Graha Internasional Tbk.</span>
                      <p>Currently working full time as Staff Solution and Dev in Artha Graha Bank developing core
                        banking system that uses T24 and JBase Query Languange as backend. Also developed Middleware API using Fiorano.</p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-4 subpage-block">
                  <div class="block-title">
                    <h3>Soft Skills</h3>
                  </div>
                  <div class="skills-info">
                    <h4>English</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-1"></div>
                    </div>

                    <h4>System and Flow Design (UML)</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-2"></div>
                    </div>

                    <h4>Office Apps(Word, Excel, etc) and VS Code</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-1"></div>
                    </div>
                  </div>

                  <div class="block-title">
                    <h3>Skills</h3>
                  </div>
                  <div class="skills-info">
                    <h4>Laravel</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-4"></div>
                    </div>

                    <h4>PHP</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-5"></div>
                    </div>

                    <h4>Database (MySQL, PostgreSQL, JQL)</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-8"></div>
                    </div>

                    <h4>Core Banking (T24 Temenos/ Fiorano)</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-7"></div>
                    </div>

                    <h4>Golang</h4>
                    <div class="skill-container">
                      <div class="skill-percentage skill-6"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12">
                  <div class="download-cv-block">
                    <a class="button" target="_blank" href="{{ asset('download/New_CV.pdf') }}">Download CV</a>
                  </div>

                </div>
              </div>
            </div>
          </section>
          <!-- End Resume Subpage -->


          <!-- Portfolio Subpage -->
          <section class="pt-page pt-page-4" data-id="portfolio">
            <div class="border-block-top-110"></div>
            <div class="section-inner">
              <div class="section-title-block">
                <div class="section-title-wrapper">
                  <h2 class="section-title">Portfolio</h2>
                  <h5 class="section-description">All my Works (so far)</h5>
                </div>
              </div>

              <!-- Portfolio Content -->
              <div class="portfolio-content">

                <!-- Portfolio filter -->
                <ul id="portfolio_filters" class="portfolio-filters">
                  <li class="active">
                    <a class="filter btn btn-sm btn-link active" data-group="all">All</a>
                  </li>
                  <li>
                    <a class="filter btn btn-sm btn-link" data-group="media">Website</a>
                  </li>
                  <li>
                    <a class="filter btn btn-sm btn-link" data-group="illustration">Applications</a>
                  </li>
                  <li>
                    <a class="filter btn btn-sm btn-link" data-group="video">Video</a>
                  </li>
                </ul>
                <!-- End of Portfolio filter -->

                <!-- Portfolio Grid -->
                <div id="portfolio_grid" class="portfolio-grid portfolio-masonry masonry-grid-3">

                  <!-- Portfolio Item 1 -->
                  <figure class="item" data-groups='["all", "media"]'>
                    <a href="portfolio1">
                      <img src="images/portfolio/1.jpg" alt="">
                      <div>
                        <h5 class="name">Aplikasi Survei Kepuasan Pelanggan</h5>
                        <small>Media</small>
                        <i class="pe-7s-icon pe-7s-display2"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 1 -->

                  <!-- Portfolio Item 1 -->
                  <figure class="item" data-groups='["all", "media"]'>
                    <a href="portfolio2">
                      <img src="images/portfolio/2.jpg" alt="">
                      <div>
                        <h5 class="name">Roemah Yoga Rian</h5>
                        <small>Media</small>
                        <i class="pe-7s-icon pe-7s-display2"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 1 -->

                  <!-- Portfolio Item 2 -->
                  <figure class="item" data-groups='["all", "video"]'>
                    <a href="portfolio2" title="Praesent Dolor Ex" class="lightbox mfp-iframe">
                      <img src="images/portfolio/2.jpg" alt="">
                      <div>
                        <h5 class="name">Pawon Bule</h5>
                        <small>Video</small>
                        <i class="pe-7s-icon pe-7s-video"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 2 -->

                  <!-- Portfolio Item 3 -->
                  <figure class="item" data-groups='["all","illustration"]'>
                    <a href="images/portfolio/full/3.jpg" class="lightbox" title="Duis Eu Eros Viverra">
                      <img src="images/portfolio/3.jpg" alt="">
                      <div>
                        <h5 class="name">Perdana Aksara</h5>
                        <small>Illustration</small>
                        <i class="pe-7s-icon pe-7s-photo"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 3 -->

                  <!-- Portfolio Item 4 -->
                  <figure class="item" data-groups='["all", "media"]'>
                    <a class="ajax-page-load" href="portfolio-2.html">
                      <img src="images/portfolio/4.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Media</small>
                        <i class="pe-7s-icon pe-7s-display2"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 4 -->

                  <!-- Portfolio Item 5 -->
                  <figure class="item" data-groups='["all", "illustration"]'>
                    <a href="images/portfolio/full/5.jpg" class="lightbox" title="Aliquam Condimentum Magna Rhoncus">
                      <img src="images/portfolio/5.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Illustration</small>
                        <i class="pe-7s-icon pe-7s-photo"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 5 -->

                  <!-- Portfolio Item 6 -->
                  <figure class="item" data-groups='["all", "media"]'>
                    <a class="ajax-page-load" href="portfolio-3.html">
                      <img src="images/portfolio/6.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Media</small>
                        <i class="pe-7s-icon pe-7s-display2"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 6 -->

                  <!-- Portfolio Item 7 -->
                  <figure class="item" data-groups='["all", "video"]'>
                    <a href="https://player.vimeo.com/video/97102654?autoplay=1" title="Nulla Facilisi"
                      class="lightbox mfp-iframe">
                      <img src="images/portfolio/7.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Video</small>
                        <i class="pe-7s-icon pe-7s-video"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 7 -->

                  <!-- Portfolio Item 8 -->
                  <figure class="item" data-groups='["all",  "media"]'>
                    <a class="ajax-page-load" href="portfolio-4.html">
                      <img src="images/portfolio/8.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Media</small>
                        <i class="pe-7s-icon pe-7s-display2"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 8 -->

                  <!-- Portfolio Item 9 -->
                  <figure class="item" data-groups='["all","illustration"]'>
                    <a href="images/portfolio/full/9.jpg" class="lightbox" title="Mauris Neque Dolor">
                      <img src="images/portfolio/9.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Illustration</small>
                        <i class="pe-7s-icon pe-7s-photo"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 9 -->

                  <!-- Portfolio Item 10 -->
                  <figure class="item" data-groups='["all", "video"]'>
                    <a href="https://player.vimeo.com/video/97102654?autoplay=1" title="Donec Lectus Arcu"
                      class="lightbox mfp-iframe">
                      <img src="images/portfolio/10.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Video</small>
                        <i class="pe-7s-icon pe-7s-video"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 10 -->

                  <!-- Portfolio Item 11 -->
                  <figure class="item" data-groups='["all","illustration"]'>
                    <a href="images/portfolio/full/11.jpg" class="lightbox" title="Duis Eu Eros Viverra">
                      <img src="images/portfolio/11.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Illustration</small>
                        <i class="pe-7s-icon pe-7s-photo"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 11 -->

                  <!-- Portfolio Item 12 -->
                  <figure class="item" data-groups='["all","media"]'>
                    <a class="ajax-page-load" href="portfolio-5.html">
                      <img src="images/portfolio/12.jpg" alt="">
                      <div>
                        <h5 class="name">Project Name</h5>
                        <small>Media</small>
                        <i class="pe-7s-icon pe-7s-display2"></i>
                      </div>
                    </a>
                  </figure>
                  <!-- /Portfolio Item 12 -->
                </div>
                <!-- /Portfolio Grid -->

              </div>
              <!-- /Portfolio Content -->
            </div>
          </section>
          <!-- /Portfolio Subpage -->

          <!-- Contact Subpage -->
          <section class="pt-page pt-page-5" data-id="contact">
            <div class="border-block-top-110"></div>
            <div class="section-inner">
              <div class="section-title-block">
                <div class="section-title-wrapper">
                  <h2 class="section-title">Contact</h2>
                  <h5 class="section-description">Get in Touch</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-md-6 subpage-block">
                  <div class="block-title">
                    <h3>Get in Touch</h3>
                  </div>
                  {{-- <p>Sed eleifend sed nibh nec fringilla. Donec eu cursus sem, vitae tristique ante. Cras pretium
                    rutrum
                    egestas. Integer ultrices libero sed justo vehicula, eget tincidunt tortor tempus.</p> --}}
                  <p>Please email here for all business needs.
                  </p>
                  <div class="contact-info-block">
                    <div class="ci-icon">
                      <i class="pe-7s-icon pe-7s-map-marker"></i>
                    </div>
                    <div class="ci-text">
                      <h5>Jakarta, Indonesia</h5>
                    </div>
                  </div>
                  <div class="contact-info-block">
                    <div class="ci-icon">
                      <i class="pe-7s-icon pe-7s-mail"></i>
                    </div>
                    <div class="ci-text">
                      <h5>Email | <a href="nicholas_owen@outlook.com" class="__cf_email__"
                          data-cfemail="dabbb6bfa2a9b7b3aeb29abfa2bbb7aab6bff4b9b5b7">nicholas_owen@outlook.com</a></h5>
                    </div>
                  </div>
                  {{-- <div class="contact-info-block">
                    <div class="ci-icon">
                      <i class="pe-7s-icon pe-7s-call"></i>
                    </div>
                    <div class="ci-text">
                      <h5>WhatsApp | 0812 8062 6658</h5>
                    </div>
                  </div> --}}
                  <div class="contact-info-block">
                    <div class="ci-icon">
                      <i class="pe-7s-icon pe-7s-check"></i>
                    </div>
                    <div class="ci-text">
                      <h5>Freelance Available</h5>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 subpage-block">
                  <div class="block-title">
                    <h3>Contact Form</h3>
                  </div>

                  @if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
                  <form method="post" action="/dashboard/contactus">

                    @csrf
                    <div class="messages"></div>

                    <div class="controls">
                      <div class="form-group">
                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Full Name"
                          required="required" data-error="Name is required.">
                        <div class="form-control-border"></div>
                        <i class="form-control-icon pe-7s-user"></i>
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                        <input id="form_email" type="email" name="email" class="form-control"
                          placeholder="Email Address" required="required" data-error="Valid email is required.">
                        <div class="form-control-border"></div>
                        <i class="form-control-icon pe-7s-mail"></i>
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for Me"
                          rows="4" required="required" data-error="Please, leave me a message."></textarea>
                        <div class="form-control-border"></div>
                        <i class="form-control-icon pe-7s-comment"></i>
                        <div class="help-block with-errors"></div>
                      </div>

                      <button type="submit" class="button btn-send">Send Message </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
          <!-- End Contact Subpage -->

        </div>
      </div>
      <!-- /Page changer wrapper -->
    </div>
    <!-- /Main Content -->
  </div>

  <!-- Demo Color changer -->
  <a id="lm_demo_panel_switcher" class="lm-demo-panel-switcher right"><i class="fa fa-gear"></i></a>
  <div id="lm_demo_panel" class="lm-demo-panel right panel-color-red active">
    <div class="demo-panel-title">Template Style</div>
    <div id="t_style" class="demo-panel-options">
      <a class="t-style-switcher" data-id="template-style-light">
        <div class="preview w-border t-style t-style-light">Light</div>
      </a>
      <a class="current-t-style t-style-switcher" data-id="template-style-dark">
        <div class="preview t-style t-style-dark">Dark</div>
      </a>
    </div>

    <div class="demo-panel-title">Main Color</div>
    <div id="main_color" class="demo-panel-options">
      <a data-id="red" class="current-main-color">
        <div class="preview color-1">&nbsp;</div>
      </a>
      <a data-id="blue">
        <div class="preview color-2">&nbsp;</div>
      </a>
      <a data-id="green">
        <div class="preview color-3">&nbsp;</div>
      </a>
      <a data-id="orange">
        <div class="preview color-4">&nbsp;</div>
      </a>
      <a data-id="yellow">
        <div class="preview color-5">&nbsp;</div>
      </a>
      <a data-id="violet">
        <div class="preview color-6">&nbsp;</div>
      </a>
    </div>

    <div class="demo-panel-title">Nav Color</div>
    <div id="header_color" class="demo-panel-options">
      <a class="inverse h-color-switcher" data-id="header-color-light">
        <div class="preview h-color h-color-1 w-border">&nbsp;</div>
      </a>
      <a class="h-color-switcher" data-id="header-color-main">
        <div class="preview h-color h-color-2">&nbsp;</div>
      </a>
      <a class="current-h-color h-color-switcher" data-id="header-color-dark">
        <div class="preview h-color h-color-3">&nbsp;</div>
      </a>
    </div>

    <div class="demo-panel-title mobile-hidden">Nav Position</div>
    <div id="header_position" class="demo-panel-options mobile-hidden">
      <a class="current-layout layout-switcher" data-id="layout-menu-left">
        <div class="preview layout left">Left</div>
      </a>
      <a class="layout-switcher" data-id="layout-menu-top">
        <div class="preview layout top">Top</div>
      </a>
      <a class="layout-switcher" data-id="layout-menu-bottom">
        <div class="preview layout bottom">Bottom</div>
      </a>
    </div>
  </div>
  <!-- /Demo Color changer -->


  <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
  <script src="{{ asset('js/modernizr.custom.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/pages-switcher.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/validator.js') }}"></script>
  <script src="{{ asset('js/jquery.shuffle.min.js') }}"></script>
  <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.hoverdir.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/lmpixels-demo-panel.js') }}"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
    integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
    data-cf-beacon='{"rayId":"8674ae701eb568d6","version":"2024.3.0","r":1,"token":"94b99c0576dc45bf9d669fb5e9256829","b":1}'
    crossorigin="anonymous"></script>
</body>


</html>
