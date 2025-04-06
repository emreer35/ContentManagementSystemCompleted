<div class="top-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 logo">
                <a href="">
                    <img src="{{ asset('frontend/images/' . $webSettings['logo']) }}" class="logo" alt="Logo">
                </a>
            </div>
            <div class="col-md-9 address-info text-right">
                <div class="info box">
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info">
                                <span>Email</span> {{ $navbarContent['email'] }}
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="flaticon-call-center"></i>
                            </div>
                            <div class="info">
                                <span>Phone</span> {{ $navbarContent['phone'] }}
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<header id="home">

    <!-- Start Navigation -->
    <nav class="navbar navbar-default attr-border active-border logo-less small-pad navbar-sticky bootsnav">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container">

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
                </ul>
                <ul class="social">
                    @foreach ($socialAccount as $item)
                        <li><a href="{{ $item['url'] }}" target="{{ $item['target'] }}"><i
                                    class="{{ $item['icon'] }}"></i></a></li>
                    @endforeach
                </ul>
            </div>
            <!-- End Atribute Navigation -->

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/assets/img/' . $webSettings['logo']) }}" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                @include('frontend.layouts.utils.headermenu')
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->

</header>
