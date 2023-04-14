@extends('layout.mainlayout')
@section('content')	

    <!-- Banner Section -->
    <section class="page-banner ext-banner">
        <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-10.jpg')}});"></div>
        <div class="banner-bottom-pattern"></div>

        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>Welcome to Tiles Tracker</h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    <!--Wellness Spa Section-->
    <section class="wellness-spa">
        <span class="dotted-pattern dotted-pattern-3"></span>
        <span class="tri-pattern tri-pattern-3"></span>
        <div class="auto-container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="upper-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="upper-inner">
                            <div class="circles">
                                <div class="c-1"></div>
                                <div class="c-2"></div>
                            </div>
                            <h2>Login</h2>
                            <div class="inner">
                                <div class="form-box default-form contact-form-two wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    
                                    @if(session()->has('error_login'))
                                        <div class="form-col col-md-12 col-sm-12 alert alert-danger">
                                            {{session()->get('error_login')}}
                                        </div>
                                    @endif

                                    <form method="post" action="{{url('signin')}}" id="login-form">
                                        @csrf

                                        <input type="hidden" value="{{ url()->previous() }}" name="previous_url">

                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="text" name="logusername" value="{{old('logusername')}}" placeholder="Username or Email" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="password" name="password" value="" placeholder="Password" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="theme-btn btn-style-one"><span class="btn-title">Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="upper-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="upper-inner">
                            <!-- <div class="circles">
                                <div class="c-1"></div>
                                <div class="c-2"></div>
                            </div> -->
                            <h2>Registration</h2>
                            <div class="inner">
                                <div class="form-box default-form contact-form-two wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    
                                @if(session()->has('success'))
                                    <div class="form-col col-md-12 col-sm-12 alert alert-success">
                                        {{session()->get('success')}}
                                    </div>
                                @endif

                                @if(session()->has('error'))
                                    <div class="form-col col-md-12 col-sm-12 alert alert-danger">
                                        {{session()->get('error')}}
                                    </div>
                                @endif
                                
                                    <form method="post" action="{{url('signup')}}" id="registration-form">
                                        @csrf
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="text" name="username" value="{{old('username')}}" placeholder="Username" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="email" name="email" value="{{old('email')}}" placeholder="Email" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="text" name="fullname" value="{{old('fullname')}}" placeholder="Full name" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="field-inner">
                                                <input type="password" name="password" value="" placeholder="*******" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="theme-btn btn-style-one"><span class="btn-title">Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection