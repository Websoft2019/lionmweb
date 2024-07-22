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
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Donor</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Home Club</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">donoted Date</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($donors as $donor)
                @php
                
                  $member = App\Models\Member::where('id', $donor->membership_id)->limit(1)->first();
                  $donortype = App\Models\Donortype::where('id', $donor->donor_type_id)->limit(1)->first();
                  $club = App\Models\Club::where('id', $donor->club_id)->limit(1)->first();
                @endphp
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      @if($member->photo)
                      <div>
                        <img src="{{ asset('site/uploads/members/'.$member->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      @else
                      <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      @endif
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $member->name }}</h6>
                        <p class="text-xs text-secondary mb-0">Membership ID : {{ $donor->membership_id }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $donortype->title }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    {{ $club->name }}
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                     {{$donor->created_at->format('d M, Y')}}
                    </span>
                  </td>
                  <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Edit
                    </a> |
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Delete
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
          <h5 class="modal-title" id="exampleModalLabel">Add Donor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postAddNewDonor') }}" method="POST">
          @csrf()
          <div class="modal-body">
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-3">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <!-- <label class="form-label">Donor Type *</label> -->
                                <select class="form-control" name="donor_type" required>
                                    <option value="">Donor Type</option>
                                    @foreach($donortypes as $donortype)
                                        <option value="{{ $donortype->id }}">{{ $donortype->title }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <label class="form-label">Amount (Optional)</label>
                              <input type="text" id="amount" name="amount" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
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
                  <div class="col-md-3">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <button class="btn btn-primary" id="membersSearch">Search</button>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="donorSubmitButton" disabled>Add Donor</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
@section('js')
<script>
  $(document).ready(function() {
      $("#membersSearch").click(function(e) { 
          e.preventDefault();
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
            
      });
  });
</script>
@endsection