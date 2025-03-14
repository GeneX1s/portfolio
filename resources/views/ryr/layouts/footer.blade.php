<footer class="footer-area bg-gray">
    <div class="footer-widget-area bg-3 pt-98 pb-90 fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer-widget">
                        <a href="/portfolio"><img src="portfolio2//img/logo/logo.webp" alt="Roemah Yoga Rian"></a>
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
