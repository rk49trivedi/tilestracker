@extends('layout.mainlayout')
@section('content')		

<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-2.jpg')}});"></div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Result</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Result</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->


<!--Rooms Section-->
<section class="result-section">
    <div class="auto-container">
        <!--Filters Section-->
        @include('layout.searchfilter')
        <div class="row clearfix mt-5">
            @foreach($allMatchesImages as $filterImages)

                <div class="room-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a><img src="{{$filterImages['imagePath']}}" alt="" title=""></a>
                            </figure>
                        </div>
                        <div class="lower-box">
                            <h4>{{$filterImages['category']}}</h4>
                            <div class="pricing clearfix">
                                <div class="price">Category : <span>Tiles</span></div>
                                <div class="price tags-f">Tags : <span>Tags1, Tags 2</span></div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</section>


@endsection