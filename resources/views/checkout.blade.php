@extends('layout.mainlayout')
@section('content')	

    <!-- Banner Section -->
    <section class="page-banner ext-banner">
        <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-10.jpg')}})"></div>
        <div class="banner-bottom-pattern"></div>

        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>Checkout</h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Checkout</li>
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
                    <form method="post" action="{{ route('payment.process') }}">
                    @csrf
                    <h3>Checkout</h3>
                    <h5>Click below button for payment process </h5>
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <input type="hidden" name="name" value="{{ $name }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    @php $logourl = url('/images/logo.png'); @endphp
                    <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ $razorpay_key }}"
                        data-amount="{{ $amount * 100 }}"
                        data-currency="INR"
                        data-name="Your Company Name"
                        data-image="{{ $logourl }}"
                        data-description="Payment for your order"
                        data-prefill.name="{{ $name }}"
                        data-prefill.email="{{ $email }}"
                        data-notes.order_id="{{ $order_id }}"
                    ></script>


                    <!-- <div class="my-4"><button type="submit" class="theme-btn btn-style-one">
                        <span class="btn-title">Pay Now</span></button>
                    </div> -->


                    </form>
                    
                </div>
            </div>

        </div>
    </section>


<style>
.details-inner input[type="submit"] {
    padding: 10px 20px;
}
.details-inner {
    text-align: center;
}
</style>    

@endsection