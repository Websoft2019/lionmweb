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
                    <h6 class="text-white text-capitalize ps-3">District Team</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" href="{{ route('admin.getAddDistrictTeam') }}">Add New Team</a>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desigination</th>

                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($districtofficers as $districtofficer)
                @php
                    $member = App\Models\Member::where('member_membership_no', $districtofficer->club_member_id)->limit(1)->first();
                    $department = App\Models\Department::where('id', $districtofficer->department_id)->limit(1)->first();
                    $designation = App\Models\Officer::where('id', $districtofficer->designation_id)->limit(1)->first();
                @endphp
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">

                      <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                     
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $member->name }}</h6>
                        <p class="text-xs text-secondary mb-0">Member ID : {{ $member->club_membership_id }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{ $department->title }}</p>
                   
                    <p class="text-xs text-secondary mb-0">{{ $districtofficer->lion_year }}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    {{ $designation->title }}
                  </td>
                  <td class="align-middle">
                    <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Club">
                      Edit</a>
                      |
                    <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Club" onclick="return confirm('Club not deleted permanently, its hide from system.')">
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
  
@stop
@section('js')
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@stop