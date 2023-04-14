<div class="page-wrapper">
<!-- Preloader -->
<div class="preloader">
    <div class="icon"></div>
</div>

<!-- Main Header -->
<header class="main-header header-style-one">

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container clearfix">
            <!--Logo-->
            <div class="logo-box">
                <div class="logo">
                    <a href="{{url('/')}}" title="Image Finder - Drag and drop an image to find similar"><img src="{{asset('images/logo.png')}}" alt="Image Finder" title="Image Finder"></a>
                </div>
            </div>
            <div class="nav-outer clearfix">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span class="txt">Menu</span></div>

                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li @if(request()->is('/')) class="current" @endif><a href="{{url('/')}}">Home</a></li>
                            <li @if(request()->is('about')) class="current" @endif><a href="{{url('/about')}}">About Us</a></li>
                            <li @if(request()->is('pricing')) class="current" @endif><a href="{{url('/pricing')}}">Pricing</a></li>
                            <li @if(request()->is('contact')) class="current" @endif><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="other-links clearfix">
                <div class="info">
                    <ul class="clearfix">
                        @if(session()->has('unlocker_user'))
                        <li><a href="#."><span class="icon flaticon-user"></span><span class="txt">Hello , {{session()->get('unlocker_user')[2]}}</span></a></li>
                        @else
                        <li><a href="{{url('/login')}}"><span class="icon flaticon-padlock"></span><span class="txt">Login</span></a></li>
                        <li><a href="te:"><span class="icon flaticon-smartphone-2"></span><span class="txt">+91 123 456 7890</span></a></li>
                        @endif
                        
                        
                        
                    </ul>
                </div>
                @if(session()->has('unlocker_user'))
                <div class="link-box">
                    <a href="{{url('/singout')}}" class="theme-btn btn-style-two"><span class="btn-title">Logout</span></a>
                </div>
                @else
                <div class="link-box">
                    <a href="{{url('/pricing')}}" class="theme-btn btn-style-one"><span class="btn-title">Join Prime</span></a>
                </div>
                @endif
                
            </div>

        </div>
    </div>
    <!--End Header Upper-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="close-btn"><span class="icon flaticon-targeting-cross"></span></div>
        <div class="menu-backdrop"></div>
        <div class="nav-logo">
            <a href="index.html"><img src="{{asset('images/nav-logo.png')}}" alt="" title=""></a>
        </div>
        <nav class="menu-box">
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
        <div class="nav-bottom">
            <div class="copyright">Image Finder &copy; {{date('Y')}} All Right Reserved</div>
            <!--Social Links-->
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Mobile Menu -->

</header>
<!-- End Main Header -->