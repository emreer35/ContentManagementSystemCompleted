<footer class="bg-dark">
    <div class="container">
        <div class="footer-content default-padding">
            <div class="row">

                <div class="equal-height col-md-4 col-sm-6 item">
                    <div class="f-item about">
                        <h4 class="widget-title">About</h4>
                        <p>
                            Required honoured trifling eat pleasure man relati Assurance yet bed was improving furniture
                            man Distrusts delighted services and a high degre tobiscotuition end of imposition.
                        </p>
                        <ul>
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-md-2 col-sm-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Usefull Links</h4>
                        <ul>
                            {{-- <li>
                                <a href="#">Classic Business</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Services</a>
                            </li> --}}
                            @php
                                $pageNames = array_keys($pages);
                            @endphp
                            @foreach ($pageNames as $item)
                                <li>
                                    <a target="_blank" href="#">{{ Str::title($item) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-md-2 col-sm-6 item">
                    <div class="f-item link">
                        <h4 class="widget-title">Company</h4>
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="#">Faq</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="equal-height col-md-4 col-sm-6 item">
                    <div class="f-item contact address">
                        <h4 class="widget-title">Bize Ulaşın</h4>
                        <ul>
                            <li>
                                <div class="icon"><i class="flaticon-location"></i></div>
                                <span>{{ $footerContent['address'] }}</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="flaticon-call-center"></i>
                                </div>
                                <span>{{ $footerContent['phone'] }}</span>
                            </li>
                            <li>
                                <div class="icon"><i class="flaticon-email"></i> </div>
                                <span>{{ $footerContent['email'] }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>{{ $footerContent['copyright'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
