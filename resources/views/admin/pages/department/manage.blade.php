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
                    <h6 class="text-white text-capitalize ps-3">District Department - {{ env('lion_year') }}</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewDepartment">Add District Department</a>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Member</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lion Year</th>

                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                {{-- <?php  dd($departments); ?> --}}
               
                @foreach($departments as $department)
                <tr>
                  <td>
                    <form action="{{route('admin.postDepartmentPositionChange', $department->id)}}" method="POST">
                      @csrf()
                      <input type="number" class="position" name="position" id="position" style="width: 60px" value="{{$department->position}}">
                    </form>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                     
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $department->title }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    @php
                    
                    $countmember = App\Models\Member_Designation_Enroll::where('department_id', $department->id)->count();
                    @endphp
                    <p class="text-xs font-weight-bold mb-0">{{$countmember}}<small>/members</small></p>
                   
                   
                  </td>
                  <td>{{ $department->lion_year }}</td>
                  <td class="align-middle">
                    @if($department->region != NULL)
                      <a href="{{route('admin.getAddDepartmentMember', $department->id)}}" class="text-secondary font-weight-bold text-xs">
                      Manage Region</a>|
                    @elseif($department->zone != NULL)
                      <a href="{{route('admin.getAddDepartmentMember', $department->id)}}" class="text-secondary font-weight-bold text-xs">
                      Manage Zone</a>|
                    @else
                      <a href="{{route('admin.getAddDepartmentMember', $department->id)}}" class="text-secondary font-weight-bold text-xs">
                      Manage Members</a>|
                    @endif
                    <a href="{{route('admin.getDepartmentEdit', $department->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Department">
                      Edit</a>
                      |
                    <a href="{{route('admin.getDeleteDepartment', $department->id)}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Department" onclick="return confirm('Department not deleted permanently, its hide from system.')">
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

  <div class="modal fade" id="AddNewDepartment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postAddDepartment') }}" method="POST">
          @csrf()
          <div class="modal-body">
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-8">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label for="">Department Name &nbsp;</label>
                                <input class="form-control" type="text" name="department" required>
                              </div>
                          </div>
                      </div>
                      <div>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <input type="checkbox" name="region" value="Y"> Region?
                        <input type="checkbox" name="zone" value="Y"> Zone?
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                              <input class="form-control" type="text" value="{{ env('lion_year') }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Department</button>
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
    $('#myTable').DataTable();
} );
</script>
<script>
  $('.position').on('change', function() {
    $(this).closest('form').submit();
});
</script>

@stop