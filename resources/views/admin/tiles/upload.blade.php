@extends("admin.master")
@section("content") 

<div class="content-wrapper">
  <section class="content-header">
    <h1>Upload Tiles Images</h1>
    <ol class="breadcrumb"><li class="active">Upload Tiles Images</li></ol>
  </section>
  <section class="content">
    
    <form action="{{route('add-tiles')}}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
      <div class="box">
        <div class="box-header with-border">
          <div class="user-block"><span class=""><a href="#">Upload Tiles Images</a></span></div>
        </div>
        <div class="box-body">
          <div class="row">
          <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Category</span>
                  <input type="text" class="form-control"  value="{{$category->display_name}}" placeholder="Category Name" disabled>
                </div>
              </div>
            </div>
            <input type="hidden" value="{{$category->id}}" name="hidid">
            <div class="col-md-12">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Image</span>
                  <input type="file" class="form-control"  name="uploadfile[]" accept=".jpg,.png,.jpeg" multiple required>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Upload</button>
                
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
        </div>
      </div>
    </form>
  </section>
</div>
@endsection 