@extends("admin.master")
@section("content") 

<div class="content-wrapper">
  <section class="content-header">
    <h1>Price</h1>
    <ol class="breadcrumb"><li class="active">Price</li></ol>
  </section>
  <section class="content">
    
      <div class="box">
        <div class="box-header with-border">
          <div class="user-block"><span class=""><a href="#">Price List</a></span></div>
        </div>
        <div class="box-body">
          <div class="row">
            @foreach($allPrice as $price)


            <div class="col-md-4">
              <div class="col-md-12" style="box-shadow: 1px 1px 4px 2px #ccc;">
                <form class="priceUpdate" method="post" action="{{url('admin/update-price-process')}}">
                    @csrf
                    <input type="hidden"  name="pid" value="{{$price->id}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$price->name}}">
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                      <input type="text" class="form-control" name="type" value="{{$price->type}}">
                    </div>
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" name="price" value="{{$price->price}}">
                    </div>
                    <div class="form-group">
                      <label>Interval</label>
                      <input type="text" class="form-control" name="interval" value="{{$price->interval}}">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="description_data">{{$price->description_data}}</textarea>
                    </div>
                    <div class="form-group">
                      <label>Listing</label>
                      @php
                        $priceListingdata = json_decode($price->listing,true);  
                        $priceListing = implode(",",$priceListingdata);
                      @endphp
                      <textarea class="form-control" name="listing">{{$priceListing}}</textarea>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Update" name="update">
                    </div>
    
                  </form>
              </div>
              
            </div>

            @endforeach
          </div>
        </div>
      </div>
  </section>
</div>

<script type="text/javascript">
$(document).ready(function(){
$('.deluserdata').click(function(e){

  let link = $(this).data('link');
  bootbox.confirm('<span class="text-danger">Are you sure you want to delete this user?</span>', function(r){
    if(r){
      
      window.location.assign(link);
    }
  });
 
});
});
</script>
@endsection 