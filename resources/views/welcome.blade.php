@extends('layout.mainlayout')
@section('content')		


<!-- Banner Section -->
<section class="banner-section banner-one">
    <div class="banner-bottom-pattern"></div>

    <div class="banner-carousel owl-theme owl-carousel">
        <!-- Slide Item -->
        <div class="slide-item">
            <div class="image-layer" style="background-image: url({{asset('images/main-slider/10.jpg')}});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <h1>The Best Premium Marble Stock Photos</h1>
                            <!-- <div class="text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt adipisicing</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(images/main-slider/11.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <h1>Ceramic Tiles Design</h1>
                            <!-- <div class="text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt adipisicing</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide Item -->
        <div class="slide-item">
            <div class="image-layer" style="background-image: url(images/main-slider/12.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="content">
                        <div class="inner">
                            <h1>Laminate Design shared by talented creators.</h1>
                            <!-- <div class="text">Amet consectetur adipisicing elit sed do eiusmod tempor incididunt adipisicing</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--End Banner Section -->

<!--About Section-->
<section class="about-section">
    <div class="pattern-bottom"></div>
    <span class="dotted-pattern dotted-pattern-1"></span>
    <span class="tri-pattern tri-pattern-1"></span>
    <div class="auto-container">
        <!--Filters Section-->
        @include('layout.searchfilter')
        <div class="row clearfix">
            <!--Text Column-->
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <h2>Quality <br>Find Accuracy Images With Us</h2>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    <div class="link-box">
                        <a href="#." class="theme-btn btn-style-one"><span class="btn-title">Read More</span></a>
                    </div>
                </div>
            </div>
            <!--Image Column-->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <span class="dotted-pattern dotted-pattern-2"></span>
                        <figure class="image"><img src="{{asset('images/resource/featured-image-0.jpg')}}" alt="" title=""></figure>
                        <div class="cap"><span class="txt">25 <br>Years <br>of <br>Exp.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Facts Section-->
<section class="facts-section">
    <span class="dotted-pattern dotted-pattern-3"></span>
    <div class="left-bottom-image"><img src="{{asset('images/resource/chair-umbrella.png')}}" alt="" title=""></div>
    <div class="auto-container">
        <div class="row clearfix">
            <!--Title Column-->
            <div class="title-column col-xl-7 col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="sec-title">
                        <h2>Always Ready <br>to Take Challange</h2>
                        <div class="lower-text">Lorem ipsum dolor sit consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. enim ad minim veniam quis nostrud exercitation.</div>
                    </div>

                </div>
            </div>
            <!--Facts Column-->
            <div class="facts-column col-xl-5 col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="facts">
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms" data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="25" data-speed="2000">0</span>+</div>
                                </div>
                                <h4>Years Exp.</h4>
                                <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div>
                            </div>
                        </div>
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms" data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="712" data-speed="5000">0</span></div>
                                </div>
                                <h4>Project Done</h4>
                                <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div>
                            </div>
                        </div>
                        <div class="fact-block">
                            <div class="fact-inner">
                                <div class="fact-count wow zoomInStable" data-wow-delay="0ms" data-wow-duration="2000ms">
                                    <div class="count-box"><span class="count-text" data-stop="310" data-speed="4000">0</span></div>
                                </div>
                                <h4>Awards Win</h4>
                                <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="dashed-separator">
    <div class="auto-container"><span></span></div>
</div>

<!--Rooms Section-->
<section class="rooms-section-one">
    <div class="outer-container">
        <div class="auto-container">
            <div class="sec-title centered">
                <h2>Latest Marble Design</h2>
                <div class="lower-text">Explore the latest marble Design, tiles design, laminate design, stock photos, vectors</div>
            </div>
        </div>

        <div class="auto-container">
            <div class="row">
                <div class="col-sm-4 pb-4">
                    <a href="#"><img src="{{asset('images/gallery/10.jpg')}}" alt="" title=""> </a>
                </div>
                <div class="col-sm-4 pb-4">
                    <a href="#"><img src="{{asset('images/gallery/11.jpg')}}" alt="" title=""> </a>
                </div>
                <div class="col-sm-4 pb-4">
                    <a href="#"><img src="{{asset('images/gallery/10.jpg')}}" alt="" title=""> </a>
                </div>
                <div class="col-sm-4 pb-4">
                    <a href="#"><img src="{{asset('images/gallery/11.jpg')}}" alt="" title=""> </a>
                </div>
                <div class="col-sm-4 pb-4">
                    <a href="#"><img src="{{asset('images/gallery/10.jpg')}}" alt="" title=""> </a>
                </div>
                <div class="col-sm-4 pb-4">
                    <a href="#"><img src="{{asset('images/gallery/11.jpg')}}" alt="" title=""> </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!--Offers Section-->
<section class="offers-section-one">
    <div class="auto-container">

        <div class="upper-box clearfix">
            <div class="sec-title">
                <h2>Image Finder <br>Special Offers</h2>
                <div class="lower-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</div>
            </div>
            <div class="link-box">
                <a href="#." class="theme-btn btn-style-one"><span class="btn-title">View All Offers</span></a>
            </div>
        </div>

        <div class="row clearfix">
            <div class="offers-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <div class="offer-block">
                        <div class="offer-inner">
                            <div class="fact-thumb wow zoomInStable" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="image"><img src="{{asset('images/resource/of-thumb-1.jpg')}}" alt="" title=""></div><span>10% <br>off</span></div>
                            <div class="price">Start From: <span>$50.00</span></div>
                            <h4>Silver Package</h4>
                            <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div>
                            <a href="#." class="over-link"></a>
                        </div>
                    </div>
                    <div class="offer-block">
                        <div class="offer-inner">
                            <div class="fact-thumb wow zoomInStable" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="image"><img src="{{asset('images/resource/of-thumb-1.jpg')}}" alt="" title=""></div><span>20% <br>off</span></div>
                            <div class="price">Start From: <span>$70.00</span></div>
                            <h4>Gold Package</h4>
                            <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div>
                            <a href="#." class="over-link"></a>
                        </div>
                    </div>
                    <div class="offer-block">
                        <div class="offer-inner">
                            <div class="fact-thumb wow zoomInStable" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="image"><img src="{{asset('images/resource/of-thumb-1.jpg')}}" alt="" title=""></div><span>30% <br>off</span></div>
                            <div class="price">Start From: <span>$100.00</span></div>
                            <h4>Premium Package</h4>
                            <div class="text">Excepteur sint occaecat cupidatat proi dent in sunt.</div>
                            <a href="#." class="over-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="images-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner">
                    <span class="dotted-pattern dotted-pattern-4"></span>
                    <div class="images">
                        <div class="image wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="{{asset('images/resource/featured-image-1.jpg')}}" alt="" title=""></div>
                        <div class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="{{asset('images/resource/featured-image-2.jpg')}}" alt="" title=""></div>
                        <div class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms"><img src="{{asset('images/resource/featured-image-3.jpg')}}" alt="" title=""></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--Featured Section-->
<section class="featured-section">
    <div class="pattern-top"></div>
    <span class="dotted-pattern dotted-pattern-3"></span>
    <span class="tri-pattern tri-pattern-3"></span>
    <div class="auto-container">
        <div class="featured-block">
            <div class="row clearfix">
                <!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h3>Join with the creative people worldwide and earn money </h3>
                        <div class="text">Don't miss this opportunity to join and earn with IMAGE FINDER today. Earn 100 rupees per symbol image download. Showcase your work and grow your skills by joining our international community.
                        </div>
                        <div class="link-box">
                            <a href="#" class="theme-btn btn-style-one"><span class="btn-title">JOIN NOW</span></a>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image-box">
                            <figure class="image">
                                <a href="#"><img src="{{asset('images/resource/featured-image-4.jpg')}}" alt="" title=""></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-block alternate">
            <div class="row clearfix">
                <!--Text Column-->
                <div class="text-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h3>Our Services </h3>
                        <div class="text">Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid dolore magna aliqu enim ad minim veniam quis nostrud exer cittion ullamco laboris nisi ut aliquip excepteur.</div>
                        <div class="link-box">
                            <a href="#." class="theme-btn btn-style-one"><span class="btn-title">Discover Now</span></a>
                        </div>
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image-box">
                            <figure class="image">
                                <a href="#"><img src="{{asset('images/resource/featured-image-5.jpg')}}" alt="" title=""></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Video Section-->
<section class="video-section">
    <div class="image-layer" style="background-image: url(images/background/image-1.jpg);"></div>
    <div class="auto-container">
        <div class="content-box wow zoomIn" data-wow-delay="0ms" data-wow-duration="2000ms">
            <h1>See The Experience Before You Feel it.</h1>
            <div class="play-link"><a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="lightbox-image"><span class="icon flaticon-play-button-3"></span></a></div>
        </div>
    </div>
</section>

<!--Testimonials Section-->
<section class="testimonials-section">
    <span class="dotted-pattern dotted-pattern-3"></span>
    <span class="tri-pattern tri-pattern-2"></span>
    <div class="auto-container">
        <div class="sec-title centered">
            <h2>What People Say?</h2>
            <div class="lower-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</div>
        </div>

        <div class="carousel-box">
            <div class="testimonial-carousel owl-theme owl-carousel">
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-1.jpg')}}" alt=""></div>
                            <div class="name">Mark Adams</div>
                            <div class="designation">Designer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-2.jpg')}}" alt=""></div>
                            <div class="name">Fiona Edwards</div>
                            <div class="designation">Developer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-3.jpg')}}" alt=""></div>
                            <div class="name">Dominic Allen</div>
                            <div class="designation">Designer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-1.jpg')}}" alt=""></div>
                            <div class="name">Mark Adams</div>
                            <div class="designation">Designer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-2.jpg')}}" alt=""></div>
                            <div class="name">Fiona Edwards</div>
                            <div class="designation">Developer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-3.jpg')}}" alt=""></div>
                            <div class="name">Dominic Allen</div>
                            <div class="designation">Designer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-1.jpg')}}" alt=""></div>
                            <div class="name">Mark Adams</div>
                            <div class="designation">Designer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-2.jpg')}}" alt=""></div>
                            <div class="name">Fiona Edwards</div>
                            <div class="designation">Developer</div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="content-box">
                            <div class="content">
                                <div class="quote-icon"><span class="flaticon-quote-1"></span></div>
                                <div class="text">Lorem ipsum dolor sit amet consectetur adipis elit eiusmod tempor incidunt sed labore dolore magna.</div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="image"><img src="{{asset('images/resource/testi-thumb-3.jpg')}}" alt=""></div>
                            <div class="name">Dominic Allen</div>
                            <div class="designation">Designer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--News Section-->
<section class="news-section">
    <div class="pattern-top"></div>
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <h2>Stay Update <br>with Image Finder</h2>
                <div class="lower-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
            <div class="link-box">
                <a href="#." class="theme-btn btn-style-one"><span class="btn-title">View All Post</span></a>
            </div>
        </div>
        <div class="row clearfix">
            <!--News Block-->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <figure class="image">
                            <a href="#."><img src="{{asset('images/resource/news-image-1.jpg')}}" alt="" title=""></a>
                        </figure>
                    </div>
                    <div class="post-meta">
                        <span>on 2 Sep, 2019  /  by admin</span>
                    </div>
                    <h4><a href="#.">Disclosing the Secrets of Success in Hotera.</a></h4>
                    <div class="link-box">
                        <a href="#."><span class="icon flaticon-arrows-10"></span>Read More</a>
                    </div>
                </div>
            </div>
            <!--News Block-->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <figure class="image">
                            <a href="#."><img src="{{asset('images/resource/news-image-2.jpg')}}" alt="" title=""></a>
                        </figure>
                    </div>
                    <div class="post-meta">
                        <span>on 2 Sep, 2019  /  by admin</span>
                    </div>
                    <h4><a href="#.">The Top Hotel Trends to Watch in 2020.</a></h4>
                    <div class="link-box">
                        <a href="#."><span class="icon flaticon-arrows-10"></span>Read More</a>
                    </div>
                </div>
            </div>
            <!--News Block-->
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="image-box">
                        <figure class="image">
                            <a href="#."><img src="{{asset('images/resource/news-image-3.jpg')}}" alt="" title=""></a>
                        </figure>
                    </div>
                    <div class="post-meta">
                        <span>on 2 Sep, 2019  /  by admin</span>
                    </div>
                    <h4><a href="#.">Seven Best Things To Do In Buckeye Arizona.</a></h4>
                    <div class="link-box">
                        <a href="#."><span class="icon flaticon-arrows-10"></span>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection