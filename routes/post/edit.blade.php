@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Donor Type</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewClubModal">Add Officer</button>
                </div>
            </div>
          </div>
        </div>
        @if(session('message'))
        <br />
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
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <div class="row">
                <div class="col-md-12" style="padding:30px">
                    <form action="{{ route('admin.postEditOfficer', $officer->id) }}" method="POST">
                        @csrf()
                        <div class="modal-body">
                              <div class="row" style="margin-bottom:10px;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                              <div class="input-group input-group-outline focused is-focused">
                                                  <label class="form-label">Officer Title</label>
                                                  <input type="text" name="officertitle" class="form-control" value="{{$officer->title}}" required>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row" style="margin-bottom:10px;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                              <div class="input-group input-group-outline focused is-focused">
                                                  <label class="form-label">Officer asscoiate with *</label>
                                                  <select name="associatewith" class="form-control" required>
                                                      <option value="other" <?php if($officer->type == 'other'){ echo 'selected'; } else{ echo ''; } ?>>Other</option>
                                                      <option value="Club" <?php if($officer->type == 'Club'){ echo 'selected'; } else{ echo ''; } ?>>Club</option>
                                                      <option value="District" <?php if($officer->type == 'District'){ echo 'selected'; } else{ echo ''; } ?>>District</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  
                              </div>
                              <div class="row" style="margin-bottom:10px;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                              <div class="input-group input-group-outline focused is-focused">
                                                  <label class="form-label">Lion Year</label>
                                                  <input name="lion_year" class="form-control" value="{{$officer->lion_year}}">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                      </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop