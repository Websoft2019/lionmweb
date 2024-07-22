@extends('admin.template')
@section('css')
<style>
  label{
      color: #FF1A43;
      font-weight: bold;
      margin-top: 20px;
  }
  h1, h2, h3, h4, h5, h6 {
  color: #2c3145;
}
a, a:hover, a:focus, a:active {
  text-decoration: none;
  outline: none;
}
ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.section-padding {
  padding: 80px 0;
  margin-top: 15px;
}
#portfolio {
  background: #f7f7f7;
  min-height: 100vh;
}

.portfolio-tabs {
  margin-bottom: 50px;
}

.nav-tabs {
  border: none;
  width: 60%;
  margin: 0 auto;
  text-align: center;
  border: 1px solid #ebebeb;
  border-bottom: 2px solid #ebebeb;
  border-radius: 20px;
}

.nav-tabs .nav-item:first-child .nav-link {
  border-radius: 20px 0 0 20px;
}

.nav-tabs .nav-item:last-child .nav-link {
  border-radius: 0 20px 20px 0;
}

.nav-tabs .nav-item {
  width: 50%;
}
#memberName{
font-weight: bold;
}

.nav-tabs a.nav-link {
  color: #5e6271;
  background: #fff;
  -webkit-transition: .3s all;
  transition: .3s all;
  border: none;
}

.nav-tabs .nav-link.active {
  border: none;
  color: #fff;
  border-radius: 0;
}

.nav-tabs .nav-link.active:hover, .nav-tabs .nav-link.active {
  color: #fff !important;
}

.tab-pane.active {
  -webkit-animation: slide-down .3s ease-in;
          animation: slide-down .3s ease-in;
}

@-webkit-keyframes slide-down {
  0% {
      -webkit-transform: scaleY(0);
              transform: scaleY(0);
  }
  100% {
      -webkit-transform: scaleY(1);
              transform: scaleY(1);
  }
}

@keyframes slide-down {
  0% {
      -webkit-transform: scaleY(0);
              transform: scaleY(0);
  }
  100% {
      -webkit-transform: scaleY(1);
              transform: scaleY(1);
  }
}

.tab-content ul li {
  width: 46%;
  float: left;
  padding: 15px;
  -webkit-transition: .3s all;
  transition: .3s all;
  border-bottom: 1px dashed #dedede;
  margin-right: 30px;
}

.tab-content ul li:hover {
  border-radius: 2px;
  background: #fff;
  box-shadow: -2.505px 17.825px 23px 0px rgba(42, 57, 63, 0.15);
  border-color: #fff;
}

.tab-content ul li img {
  float: left;
  margin-right: 20px;
}

.tab-content ul li h4 {
  margin-top: 14px;
  margin-bottom: 8px;
  -webkit-transition: .3s all;
  transition: .3s all;
      font-size: 18px;
}
h1, h2, h3, h4, h5, h6 {
  color: #2c3145;
}
.tab-content ul li h4 .price {
  float: right;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Dancing Script', cursive;
  color: #ec5598;
}
.tab-content ul li:nth-child(7),
.tab-content ul li:nth-child(8) {
  border-bottom: 0;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
  color: #495057;
  background-color: #fff;
  border-color: #ddd #ddd #fff;
  background: #ec5598;
}
#eventinfo {
  display: none;
}

</style>
<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
  .dataTables_wrapper{
    padding: 30px;
  }
</style>
@stop
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Registration</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewClubModal"> New Registration</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="row">
            <div class="col-md-12" style="padding: 20px;">
              @if(session('message'))
                    <div class="alert alert-primary alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session('message') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                    @endif
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
                <div class="portfolio-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#memberwise">Member Wise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#clubwise">Club Wise</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="memberwise" class="tab-pane fade-in active">
                        <div class="table-responsive">
                          <div class="table-responsive p-0">
                              <div class="row">
                                <div class="col-md-12" style="text-align: right;">
                                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MemberregisterModal">Individual Member Register</a>
                                </div>
                              </div>
                            <table class="table align-items-center mb-0" id="myTable">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Club Name</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registered Date</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cost</th>
                                  <th class="text-secondary opacity-7"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($registered_members as $item)
                                    @php
                                        $memberinfo = App\Models\Member::where('member_membership_no', $item->member_id)->limit(1)->first();
                                        $clubinfo = App\Models\Club::find($item->club_id);
                                    @endphp
                                <tr>
                                  <td>
                                    <div class="d-flex px-2 py-1">
                                      @if($memberinfo->photo)
                                      <div>
                                        <img src="{{ asset('site/uploads/members/'.$memberinfo->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                      </div>
                                      @else
                                      <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                      @endif
                                      <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $memberinfo->name }}</h6>
                                        <p class="text-xs text-secondary mb-0">Membership ID : {{ $memberinfo->member_membership_no }} <br /> Registration Code : {{ $item->hash }}-{{ $memberinfo->member_membership_no }}</p>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $clubinfo->name }}
                                    </p>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    {{ $item->created_at->format('d M, Y') }}
                                  </td>
                                  <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                    NPR {{$item->cost}}
                                    <small style="display: block;">{{$item->payment_type}}</small>
                                    </span>
                                  </td>
                                  <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs">
                                      Detail
                                    </a>
                                  |
                                    <a href="{{route('admin.getBookingMemberPrintMaterials', $item->id)}}" class="text-secondary font-weight-bold text-xs">
                                      Print Event Tag
                                    </a>
                                    |
                                    <a href="{{route('admin.getBookingMemberPrintMaterials', $item->id)}}" class="text-secondary font-weight-bold text-xs">
                                      Print Coupon
                                    </a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div> 
                        </div>
                    </div>
                    <div id="clubwise" class="tab-pane">
                        <div class="table-responsive">
                          <div class="table-responsive p-0">
                            <div class="row">
                              <div class="col-md-12" style="text-align: right;">
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ClubGroupMemberRegisterModal">Club Group Members Register</a>
                              </div>
                            </div>
                            <table class="table align-items-center mb-0" id="myTable1">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Registration</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Cost</th>
                                  <th class="text-secondary opacity-7"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($allclubs as $club)
                                  @php
                                    $totalregister = App\Models\EventRegisterMember::where('club_id', $club->id)->where('registration_id', $eventinfo->id)->where('payment_status', 'Y')->count();
                                    $totalcost = App\Models\EventRegisterMember::where('club_id', $club->id)->where('registration_id', $eventinfo->id)->where('payment_status', 'Y')->sum('cost');
                                  @endphp
                                  @if($totalregister > 0)
                                    <tr>
                                      <td>
                                        <div class="d-flex px-2 py-1">
                                          <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                      
                                          <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $club->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">Club ID : {{ $club->club_membership_id }}</p>
                                        </div>
                                      </td>
                                      <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{$totalregister}} Person
                                        </p>
                                      </td>
                                      <td class="align-middle text-center text-sm">
                                        NPR {{ $totalcost }}
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
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="MemberregisterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
          @csrf()
          <div class="modal-body">
              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-4">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <!-- <label class="form-label">Registration on</label> -->
                            <input type="text" class="form-control" value="{{$eventinfo->title}}" readonly>
                            
                          </div>
                      </div>
                  </div>
              </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <!-- <label class="form-label">Membership ID *</label> -->
                                <input type="text" id="searchvalue" name="searchvalue" class="form-control" placeholder="Member ID or name" required>
                                <div id="memberlist"></div>
                                <span id="successmessage" style="color:red"></span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <input type="hidden" id="membershipno">
                              <button class="btn btn-primary" id="membersSearchforgister">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                  
              </div>
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-3">
                    <span id="memberPhoto"></span>
                  </div>
                  <div class="col-md-4">
                    <span id="memberName"></span> <br />
                    <span id="homeClub"></span> <br />
                    <span id="clubDesignation"></span> <br />
                  </div>
                  <div class="col-md-5" id="eventinfo">
                    <h6>{{$eventinfo->title}}</h6>
                    <small>{{$eventinfo->vennue}}</small>
                    <small>{{$eventinfo->date}} {{$eventinfo->time}}</small>
                    <h6>Rs. {{$eventinfo->cost}}<small>/per person</small></h6>
                    <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline">
                            <!-- <label class="form-label">Membership ID *</label> -->
                            <input type="text" class="form-control" id="billno" placeholder="Bill Number" required>
                            
                          </div>
                      </div>
                  </div>
                    
                  </div>
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closemodel" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="registermember" disabled>Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ClubGroupMemberRegisterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Register Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('admin.clubMembeRegister', $eventinfo->id)}}" method="POST" name="main">
          @csrf()
          <div class="modal-body">
              <div class="row" style="margin-bottom:10px;">
                <div class="col-md-4">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <!-- <label class="form-label">Registration on</label> -->
                            <input type="text" class="form-control" value="{{$eventinfo->title}}" readonly>
                            
                          </div>
                      </div>
                  </div>
              </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <!-- <label class="form-label">Membership ID *</label> -->
                                <input type="text" id="clubsearch" name="clubsearch" class="form-control" placeholder="Club No. or name" required>
                                <div id="clublist"></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <input type="hidden" id="membershipno">
                              <button class="btn btn-primary" id="membersSearchforgister">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                  
              </div>
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-8">
                    <span id="clubmemberlist"></span>
                  </div>
                  <div class="col-md-4" id="eventinfoclub">
                    <h6>{{$eventinfo->title}}</h6>
                    <small>{{$eventinfo->vennue}}</small>
                    <small>{{$eventinfo->date}} {{$eventinfo->time}}</small> <br />
                    <span id="totacost"></span> <span id="countselectedmember"></span>
                    <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline">
                            <!-- <label class="form-label">Membership ID *</label> -->
                            <input type="text" class="form-control" name="billnogroup" id="billnogroup" placeholder="Bill Number" required>
                            <span id="billnoerror"></span>
                            <input type="hidden" id="clubidforregistergroup" name="clubidforregistergroup">
                          </div>
                      </div>
                  </div>
                    
                  </div>
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closemodel" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="registerclubmember">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@stop
@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable1').DataTable();
} );
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
  $(document).ready(function() {
      $("#searchvalue").on('keyup', function(e) { 
          e.preventDefault();
              let searchvalue = $('#searchvalue').val();
              $.ajax({
						url: "/admin/ajax/search/membersforregister",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								searchvalue:searchvalue,
                eventid:"{{$eventinfo->id}}",
							},
							success:function(response)
							{
                $("#memberlist").html(response.data);
              }
            });
            
      });
      $(document).on('click','li.listed-zone-name', function(e){
      e.preventDefault();
      
        var value = $(this).text();
        var valueid = $(this).attr('id');
       
        $("#searchvalue").val(value);
        $("#membershipno").val(valueid);
        $("#memberlist").html("");
        $.ajax({
						url: "/admin/ajax/search/membership",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								membershipid:valueid,
                eventid:"{{$eventinfo->id}}",

							},
							success:function(response)
							{
                $("#memberName").html(response.membername);
                $("#memberPhoto").html(response.memberphoto);
                $("#homeClub").html(response.memberhomeclub);
                $("#clubDesignation").html(response.memberdesignation);
                
                document.getElementById("eventinfo").style.display = "block";
                if(response.booked == 'notallowbooking'){
                  $("#billno").val("Already Register");
                  $("#billno").prop('disabled', true);
                  $("#registermember").prop('disabled', true);
                }
                else{
                  $("#registermember").prop('disabled', false);
                  $("#billno").prop('disabled', false);
                }
              }
            });

    })
    $(document).on('click','#registermember', function(e){
      e.preventDefault();
      let membershipno = $('#membershipno').val();
      let billno = $('#billno').val();
      if(billno != ''){
      $.ajax({
						url: "/admin/ajax/postMemberRegistration",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								membershipno:membershipno,
                eventid:"{{$eventinfo->id}}",
                billno:billno,
							},
							success:function(response)
							{
                $("#memberlist").html("");
                $("#searchvalue").val("");
                $("#membershipno").val("");
                $("#memberName").html("");
                $("#memberPhoto").html("");
                $("#homeClub").html("");
                $("#clubDesignation").html("");
                $("#billno").html("");
                $("#billno").val("");
                $("#registermember").prop('disabled', true);
                document.getElementById("eventinfo").style.display = "none";
                $("#successmessage").html("Member Registrtion Success (Bill No :"+billno+")");
              }
            });
          }
        else{
          $("#billnoerror").html('Bill Number Required');
        }  
    });
    $(document).on('click','#closemodel', function(e){
      e.preventDefault();
                $("#memberlist").html("");
                $("#searchvalue").val("");
                $("#membershipno").val("");
                $("#memberName").html("");
                $("#memberPhoto").html("");
                $("#homeClub").html("");
                $("#clubDesignation").html("");
                $("#billno").html("");
                $("#billno").val("");
                $("#registermember").prop('disabled', true);
                
                document.getElementById("eventinfo").style.display = "none";
    });
  });
</script>
<script>
  $(document).ready(function() {
      $("#clubsearch").on('keyup', function(e) { 
          e.preventDefault();
              let clubsearch = $('#clubsearch').val();
              $.ajax({
						url: "/admin/ajax/autocomplete/search/clublist",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								clubsearch:clubsearch
							},
							success:function(response)
							{
                $("#clublist").html(response.data);
              }
            });
            
      });
      $(document).on('click','li.listed-club-name', function(e){
        
      e.preventDefault();
      
        var value = $(this).text();
        var valueid = $(this).attr('id');
       
        $("#clubsearch").val(value);
        $("#membershipno").val(valueid);
        $("#clublist").html("");
        $.ajax({
						url: "/admin/ajax/club/membersforregister",
						type:"POST",
						data:{
								"_token": "{{ csrf_token() }}",
								clubid:valueid,
                eventid:"{{$eventinfo->id}}",

							},
							success:function(response)
							{
                $("#clubmemberlist").html(response.members);
                $("#clubidforregistergroup").val(valueid);
                $('.membercheckbox').click(function() {
                  var a = document.forms["main"];
                  var cost = "<?php echo $eventinfo->cost; ?>";
                  var x =a.querySelectorAll('input[type="checkbox"]:checked');
                  var totalcost =  x.length*cost;
                  document.getElementById("countselectedmember").innerHTML = ' ('+x.length+' lion members selected )';
                  document.getElementById("totacost").innerHTML = 'NPR.'+totalcost;

              });
                
              }
            });
    })
    
    });
</script>
<script>
    $(document).ready(function() {
   
});
</script>

@stop