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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Club</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($members as $member)
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
                        <h6 class="mb-0 text-sm"><a href="">{{ $member->name }}</a></h6>
                        <small style="display: block;">{{ $member->personal_contact_number }}</small>
                        <p class="text-xs text-secondary mb-0">Member ID : {{ $member->member_membership_no }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0"></p>
                   
                    <p class="text-xs text-secondary mb-0">sdsdasdasd</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    @php
                        $clubinfo = App\Models\Club::where('id', $member->club_id)->limit(1)->first();
                        // dd($clubinfo);
                        $designationenroll1 =App\Models\Member_Designation_Enroll::where('member_id', $member->id)->where('department_id', '!=', Null)->where('lion_year', env('lion_year'))->limit(1)->first();
                       
                        if($designationenroll1){
                          
                            $desinationinfo = App\Models\Officer::where('id', $designationenroll1->designation_id)->limit(1)->first();
                        }
                        else{
                          
                            $desinationenroll = App\Models\Member_Designation_Enroll::where('member_id', $member->id)->where('department_id', Null)->where('lion_year', env('lion_year'))->limit(1)->first();
                            if($desinationenroll){
                            $desinationinfo = App\Models\Officer::where('id', $desinationenroll->designation_id)->limit(1)->first();
                            }
                            else{
                              $desinationinfo = Null;
                            }

                        }
                        
                    @endphp
                        {{$clubinfo->name}} ({{$clubinfo->club_membership_id}})
                    <small style="display: block;">
                      @if($desinationinfo != Null)
                      {{$desinationinfo->title}}
                      @else
                        Desination not set
                      @endif
                    </small>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                      {{$member->status}}
                    </span>
                  </td>
                  <td class="align-middle">
                    <a href="{{route('admin.getMemberDetail', $member->id)}}" target="_blank" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Member Detail">
                      Detail</a>
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
  
@stop
@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

@stop