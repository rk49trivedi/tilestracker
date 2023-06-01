@extends("admin.master")
@section("content") 

@if($allTiles)

<div class="content-wrapper">
  <section class="content-header">
    <h1>{{$allTiles->display_name}} Images</h1>
    <ol class="breadcrumb"><li class="active">{{$allTiles->display_name}} Images</li></ol>
  </section>
  <section class="content">
    
    <div class="box ">
      <div class="box-body">
        <div class="row">

        <div class="col-md-12" style="margin:20px 0px;">

            @if ($errors->any())
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if(session()->has('error'))

                <div class="col-md-12 alert alert-danger" style="display:block;">

                    {{ session()->get('error') }}

                </div>

            @endif

            @if(session()->has('success'))

                <div class="col-md-12 alert alert-success" style="display:block;">

                    {{ session()->get('success') }}

                </div>

            @endif

            </div>
          <div class="col-md-12">
            <div class="table-responsive image-management">
              <table class="datatable table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Images</th>
                     <th>Images Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php 
                    $allTilesImages = json_decode($allTiles->stock,true);
                    $tileCategory = str_replace(" ","_",strtolower($allTiles->name));
                    @endphp
                  @foreach($allTilesImages as $fileName)
                  <tr>
                    <td><div><img src="{{url('img/tiles/'.$tileCategory.'/'.$fileName['image_slug'])}}" style="width:250px; height:250px;"/></div>
                    </td>
                    <td><div class="text-center"><strong>{{$fileName['image_title']}}</strong></div></td>
                    <td>
                       <button data-href="{{url('admin/tiles?tile_id='.$allTiles->id.'&tilesName='.$fileName['image_slug'])}}"  data-imgid="{{$allTiles->id}}" data-filename="{{$fileName['image_slug']}}" data-catid="{{$allTiles->cat_id}}" class="btn bg-danger deleteimagase">Delete</button> 
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>

$(document).on('click','.deleteimagase',function(){
    
     let catID = $(this).data("catid");
     let image_id = $(this).data("imgid");
     let filename = $(this).data("filename");
      bootbox.confirm("<br><div class='alert alert-danger'>Are you sure you want to delete this image?</div>",function(r){
      
        if(r){
            window.location.assign(ADMIN_URL+'view-tiles/'+catID+'?fileId='+image_id+'&filename='+filename);
        }
    
    });

});


</script>



@else

<div class="content-wrapper">
  <section class="content-header">
    <h1> Images</h1>
    <ol class="breadcrumb"><li class="active"> Images</li></ol>
  </section>
  <section class="content">
    
    <div class="box ">
      <div class="box-body">
        <div class="row">

          <div class="col-md-12">
            <div class="col-md-12 alert alert-success" style="display:block;">

                    No record found

                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endif

@endsection 
