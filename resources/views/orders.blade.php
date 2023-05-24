@extends('layout.mainlayout')
@section('content')		

<!-- Banner Section -->
<section class="page-banner">
    <div class="image-layer" style="background-image:url({{asset('images/background/banner-image-2.jpg')}});"></div>
    <div class="banner-bottom-pattern"></div>

    <div class="banner-inner">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>My Orders</h1>
                <div class="page-nav">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">My Orders</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    svg.w-5.h-5 {
    width: 20px;
}
p.text-sm.text-gray-700.leading-5{margin:20px 0px;}
</style>
<!--End Banner Section -->

<!--Offers Section-->
<section class="packages-section">
    <div class="auto-container">
        <div class="title-box">
            <h2>My Orders</h2>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="row">

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

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <th>OrderID</th>
                                <th>Order Detail</th>
                                <th>Expiry</th>
                                <th>Status</th>
                            </thead>
                            
                        @foreach($allOrders as $priceDetail)

                        <tbody>
                            <tr>
                                <td>#{{$priceDetail->order_id}}</td>
                                <td>
                                    <div><strong>Transaction ID : </strong> {{$priceDetail->transaction_id}}</div>
                                    <div><strong>Price : </strong>Rs.{{number_format($priceDetail->price)}}</div>
                                    <div><strong>Plan : </strong>{{$priceDetail->name}}</div>
                                </td>
                                <td>{{date('Y-m-d',strtotime($priceDetail->end_date))}}</td>
                                <td>
                                    @if($priceDetail->status == 'pending' || $priceDetail->status == 'end' || $priceDetail->status == 'over')
                                    <span class="badge badge-danger">{{$priceDetail->status}}</span>
                                    @else
                                    <span class="badge badge-success">{{$priceDetail->status}}</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    
                        @endforeach
                        
                        <tfoot>
                          <tr>
                            @if ($allOrders->links()->paginator->hasPages())
                            <td class="pagination">
                                {{ $allOrders->links() }}
                            </td>
                            @endif
                          </tr>
                        </tfoot>

                        </table>
                    </div>
                    
                    
                </div>
            </div>
        </div>
</section>

@endsection