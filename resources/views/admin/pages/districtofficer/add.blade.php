@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Donor</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewClubModal">Add New Donor</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <div class="row" style="margin-bottom:10px; padding: 20px;">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <!-- <label class="form-label">Donor Type *</label> -->
                              <select class="form-control" name="department" required>
                                  <option value="">Choose Department</option>
                                  @foreach($departments as $department)
                                    <option value="">{{ $department->title }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <!-- <label class="form-label">Donor Type *</label> -->
                              <select class="form-control" name="designation" required>
                                  <option value="">Choose Designation</option>
                                  @foreach($designations as $designation)
                                    <option value="">{{ $designation->title }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <label class="form-label">Membership ID *</label>
                              <input type="number" id="membershipid" name="membership_id" class="form-control" required>
                              <input type="hidden" name="clubid" id="clubID">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom:10px;">
                <div class="col-md-3">
                  <span id="memberPhoto"></span>
                </div>
                <div class="col-md-8">
                  <span id="memberName"></span> <br />
                  <span id="homeClub"></span> <br />
                  <span id="clubDesignation"></span> <br />
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('js')
<script>
  $(document).ready(function() {
      $("#membershipid").bind('click change keyup', function(e) { 
          e.preventDefault();
            if ($(this).val().length >= 6){
              let membershipid = $('#membershipid').val();
             
              $.ajax({
						url: "/admin/ajax/search/membership",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								membershipid:membershipid
							},
							success:function(response)
							{
                document.getElementById("memberName").innerHTML = 'Full Name : '+response.membername;
                document.getElementById("homeClub").innerHTML = 'Home Club : '+response.memberhomeclub;
                document.getElementById("clubDesignation").innerHTML = 'Designation : '+response.memberdesignation;
                document.getElementById("memberPhoto").innerHTML = response.memberphoto;
                document.getElementById("clubID").value = response.clubid;
                $("#donorSubmitButton").prop('disabled', false);
              
                
              }
            });
            }
      });
  });
</script>
@endsection