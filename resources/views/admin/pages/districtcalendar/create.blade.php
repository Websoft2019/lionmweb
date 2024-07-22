@extends('admin.template')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="text-white text-capitalize ps-3">District Calendar</h6>
                            </div>
                            <div class="col-6" style="text-align:right;">
                                <a class="btn btn-primary" href="{{ route('admin.district_calender.index') }}">Manage District Calender</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <div class="col-md-12" style="padding: 40px;">
                            @if (session('message'))
                                <div class="alert alert-primary alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ session('message') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('admin.district_calender.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf()
                                <div class="modal-body">
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                                    <div
                                                        class="input-group input-group-outline @if (old('name') != '') focused is-focused @endif">
                                                        <label class="form-label">Event Name *</label>
                                                        <input type="text" name="name"
                                                            class="form-control  @error('name') is-invalid @enderror"
                                                            value="{{ old('name') }}" required>
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
                                                    <div
                                                        class="input-group input-group-outline @if (old('location') != '') focused is-focused @endif">
                                                        <label class="form-label">Location</label>
                                                        <input type="text" name="location"
                                                            class="form-control @error('location') is-invalid @enderror"
                                                            value="{{ old('location') }}">
                                                        @error('location')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-4">
                                            <div class="form-group">
                                                <div>Month:</div>
                                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                                    <div
                                                        class="input-group input-group-outline @if (old('month') != '') focused is-focused @endif">
                                                        <input type="month" name="month"
                                                            class="form-control @error('month') is-invalid @enderror"
                                                            value="{{ old('month') }}" accept=".pdf" required>
                                                        @error('month')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-4">
                                            <div class="form-group">
                                                <div>Day :</div>
                                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                                    <div
                                                        class="input-group input-group-outline @if (old('day') != '') focused is-focused @endif">
                                                        <input type="text" name="day"
                                                            class="form-control @error('day') is-invalid @enderror"
                                                            value="{{ old('day') }}" accept=".pdf" placeholder="Day" required>
                                                        @error('day')
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
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
