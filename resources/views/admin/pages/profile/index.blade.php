@extends('admin.template')
@section('content')
<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{asset('admin/assets/img/bruce-mars.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    <a href=""><i class="fas fa-user-edit text-secondary text-sm" style="position:absolute; right:0; bottom:0" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i><span class="sr-only">Edit Profile</span></a>
                </div>
            </div>
    <div class="col-auto my-auto">
        <div class="h-100">
            <h5 class="mb-1">{{Auth()->user()->name}}</h5>
            <p class="mb-0 font-weight-normal text-sm">Administrator</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                        <i class="material-icons text-lg position-relative">home</i>
                        <span class="ms-1">App</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false" tabindex="-1">
                <i class="material-icons text-lg position-relative">email</i>
                <span class="ms-1">Messages</span>
                </a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false" tabindex="-1">
                <i class="material-icons text-lg position-relative">settings</i>
                <span class="ms-1">Settings</span>
                </a>
                </li>
                <div class="moving-tab position-absolute nav-link" style="padding: 0px; transition: all 0.5s ease 0s; transform: translate3d(0px, 0px, 0px); width: 82px;"><a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">-</a></div></ul>
                </div>
    </div>
    </div>
    <div class="row">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profile Information</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a >
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i><span class="sr-only">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="card-body p-3">
             
            <hr class="horizontal gray-light my-4">
            <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{$profile->name}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{$profile->phone}}</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{$profile->email}}</li>
            </ul>
            </div>
            </div>
        </div>
    
    
    <div class="col-12 col-xl-6">
        <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Change Password</h6>
             </div>
            <div class="card-body p-3">
                @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
             @endforeach
             @if(session('message'))
                    <div class="alert alert-primary alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session('message') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                    @endif
                <form action="{{route('admin.postAdminPasswordChange')}}" method="POST">
                    @csrf()
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                    <div class="input-group input-group-outline">
                                      <label class="form-label">Current Password *</label>
                                      <input type="password" class="form-control" name="current_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                          <label class="form-label">New Password *</label>
                                          <input type="password" class="form-control" name="new_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="row" style="margin-bottom:10px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group input-group-outline">
                                          <label class="form-label">Confirm Password *</label>
                                          <input type="password" class="form-control" name="new_confirm_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
@stop