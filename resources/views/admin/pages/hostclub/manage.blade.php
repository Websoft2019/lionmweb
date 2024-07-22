@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Manage Host Club Panel</h6>
                </div>
               
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registration</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active User</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($registrations as $item)
                <tr>
                  
                  
                  <td class="align-middle text-center">
                 
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->title }}</span>
                 
                  </td>
                  <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">
                    @php $usercount = App\Models\Registrationhostenroll::where('registration_id', $item->id)->count(); @endphp
                   <a href="" class="userlist" id="{{$item->id}}"> {{$usercount}} user(s)</a>
                </span></td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                  </td>
                  <td class="align-middle">
                    
                    <a href="" id="{{$item->id}}" class="text-secondary font-weight-bold text-xs registrationB" data-bs-toggle="modal" data-bs-target="#AddNewClubModal">
                      Add User
                    </a>
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
  <div class="modal fade" id="AddNewClubModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Host Club User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.postAddHost')}}" method="POST">
          @csrf()
          <div class="modal-body">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom:10px ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control" required>
                                    <small style="display: block">Password will be recievied on above email</small>
                                    <input type="text" name="registrationid" id="registrationIDModel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Host Panel User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="userlist1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Host Club User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
               <div class="row">
                <table class="table">
                    <tr>
                        <th>Full name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <tbody id="userlist-model1"></tbody>
                    
                </table>
               </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
       
      </div>
    </div>
  </div>
@stop
@section('js')
<script>
    $(document).ready(function() {
    $(".registrationB").click(function(e) { 
        e.preventDefault();
        var registrationid = $(this).attr('id');
        document.getElementById("registrationIDModel").value = registrationid;
    });
    $(".userlist").click(function(e) {
        e.preventDefault();
        var registrationid2 = $(this).attr('id');
       
        $.ajax({
                url: "/admin/ajax/host/list",
                type:"POST",
                data:{
                        "_token": "{{ csrf_token() }}",
                        registration:registrationid2,
                    },
                    success:function(response)
                    {
                    $("#userlist-model1").html(response.output);
                    $('#userlist1').modal('show');
                    }
                });
    });
});
</script>
@endsection