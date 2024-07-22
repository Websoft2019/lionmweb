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
                    <h6 class="text-white text-capitalize ps-3">District Edit - {{ env('lion_year') }}</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewDepartment">Back to Department</a>
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
            <form action="{{ route('admin.postEditDepartment', $department->id) }}" method="POST">
                @csrf()
                <div class="modal-body">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                      <label for="">Department Name &nbsp;</label>
                                      <input class="form-control" type="text" name="department" value="{{$department->title}}" required>
                                    </div>
                                </div>
                            </div>
                            <div>
                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              <input type="checkbox" name="region" value="Y" <?php if($department->region == 'Y'){ echo 'checked'; } ?>> Region?
                              <input type="checkbox" name="zone" value="Y" <?php if($department->zone == 'Y'){ echo 'checked'; } ?>> Zone?
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                  <div class="input-group input-group-outline">
                                    <input class="form-control" type="text" value="{{ $department->lion_year}}" disabled>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit Department</button>
                </div>
              </form>
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