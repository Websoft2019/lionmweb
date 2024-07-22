@extends('admin.template')
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
                    <button class="btn btn-primary" hre="{{ route('admin.getManageClub') }}">Manage CLub</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="row">
                <div class="col-md-12" style="padding: 40px;">
                    @if(session('message'))
                    <div class="alert alert-primary alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session('message') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                    @endif
                    <form action="{{ route('admin.postAddNewClub') }}" method="POST">
                        @csrf()
                        <div class="modal-body">
                            <div class="row" style="margin-bottom:10px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline @if(old('name') != '') focused is-focused @endif">
                                              <label class="form-label">Club Name *</label>
                                              <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
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
                                            <div class="input-group input-group-outline @if(old('club_membership_id') != '') focused is-focused @endif">
                                              <label class="form-label">Club ID *</label>
                                              <input type="number" name="club_membership_id" class="form-control @error('club_membership_id') is-invalid @enderror" value="{{ old('club_membership_id') }}" required>
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
                                              <label class="form-label">Charter Date</label>
                                              <input type="date" name="charter_date" class="form-control @error('charter_date') is-invalid @enderror" value="{{ old('charter_date') }}" placeholder="Charter Date">
                                                @error('charter_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline @if(old('mother_club') != '') focused is-focused @endif">
                                              <label class="form-label">Mother Club</label>
                                              <input type="text" name="mother_club" class="form-control @error('mother_club') is-invalid @enderror" value="{{ old('mother_club') }}">
                                              @error('mother_club')
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
                                            <div class="input-group input-group-outline @if(old('contact_name') != '') focused is-focused @endif">
                                              <label class="form-label">Contact Person *</label>
                                              <input type="text" name="contact_name" value= "{{ old('contact_name') }}" class="form-control @error('contact_name') is-invalid @enderror" required>
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
                                              <option value="">Club's Designation</option>
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
                                            <div class="input-group input-group-outline @if(old('email') != '') focused is-focused @endif">
                                              <label class="form-label">Mobile</label>
                                              <input type="number" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required>
                                              
                                              @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <small style="display:block;">password will be send in this mobile number</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Add Clubs</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@stop