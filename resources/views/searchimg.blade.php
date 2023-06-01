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

        @if($limitSearch == 1)

        <div class="row clearfix mt-5">

            @if(count($allMatchesImages))

            <div class="col-md-12  my-5 "><h2 class="text-center text-success">Result Match</h2></div>

            @foreach ($separatedArray as $rateMatch => $filterImages) 
            
            
            
            

            @if($rateMatch > 100)
            @php $percentage = ($rateMatch/100) @endphp
            @else
            @php $percentage = ($rateMatch) @endphp
            @endif

            <div class="col-md-12  mb-2 "><h4 class="text-left">{{$percentage}}% result</h4></div>

            @foreach($filterImages as $filterImagesinner) 

                    @php $getFilename = $filterImagesinner['imagePath'];
                        
                    $file1 = explode('.',basename($filterImagesinner['imagePath']));
                    if(isset($file1)){
                        $fileName = $file1[0];
                    }else{
                        $fileName = basename($filterImagesinner['imagePath']);
                    }
                    
                    @endphp
                <div class="room-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a><img src="{{$filterImagesinner['imagePath']}}" alt="" title=""></a>
                            </figure>
                        </div>
                        <div class="lower-box">
                            <h4>{{$filterImagesinner['category']}}</h4>
                            <h6 style="display:none;">{{$filterImagesinner['rate_match']}}</h6>
                            <p>{{$filterImagesinner['imageName']}}</p>
                            <!-- <div class="pricing clearfix">
                                <div class="price">Category : <span>Tiles</span></div>
                                <div class="price tags-f">Tags : <span>Tags1, Tags 2</span></div>
                            </div> -->
                        </div>
                    </div>
                </div>


                @endforeach

                

                @endforeach

            @else

            <div class="col-md-12">
                    <h2 class="text-center my-5 text-danger">No result found..</h2>
                </div>

            @endif
            
            


        </div>

        

        @else

            @php $limit = 5; $counter = 0; @endphp
            <div class="row clearfix mt-5">

            @if(count($allMatchesImages)).

            <div class="col-md-12  my-5 "><h2 class="text-center text-success">Result Match</h2></div>

            @foreach($allMatchesImages as $filterImages) 

                @if($counter <= $limit)

                <div class="room-block-two col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a><img src="{{$filterImages['imagePath']}}" alt="" title=""></a>
                            </figure>
                        </div>

                        @php $getFilename = $filterImages['imagePath'];
                        
                        $file1 = explode('.',basename($filterImages['imagePath']));
                        if(isset($file1)){
                            $fileName = $file1[0];
                        }else{
                            $fileName = basename($filterImages['imagePath']);
                        }
                        
                        @endphp
                        <div class="lower-box">
                            <h4>{{$filterImages['category']}}</h4>
                            <h6 style="display:none;">{{$filterImages['rate_match']}}</h6>
                            <p>{{$filterImages['imageName']}}</p>
                            <!-- <div class="pricing clearfix">
                                <div class="price">Category : <span>Tiles</span></div>
                                <div class="price tags-f">Tags : <span>Tags1, Tags 2</span></div>
                            </div> -->
                        </div>
                    </div>
                </div>
                @endif

                @php $counter++; @endphp

                @endforeach

            @else

            <div class="col-md-12">
                    <h2 class="text-center text-danger">No result found..</h2>
                </div>

            @endif
                
            </div>

            <div class="row text-center clearfix py-5">
                <div class="col-md-12">
                    <h2 class="text-center text-danger"><a href="{{url('/pricing')}}"> To purchase our plan to get more result </a></h2>
                </div>
            </div>

        @endif


        



    </div>
</section>


@endsection