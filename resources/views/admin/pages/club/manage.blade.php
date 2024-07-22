@extends('admin.template')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
  .dataTables_wrapper{
    padding: 30px;
  }
</style>
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Clubs</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" href="{{ route('admin.getClubAdd') }}">Add New Club</a>
                </div>
                
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            @if(session('message'))
            <div class="row">
              <div class="col-md-12" style="padding: 0 40px;">
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                  <span class="text-sm">{{ session('message') }}</span>
                  <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
              </div>
            </div>
            @endif
            <table class="table align-items-center mb-0" id="myTable">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Club</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact Person</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Members</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Charter Date</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($clubs as $club)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      @if($club->photo)
                      <div>
                        <img src="{{ asset('admin/assets/img/team-2.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      @else
                      <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      @endif
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><a href="{{route('admin.getClubDetail', $club->slug)}}">{{ $club->name }}</a></h6>
                        <p class="text-xs text-secondary mb-0">CLUB ID : {{ $club->club_membership_id }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    @php
                    $designation = App\Models\Officer::where('id', $club->contact_person_designation)->limit(1)->first();
                    $noOfMember = App\Models\Member::where('club_id', $club->id)->where('status', 'Active')->count();
                    $userinfo = App\Models\User::where('club_id', $club->id)->limit(1)->first();
                    @endphp
                    <p class="text-xs font-weight-bold mb-0">
                      <a href="javascript:void(0)" class="contactPerson" id="{{$club->id}}">{{ $club->contact_person }} - {{ $userinfo->mobile }}</a>
                    </p>
                    <p class="text-xs text-secondary mb-0">{{ $designation->title }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    {{ $noOfMember }}<small>/mermbers</small>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                      @if($club->charter_date)
                      {{ $club->charter_date }}
                      @else
                      N/A
                      @endif
                    </span>
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('admin.getEditClub', $club->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Club">
                      Edit</a>
                      |
                    <a href="{{ route('admin.getHideORDeleteClub', $club->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Club" onclick="return confirm('Club not deleted permanently, its hide from system.')">
                      Delete |
                    </a>
                    <a href="{{ route('admin.getResetPasswordAndSendSMS', $club->club_membership_id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Send Password" onclick="return confirm('Are you sure reset password and send SMS')">
                      Send Password
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
  <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modify Club's Contact Person</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.postContactPersonModeify')}}" method="POST">
          @csrf()
          <div class="modal-body">
            <div class="row" style="margin-bottom:10px;">
              <div class="col-md-8">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Club Name *</label>
                            <input type="text" name="name" class="form-control" id="clubName-modal" value="" readonly>
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused ">
                            <label class="form-label">Club Member ID *</label>
                            <input type="number" name="club_membership_id" id="clubmemberid-modal" class="form-control" value="" readonly>
                              @error('club_membership_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row" style="margin-bottom:10px;">
              <div class="col-md-4">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Contact Person *</label>
                            <input type="text" name="contact_name" value="" id="contatperson-modal" class="form-control @error('contact_name') is-invalid @enderror" required>
                            @error('contact_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline focused is-focused">
                          <label class="form-label">Contact Person Club Designation *</label>
                          <select class="form-control @error('club_officer_id') is-invalid @enderror" name="club_officer_id" required>
                            <option value="" id="contactpersondeginationid-modal"></option>
                            @foreach($officers as $officers)
                            <option value="{{ $officers->id }}">{{ $officers->title }}</option>
                            @endforeach
                          </select>
                          @error('club_officer_id')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                  </div>
              </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Mobile</label>
                            <input type="number" name="mobile" id="mobile-modal" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required>
                            
                            @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <small style="display:block;"><input type="checkbox" name="smspassword"> Password reset &amp; resend in this mobile number?</small>
                  </div>
              </div>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Modify</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
$('.contactPerson').on('click', function(e) {
  e.preventDefault()
    var clubid = this.id;
    $.ajax({
                url: "/admin/Ajax/ContactPersonChange",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    clubid:clubid,
                },
                success:function(response){
                  document.getElementById("clubName-modal").value = response.clubname;
                  document.getElementById("clubmemberid-modal").value = response.clubmemberid;
                  document.getElementById("contatperson-modal").value = response.contactperson;
                  document.getElementById("mobile-modal").value = response.mobilenumber;
                  document.getElementById("contactpersondeginationid-modal").value = response.contact_person_designation;
                  document.getElementById("contactpersondeginationid-modal").innerHTML = response.contact_person_designation_title;
                  $('#staticBackdrop').modal('show');
                   
                },
      
      });
  });
});

</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@stop