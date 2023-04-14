@extends('layout.mainlayout')
@section('content')	

    <!-- Banner Section -->
    <section class="page-banner">
        <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-4.jpg')}});"></div>
        <div class="banner-bottom-pattern"></div>

        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>Stay Touch with Hotera</h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    <!--Contact Section-->
    <section class="contact-section-two">
        <div class="auto-container clearfix">
            <div class="row clearfix">

                <div class="info-col col-lg-6 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="u-text">Lorem ipsum dolor sit consectetur adipisicing elit sed do eiusmod tempor incididunt labore dolore.</div>

                        <div class="info">
                            <div class="info-block">
                                <div class="block-inner">
                                    <div class="icon-box wow zoomInStable" data-wow-delay="0ms" data-wow-duration="2000ms"><span class="flaticon-placeholder-1"></span></div>
                                    <h4>Address</h4>
                                    <div class="text">PO Box 16122 Collins Street West Victoria 8007 Canada.</div>
                                </div>
                            </div>
                            <div class="info-block">
                                <div class="block-inner">
                                    <div class="icon-box wow zoomInStable" data-wow-delay="300ms" data-wow-duration="2000ms"><span class="flaticon-technology-2"></span></div>
                                    <h4>Phone Number</h4>
                                    <div class="text">
                                        <a href="tel:(+48)564-334-21-22-34">(+48) 564-334-21-22-34</a> <br>
                                        <a href="tel:(+48)564-334-21-25">(+48) 564-334-21-25</a>
                                    </div>
                                </div>
                            </div>
                            <div class="info-block">
                                <div class="block-inner">
                                    <div class="icon-box wow zoomInStable" data-wow-delay="600ms" data-wow-duration="2000ms"><span class="flaticon-email-1"></span></div>
                                    <h4>Email Address</h4>
                                    <div class="text">
                                        <a href="mailto:info@hotera.com">info@hotera.com</a> <br>
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-col col-lg-6 col-md-12 col-sm-12">

                
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
                            <h3>Have Any Question?</h3>
                            <div class="text">Please complete the details below and then click on Submit and we’ll be in contact</div>
                            <form method="post" action="{{url('sendemail')}}" id="contact-form">
                                @csrf
                                <div class="form-group">
                                    <div class="field-inner">
                                        <input type="text" name="username" value="" placeholder="First name" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <input type="text" name="lastname" value="" placeholder="Last name" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <input type="email" name="email" value="" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <input type="text" name="phone" value="" placeholder="Phone" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="field-inner">
                                        <textarea name="message" placeholder="Message" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="theme-btn btn-style-one"><span class="btn-title">Send Message</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                

                

            </div>
        </div>
    </section>

<!--Map Section-->
<section class="map-section">
    <div class="map-layer">
        <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Singapore" data-icon-path="images/icons/map-marker.png" data-content="Singapore VIC 3000, USA<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
        </div>
    </div>
</section>


@endsection