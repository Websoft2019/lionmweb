@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Add New Registration</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a class="btn btn-primary" href="{{route('admin.getRegistrationList')}}">Manage Registration</a>
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
                    <form action="{{ route('admin.postAddNewRegistration') }}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        <div class="modal-body">
                            <div class="row" style="margin-bottom:10px;">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Registration Title *</label>
                                              <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Lion Year *</label>
                                              <input type="text" name="lionyear" class="form-control" value="{{ env('lion_year') }}" readonly>
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
                                              <label class="form-label">Per Club max person *</label>
                                              <input type="number" name="maxperson" class="form-control @error('maxperson') is-invalid @enderror" value="{{ old('maxperson') }}">
                                                @error('maxperson')
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
                                              <label class="form-label">Registration Cost *</label>
                                              <input type="number" name="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost') }}">
                                              @error('cost')
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
                                              <label class="form-label">Event/Program Date *</label>
                                              <input type="date" name="date" value= "{{ old('date') }}" class="form-control @error('date') is-invalid @enderror" required>
                                              @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:10px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Vennue *</label>
                                              <input type="text" name="vennue" value= "{{ old('vennue') }}" class="form-control @error('vennue') is-invalid @enderror" required>
                                              @error('vennue')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Time *</label>
                                              <input type="time" name="time" value= "{{ old('time') }}" class="form-control @error('time') is-invalid @enderror" required>
                                              @error('time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Registration Deadline *</label>
                                              <input type="date" name="deadline" value= "{{ old('deadline') }}" class="form-control @error('deadline') is-invalid @enderror" required>
                                              @error('deadline')
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Host Club</label>
                                              <textarea name="hostclub" value= "{{ old('hostclub') }}" class="form-control @error('hostclub') is-invalid @enderror">{{ old('hostclub') }}</textarea>
                                              @error('hostclub')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline">
                                              <!-- <label>Coupon</label> -->
                                               <span style="display: block;"><input type="checkbox" name="BFC">&nbsp;  Breakfast Coupon</span>
                                                <span style="display: block;"><input type="checkbox" name="LC">&nbsp;  Lunch Coupon</span>  
                                                <span style="display: block;"><input type="checkbox" name="DC">&nbsp;  Dinner Coupon &nbsp;</span>
                                                <span style="display: block;"><input type="checkbox" name="TC">&nbsp;  Tea Coupon </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                            <div class="input-group input-group-outline focused is-focused">
                                              <label class="form-label">Registration For</label>
                                              <input type="text" name="registrationfor" class="form-control">
                                              
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
                                              <label class="form-label">About Program</label>
                                              <textarea name="detail" class="form-control @error('detail') is-invalid @enderror" value="{{ old('detail') }}" required>{{old('detail')}}</textarea>
                                              @error('detail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Add Registration</button>
                        </div>
                      </form>
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@stop