@extends('admin.template')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
    .form-group{
    padding-top:20px;
}
.form-group label{
    color: #033c8a;
}
.dataTables_wrapper{
    padding: 30px;
  } 

</style>
@stop
@section('content')
<div class="row">
    <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">{{$club->club_membership_id }}</p>
            <h4 class="mb-0">{{$club->name}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <div class="row">
            <div class="col-md-6">
              @php $designation= App\Models\Officer::where('id', $club->contact_person_designation)->limit(1)->first(); @endphp
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Club Contact Person : {{$club->contact_person}} ({{$designation->title}}) </span><small style="display:block;">{{$club->contact_number}}</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <br />
  <div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Members</p>
              <h4 class="mb-0">{{$members->count()}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span>Lion Year {{env('lion_year')}}</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Program</p>
              <h4 class="mb-0">0</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">0 </span>this month</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Club Donation</p>
              @foreach($donationtypes as $donnertype)
              @php $countdonner = App\Models\Donor::where('club_id', $club->id)->where('donor_type_id', $donnertype->id)->count(); @endphp
              {{$donnertype->title}} - {{$countdonner}}|
              @endforeach
              
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span>&nbsp; &nbsp;  &nbsp; </p>
          </div>
        </div>
      </div>
  </div>
 <br />
  <div class="row mb-4">
    <div class="col-lg-12 col-md-6">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-lg-6 col-7">
              <h6>Club Members</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{$members->count()}}</span> Total Members
                @error('member_membership_no')
                dfkjasdf
                @enderror
              </p>
            </div>
            <div class="col-md-6" style="text-align: right;">
              <a data-bs-toggle="modal" data-bs-target="#AddNewMemberModal" class="btn btn-primary">Add Member</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Membership ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Degination</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="tablecontents">
                    @if($members->count())
                    @foreach($members as $member)
                    @if($member->status == 'Drop')
                    <tr class="row1" data-id="{{ $member->id }}" style="color: #ccc;">
                    @else
                    <tr class="row1" data-id="{{ $member->id }}">
                    @endif
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            @if($member->photo)
                              <img src="{{asset('site/uploads/members/'.$member->photo)}}" class="avatar avatar-sm me-3" alt="xd">
                            @else
                              <img src="{{asset('site/assets/images/logo.png')}}" class="avatar avatar-sm me-3" alt="xd">
                            @endif
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$member->name}} - {{$member->id}}</h6>
                            <small>Membersip ID : {{$member->member_membership_no}}</small>
                          </div>
                        </div>
                      </td>
                      <td>
                        @php
                          $memberDsearch = App\Models\Member_Designation_Enroll::where('member_id',$member->id )->limit(1)->first();
                          if($memberDsearch){
                          $Dmember = App\Models\Officer::where('id', $memberDsearch->designation_id)->limit(1)->where('lion_year', env('lion_year'))->first();
                          }
                          else{
                            $Dmember = Null;
                          }

                        @endphp
                        @if($Dmember)
                        {{$Dmember->title}}
                        @else
                          -
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold">{{$member->personal_contact_number}}</span>
                      </td>
                      <td class="align-middle">
                        @if($member->status == 'Active')
                          Active
                        @elseif($member->status == 'Drop')
                          Drop
                        @else
                          Deleted
                        @endif
                      </td>
                      <td class="align-middle">
                        <a href="{{route('admin.getMemberDetail', $member->id)}}">View Detail</a>
                      </td>
                    </tr>
                    
                    @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">No Members upload yet!!!</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
      <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 ">Website Views</h6>
          <p class="text-sm ">Last Campaign Performance</p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
      <div class="card z-index-2  ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 "> Daily Sales </h6>
          <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> updated 4 min ago </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
      <div class="card z-index-2 ">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
            <div class="chart">
              <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h6 class="mb-0 ">Completed Tasks</h6>
          <p class="text-sm ">Last Campaign Performance</p>
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm">just updated</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="AddNewMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postAddNewMember', $club->slug) }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="club_id" value="{{$club->id}}">
          <input type="hidden" name="club_slug" value="{{$club->slug}}">
          @csrf()
          <div class="modal-body">
                  <div class="row mb-4">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('photo') != '') focused is-focused @endif">
                            <label class="form-label">Photo </label>
                            <input type="file" name="photo" class="form-control  @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('fname') != '') focused is-focused @endif">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="fname" class="form-control  @error('fname') is-invalid @enderror" value="{{ old('fname') }}" required>
                            
                              @error('fname')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div>
                        <input type="checkbox" name="charter_member"> Charter Member?
                        <input type="checkbox" name="charter_president"> Charter President?
                      </div>
                  </div>
              </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('member_membership_no') != '') focused is-focused @endif">
                            <label class="form-label">Membership No * </label>
                            <input type="text" class="form-control" name="member_membership_no" value="{{old('member_membership_no')}}">
                            @error('member_membership_no')
                              {{$message}}
                            @enderror
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline focused is-focused">
                          <label class="form-label">Cub Designation * </label>
                          <select class="form-control" name="designation_id" required>
                            @foreach($officers as $officer)
                            <option value="{{ $officer->id }}" @php if($officer->id == 22){ echo 'selected'; } @endphp>{{ $officer->title }}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row mb-4">
                  <div class="col-md-6">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('email') != '') focused is-focused @endif">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Gender *</label>
                            <select class="form-control" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  </div> 
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{old('dob')}}">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row mb-4"> 
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('sponsor_name') != '') focused is-focused @endif">
                            <label class="form-label">Sponsor Name</label>
                            <input type="text" class="form-control" name="sponsor_name" value="{{old('sponsor_name')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('mobile_number') != '') focused is-focused @endif">
                            <label class="form-label">Personal Phone</label>
                            <input type="number" class="form-control" name="mobile_number" value="{{old('mobile_number')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('office_number') != '') focused is-focused @endif">
                            <label class="form-label">Office Phone</label>
                            <input type="number" class="form-control" name="office_number" value="{{old('office_number')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('home_number') != '') focused is-focused @endif">
                            <label class="form-label">Home Phone</label>
                            <input type="number" class="form-control" name="home_number" value="{{old('home_number')}}">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row mb-4">
                  <div class="col-md-5">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('address') != '') focused is-focused @endif">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('spouse_name') != '') focused is-focused @endif">
                            <label class="form-label">Spouse/Companion Name</label>
                            <input type="text" class="form-control" name="spouse_name" value="{{old('spouse_name')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Occupation <small style="color:red;">*</small></label>
                            <select class="form-control" name="occupation_id" required>
                                @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                  </div> 
              </div>
              <div class="row mb-4">
                  <div class="col-md-4">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Club Join Date</label>
                            <input type="date" class="form-control" name="club_join_date" value="{{old('club_join_date')}}">
                          </div>
                        </div>
                      </div>
                  </div>
                 
                  <div class="col-md-4">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('blood_group') != '') focused is-focused @endif">
                            <label class="form-label">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group" value="{{old('blood_group')}}">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
             
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Member</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @stop
  
  
    @section('js')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script>
      $(document).ready( function () {
        $('#myTable').DataTable();
    });
    </script>
    <script type="text/javascript">
      $(function () {
        $( "#tablecontents" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function(e) {
              updatePostOrder();
          }
        });

        function updatePostOrder() {
          var level = [];
          
          $('tr.row1').each(function(index, element) {
            level.push({
              id: $(this).attr('data-id'),
              level: index
            });
          });

          $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ url('admin/sort/members') }}",
            data: {
              level: level,
              "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    </script>
    @error('member_membership_no')
      <script>
        $(document).ready(function(){
            
            $('#AddNewMemberModal').modal('show');
        });
      </script>
      @enderror
  @endsection


  