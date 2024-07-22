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
                    <h6 class="text-white text-capitalize ps-3">{{$departmentinfo->title}} Team - {{ env('lion_year') }}</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" href="{{route('admin.getManageDistrictDepartment')}}">Back to Department Lists</a>
                </div>
                
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <div class="row">
              <div class="col-md-12" style="padding: 0 40px;">
                <form action="{{ route('admin.postAddDepartmentMember') }}" method="POST">
                    @csrf()
                  <div class="modal-body">
                      <div class="row" style="margin-bottom:10px;">
                          <div class="col-md-4">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline is-filled">
                                      <label class="form-label">Department Name *</label>
                                      <input type="text" name="departmentname" class="form-control" value="{{$departmentinfo->title}}" readonly>
                                      
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
                                        <input type="hidden" name="departmentid" id="departmentID" value="{{$departmentinfo->id}}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                      <!-- <label class="form-label">Lion year *</label> -->
                                      <input class="form-control" type="text" value="{{ env('lion_year') }}" disabled>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                      <button  id="searchmember" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div id="searchResult" style="display: none;">
                      <div class="row" style="margin-bottom:10px;">
                          <div class="col-md-2">
                            <span id="memberPhoto"></span>
                          </div>
                          <div class="col-md-10">
                            <div style="margin-left: 50px;">
                              <span id="memberName"></span> <br />
                            <span id="homeClub"></span> <br />
                            <span id="clubDesignation"></span> <br />
                            <div class="form-group">
                              <select name="post_id" class="" id="postSelectInput" style="display: none;" required>
                                @if($departmentinfo->zone == 'Y')
                                    <option value="40"> Zone Chairperson</option>
                                @elseif($departmentinfo->region == 'Y')
                                <option value="39">Region Chairperson</option>
                                @else
                                  @foreach($posts as $post)
                                  <option value="{{$post->id}}">{{$post->title}}</option>
                                  @endforeach
                                @endif
                                  
                              </select>
                            </div>
                            <div class="form-group">
                              <br />
                            <input type="submit" class="btn btn-primary addMemberButton" id="donorSubmitButton" value="" disabled>
                            </div>
                            </div>
                          </div>
                      </div>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
            <table class="table align-items-center mb-0" id="<?php if($departmentinfo->zone == 'Y' || $departmentinfo->region == 'Y') { echo ''; } else {echo 'myTable'; }?>">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Home Club</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Post</th>
                  
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lion Year</th>

                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($members as $member)
                @php
                  $memberinfo = App\Models\Member::where('id', $member->member_id)->limit(1)->first();
                  $postinfo = App\Models\Officer::where('id', $member->designation_id)->limit(1)->first();
                  $clubinfo = App\Models\Club::where('id', $memberinfo->club_id)->limit(1)->first();
                @endphp
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      @if($memberinfo->photo == Null)
                      <div>
                        <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      @else
                      <div>
                        <img src="{{ asset('site/uploads/members/'.$memberinfo->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      @endif
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $memberinfo->name }} - {{$member->id}}</h6>
                        <p class="text-xs text-secondary mb-0">Member ID : {{ $memberinfo->member_membership_no }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{$clubinfo->name}}</h6>
                    
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{$departmentinfo->title}}</h6>
                    <p class="text-xs font-weight-bold mb-0">{{$postinfo->title}}</p>
                  
                  
                  </td>
                  <td>-</td>
                  <td class="align-middle">
                    
                    <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Club">
                      Edit</a>
                      |
                    <a href="{{route('admin.getDeleteEnrollMember', $member->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Club" onclick="return confirm('Are you sure you want to delete?.')">
                      Delete111
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
            <hr>
            <hr>
          
          </div>
         @if($type == 'region')
          <div class="container">
            <div class="row">
              <div class="table-responsive p-0">
                <div class="col-md-12">
                  <h5>Add Zone</h5>
                  
                    <form action="{{route('admin.postAddRegionKoZone')}}" method="POST">
                      @csrf()
                      <div class="row">
                       <div class="col-md-5">
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline is-filled">
                                    <label class="form-label">Department Name *</label>
                                    <input type="text" name="departmentname" class="form-control" value="{{$departmentinfo->title}}" readonly>
                                    <input type="hidden" name="regionid" value="{{$departmentinfo->id}}">
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                      <!-- <label class="form-label">Club Name Or ID *</label> -->
                                      <input type="text" id="zonenamesearch" name="zonename" class="form-control" value="" required>
                                      <input type="hidden" id="zoneid" name="zoneid" value="" required>
                                    </div>
                                </div>
                                <div id="zonelist"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline">
                                    <!-- <label class="form-label">Lion year *</label> -->
                                    <input class="form-control" type="text" value="{{ env('lion_year') }}" disabled>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline">
                                    <input type="submit" class="btn btn-primary" value="Add Zone">
                                  </div>
                              </div>
                          </div>
                        </div>
                       </div>
                       <div class="col-md-7">
                        <h6>List of Enroll Zones {{env('lion_year')}}</h6>
                        <div class="row">
                          @if($zones->count())
                            @foreach($zones as $zone)
                            @php
                              $getzoneinfo = App\Models\Department::where('id', $zone->department_id_zone)->limit(1)->first();
                              $zonechairperson = App\Models\Member_Designation_Enroll::where('department_id', $getzoneinfo->id)->limit(1)->first();
                              
                            @endphp
                              <div class="col-md-6">
                                <div style="background-color: gray; padding:10px">
                                  <span><strong style="color: Yellow;">{{$getzoneinfo->title}}</strong></span> <br />
                                  <span>
                                    <strong style="color: #fff;">
                                      @if($zonechairperson)
                                      @php $zonechairpersonname = App\Models\Member::where('id', $zonechairperson->member_id)->limit(1)->first(); @endphp
                                        {{$zonechairpersonname->name}} -{{$zonechairpersonname->member_membership_no}}
                                        <small style="display:block;">{{$zonechairpersonname->personal_contact_number}}</small>
                                      @else
                                        Zone Chairperson not define yet.
                                      @endif
                                    </strong>
                                  </span><br />
                                  <strong style="color: yellow">Clubs Enroll</strong> <br />
                                  <ul>
                                    <li>lions club of Pokhara Annapurna</li>
                                  </ul>

                                </div>
                              </div>
                            @endforeach
                          @else
                              <p>No zone enroll yet!!!</p>
                          @endif
                        </div>
                       </div>
                      </div>
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
          @endif
          @if($type == 'zone')
          <div class="container">
            <div class="row">
              <div class="table-responsive p-0">
                <div class="col-md-12">
                  <h5>Add Club</h5>
                  
                    <form action="{{route('admin.postAddZoneKoClub')}}" method="POST">
                      @csrf()
                      <div class="row">
                       <div class="col-md-5">
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline is-filled">
                                    <label class="form-label">Zone</label>
                                    <input type="text" name="departmentname" class="form-control" value="{{$departmentinfo->title}}" readonly>
                                    <input type="hidden" name="zoneid" value="{{$departmentinfo->id}}">
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                      <label class="form-label">Club Name Or ID *</label>
                                      <input type="text" id="clubnamesearch" name="clubname" class="form-control" value="" required>
                                      <input type="hidden" id="clubid" name="clubid" value="" required>
                                    </div>
                                </div>
                                <div id="clublist"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline">
                                    <!-- <label class="form-label">Lion year *</label> -->
                                    <input class="form-control" type="text" value="{{ env('lion_year') }}" disabled>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline">
                                    <input type="submit" class="btn btn-primary" value="Add Club">
                                  </div>
                              </div>
                          </div>
                        </div>
                       </div>
                       <div class="col-md-7">
                        <h6>List of Enroll Clubs {{env('lion_year')}}</h6>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Club Info</th>
                                <th>Total Member</th>
                                <th></th>
                              </tr>
                              <tbody>
                                @if($enrollclubs->count())
                                @foreach($enrollclubs as $club)
                                  @php
                                    $clubinfo = App\Models\Club::where('id', $club->club_id)->limit(1)->first();
                                    $clubtotalmember = App\Models\Member::where('club_id', $club->club_id)->where('status', 'active')->count();
                                  @endphp
                                  <tr>
                                    <td>{{$clubinfo->name}}</td>
                                    <td>{{$clubtotalmember}}<small>/members</small></td>
                                    <td><a href="{{route('admin.getZoneEnrollClubDelete', $club->id)}}" onclick="return confirm('Are you sure remove club from zone?')">Remove</a></td>
                                  </tr>
                                @endforeach
                                @else
                                <tr>
                                  <td colspan="3">No any Club assign.</td>
                                </tr>
                                @endif
                              </tbody>
                            </thead>
                          </table>
                       </div>
                      </div>
                    </form>
                  
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

@stop
@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.3/typeahead.bundle.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
 
$('#searchmember').click(function(e) {
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
                
                if(response.status == 'false'){
                  
                  alert("Nothing Found");
                }
                else{
                document.getElementById("memberName").innerHTML = 'Full Name : '+response.membername;
                document.getElementById("homeClub").innerHTML = 'Home Club : '+response.memberhomeclub;
                document.getElementById("clubDesignation").innerHTML = 'Designation : '+response.memberdesignation;
                document.getElementById("memberPhoto").innerHTML = response.memberphoto;
                document.getElementById("clubID").value = response.clubid;
                var departmentTitle = $("#departmentTitle").val();
                document.getElementById("donorSubmitButton").value = 'Add Member on ' +departmentTitle;
                  if(response.clubid == 'NULL'){
                    $("#donorSubmitButton").prop('disabled', true);
                  }
                  else{
                    $("#donorSubmitButton").prop('disabled', false);
                    document.getElementById('postSelectInput').style.display = "block";
                    document.getElementById('searchResult').style.display = "block";
                  }

                  
                  
                
                
                
                  
                }
                
              }
              
            });
            
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    
    $("#zonenamesearch").on('keyup change', function(){
     
      var value = $(this).val();
      
      $.ajax({
        url:"{{route('admin.getAutoCompleteZoneList')}}",
        type:"GET",
        data:{'zonename':value},
        success:function(data){
          $("#zonelist").html(data);
        }
      })
    });

    $(document).on('click','li.listed-zone-name', function(e){
      e.preventDefault();
      
        var value = $(this).text();
        var valueid = $(this).attr('id');
       
        $("#zonenamesearch").val(value);
        $("#zoneid").val(valueid);
        $("#zonelist").html("");

    })
  
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
   
    $("#clubnamesearch").on('keyup change', function(){
      var value = $(this).val();
      
      $.ajax({
        url:"{{route('admin.getAutoCompleteClubList')}}",
        type:"GET",
        data:{'clubname':value},
        success:function(data){
          $("#clublist").html(data);
        }
      })
    });

    $(document).on('click','li.listed-club-name', function(e){
      e.preventDefault();
        var value = $(this).text();
        var valueid = $(this).attr('id');
       
        $("#clubnamesearch").val(value);
        $("#clubid").val(valueid);
        $("#clublist").html("");

    })
  
});
</script> 
@stop