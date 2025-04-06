<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default inc-shape attr-border navbar-sticky bootsnav">

        <div class="container">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/assets/img/' . $webSettings['logo_light']) }}" class="logo regular" alt="Logo">
                    <img src="{{ asset('frontend/assets/img/' . $webSettings['logo']) }}" class="logo responsive" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" >Home</a>
                        <ul class="dropdown-menu">
                            <li><a href="it-solution.html">It Solution <span class="badge">New</span></a></li>
                            <li><a href="index.html">Home Version One</a></li>
                            <li><a href="index-2.html">Home Version Two</a></li>
                            <li><a href="index-3.html">Home Version Three</a></li>
                            <li><a href="index-4.html">Home Version Four</a></li>
                            <li><a href="index-5.html">Home Version Five</a></li>
                            <li><a href="index-op.html">Onepage Version One</a></li>
                            <li><a href="index-op-2.html">Onepage Version Two</a></li>
                        </ul>
                    </li>
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Banner</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="banner-1.html">Banner Video Version</a></li>
                                                <li><a href="banner-2.html">Banner Zoom Version</a></li>
                                                <li><a href="banner-3.html">Banner Slide Version</a></li>
                                                <li><a href="banner-4.html">Banner Clean Version</a></li>
                                                <li><a href="banner-5.html">Banner Single Image</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Footer</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="footer-1.html">Footer Version One</a></li>
                                                <li><a href="footer-2.html">Footer Version Two</a></li>
                                                <li><a href="footer-3.html">Footer Version Three</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Other Pages</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="about-us.html">About us</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="pricing-table.html">Pricing Table</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                                <li><a href="404.html">Error Page</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Additional Pages</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                </div><!-- end row -->
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Gallery</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Grid Colum</a>
                                <ul class="dropdown-menu">
                                    <li><a href="gallery-grid-2-colum.html">Gallery Two Colum</a></li>
                                    <li><a href="gallery-grid-3-colum.html">Gallery Three Colum</a></li>
                                    <li><a href="gallery-grid-4-colum.html">Gallery Four Colum</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Masonary Colum</a>
                                <ul class="dropdown-menu">
                                    <li><a href="gallery-2-colum.html">Gallery Two Colum</a></li>
                                    <li><a href="gallery-3-colum.html">Gallery Three Colum</a></li>
                                    <li><a href="gallery-4-colum.html">Gallery Four Colum</a></li>
                                </ul>
                            </li>
                            <li><a href="gallery-carousel.html">Gallery Carousel</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Services</a>
                        <ul class="dropdown-menu">
                            <li><a href="services.html">Services Version One</a></li>
                            <li><a href="services-2.html">Services Version Two</a></li>
                            <li><a href="services-3.html">Services Version Three</a></li>
                            <li><a href="services-single.html">Services Single</a></li>
                        </ul>
                    </li>
                    <li><a href="team.html">Team</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-standard.html">Blog Standard</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-single.html">Blog Single Standard</a></li>
                            <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                            <li><a href="blog-single-right-sidebar.html">Single Right Sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->

</header>