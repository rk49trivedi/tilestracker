@extends('layout.mainlayout')
@section('content')		

<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-2.jpg')}});"></div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>Special Offers</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Special Offers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Banner Section -->

<!--Offers Section-->
<section class="packages-section">
    <div class="auto-container">
        <div class="title-box">
            <h2>Special Offers</h2>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    @foreach($allPriceData as $priceDetail)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card h-100 shadow-lg">
                            <div class="card-body">
                                <div class="text-center p-3">
                                    <h5 class="card-title">{{$priceDetail->name}}</h5>
                                    <small>{{$priceDetail->type}}</small>
                                    <br><br>
                                    <span class="h2">Rs.{{$priceDetail->price}}</span>/{{$priceDetail->interval}}
                                    <br><br>
                                </div>
                                <p class="card-text">{{$priceDetail->description_data}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                @php 
                                    $allListing = json_decode($priceDetail->listing);
                                @endphp
                                @foreach($allListing as $innerList)
                                <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                </svg> {{$innerList}}</li>
                                @endforeach
                            </ul>
                            <div class="card-body text-center">
                                @if(session()->has('unlocker_user'))
                                    @if($currentPlan == $priceDetail->id)
                                    <button class="btn btn-danger" disabled>Current Plan</button>
                                    
                                    @else
                                    <a href="{{url('cart/'.$priceDetail->id)}}" class="theme-btn btn-style-one"><span class="btn-title">Select</span></a>
                                    @endif
                                    
                                @else
                                <a href="{{url('login')}}" class="theme-btn btn-style-one"><span class="btn-title">Select</span></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
</section>

@endsection