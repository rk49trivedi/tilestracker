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
                                    <span class="label label-danger">{{$priceDetail->status}}</span>
                                    @else
                                    <span class="label label-success">{{$priceDetail->status}}</span>
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
      </div>
  </section>
</div>
@endsection 