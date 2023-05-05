@extends("admin.master")
@section("content") 

<div class="content-wrapper">
  <section class="content-header">
    <h1>Users</h1>
    <ol class="breadcrumb"><li class="active">Users</li></ol>
  </section>
  <section class="content">
    
      <div class="box">
        <div class="box-header with-border">
          <div class="user-block"><span class=""><a href="#">Users List</a></span></div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <th>#CID</th>
                    <th>Customer Detail</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </thead>
                      @foreach($userList as $userDetails)

                        <tbody>
                            <tr>
                                <td>#{{$userDetails->id}}</td>
                                <td>
                                  <div><strong>Name : </strong>#{{$userDetails->name}}</div>
                                  <div><strong>Email : </strong>{{$userDetails->email}}</div>
                                  <div><strong>Username : </strong>{{$userDetails->username}}</div>
                                </td>
                                <td>{{$userDetails->created_at}}</td>
                                <td>
                                  <a data-link="{{url('admin/users?id='.$userDetails->id)}}" class="btn btn-danger deluserdata">Delete</a>
                                  <a href="{{url('admin/users?access='.$userDetails->id)}}" class="btn btn-info">Access</a>
                                </td>
                               
                                
                            </tr>
                        </tbody>
                    
                    @endforeach

                    <tfoot>
                      <tr>
                        @if ($userList->links()->paginator->hasPages())
                        <div class="pagination">
                            {{ $userList->links() }}
                        </div>
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