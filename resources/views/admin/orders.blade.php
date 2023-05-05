@extends("admin.master")
@section("content") 

<div class="content-wrapper">
  <section class="content-header">
    <h1>Orders</h1>
    <ol class="breadcrumb"><li class="active">Orders</li></ol>
  </section>
  <section class="content">
    
      <div class="box">
        <div class="box-header with-border">
          <div class="user-block"><span class=""><a href="#">Orders List</a></span></div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <th>#OrderID</th>
                    <th>Customer</th>
                    <th>Plan</th>
                    <th>Transaction ID</th>
                    <th>Payment Status</th>
                  </thead>
                      @foreach($allOrders as $priceDetail)

                        <tbody>
                            <tr>
                                <td>#{{$priceDetail->order_id}}</td>
                                <td>
                                  <div><strong>Customer ID : </strong>#{{$priceDetail->user_id}}</div>
                                  <div><strong>Email : </strong>{{$priceDetail->email}}</div>
                                </td>
                                <td>{{$priceDetail->name}}</td>
                                <td>{{$priceDetail->transaction_id}}</td>
                                <td>
                                    @if($priceDetail->status == 'pending')
                                    <span class="label label-danger">{{$priceDetail->status}}</span>
                                    @else
                                    <span class="label label-success">{{$priceDetail->status}}</span>
                                    @endif
                                </td>
                                
                            </tr>
                        </tbody>
                    
                    @endforeach

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection 