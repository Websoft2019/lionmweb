@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Governor's Team</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewClubModal">Add</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Home Club</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Infomation</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lion Year</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($teams as $team)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      @if($team->photo)
                      <div>
                        <img src="{{ asset('site/uploads/governorteams/'.$team->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      @else
                      <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      @endif
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $team->name }} - {{ $team->membership_id }}</h6>
                        <p class="text-xs text-secondary mb-0" style="color: blue !important;">{{ $team->designation }}</p>
                      </div>
                    </div>
                  </td>
                  
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $team->homeclub }}</span>
                  </td>
                  <td>
                    <div class="align-middle text-center">
                      <h6 class="mb-0 text-sm">{{ $team->contactnumber }}</h6>
                      <p class="text-xs text-secondary mb-0"> {{ $team->email }}</p>
                    </div>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $team->lion_year }}</span>
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
                @endforeach
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="AddNewClubModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Governor's Team</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postAddGovernorTeam') }}" method="POST" enctype="multipart/form-data">
          @csrf()
          <div class="modal-body">
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label class="form-label">Membership ID</label>
                                <input type="number" name="membership_id" class="form-control">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">

                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline focused is-focused">
                              <label class="form-label">Lion Year</label>
                              <input type="text" name="ly" class="form-control" value="2022/23" disabled>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-4">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label class="form-label">Mother Club</label>
                                <input type="text" name="mother_club" class="form-control" required>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row" style="margin-bottom:10px;">
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact_number" class="form-control">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                              <div class="input-group input-group-outline">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
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
                              <label class="form-label">Photo</label>
                              <input type="file" name="photo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Team</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop