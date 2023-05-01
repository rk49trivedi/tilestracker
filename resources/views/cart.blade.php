@extends('layout.mainlayout')
@section('content')	

    <!-- Banner Section -->
    <section class="page-banner ext-banner">
        <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-10.jpg')}})"></div>
        <div class="banner-bottom-pattern"></div>

        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{$singPriceData->name}} Plan</h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

    <section class="event-single">
        <span class="dotted-pattern dotted-pattern-3"></span>
        <span class="tri-pattern tri-pattern-3"></span>
        <div class="auto-container">
           

            <div class="details-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="details-inner">
                    <form method="post" action="{{url('processtopay')}}">
                    @csrf
                    <h3>Cart Details</h3>

                    <div class="my-2"><strong>Title : </strong>{{$singPriceData->name}}</div>
                    <div class="my-2"><strong>Type : </strong>{{$singPriceData->type}}</div>
                    <div class="text">{{$singPriceData->description_data}}</div>
                    <ul class="info clearfix">
                        @php 
                        $allListing = json_decode($singPriceData->listing);
                        @endphp
                        @foreach($allListing as $innerList)
                        <li>{{$innerList}}</li>
                        @endforeach
                    </ul>
                    <div class="my-4"><strong>Price : </strong>Rs.{{$singPriceData->price}}</div>

                    <input type="hidden" value="{{$singPriceData->id}}" name="plan_id">
                    <input type="hidden" value="{{$singPriceData->price}}" name="amount">

                    <div class="col-md-12">
                        
                        <p>Process to Razorpay (Enter your razorpay email and name)</p>

                        <div class="form-group">
                            <input class="form-control" type="text" name="rname" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="remail" placeholder="Email">
                        </div>

                    </div>


                    <div class="my-4"><button type="submit" class="theme-btn btn-style-one">
                        <span class="btn-title">Process to Pay</span></button>
                    <button href="{{url('pricing')}}" class="theme-btn btn-style-two"><span class="btn-title">Cancel</span></button></div>


                    </form>
                    
                </div>
            </div>

        </div>
    </section>

@endsection