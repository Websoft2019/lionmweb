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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewClubModal">Add Donor Type</button>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contribution</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lion Year</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($donors as $donor)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      @if($donor->photo)
                      <div>
                        <img src="{{ asset('site/uploads/program/'.$donor->photo) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      </div>
                      @else
                      <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                      @endif
                    </div>
                  </td>
                  
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $donor->title }}</span>
                  </td>
                  <td>
                    <div class="align-middle text-center">
                      <h6 class="mb-0 text-sm">50</h6>
                      <p class="text-xs text-secondary mb-0">/members</p>
                    </div>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $donor->lion_year }}</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Donor Type</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postAddDonorType') }}" method="POST" enctype="multipart/form-data">
          @csrf()
          <div class="modal-body">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Type *</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline">
                                    <label class="form-label">Min Cost</label>
                                    <input type="text" name="mincost" class="form-control">
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
                                    <label class="form-label">Detail</label>
                                    <textarea name="detail" class="form-control"></textarea>
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
            <button type="submit" class="btn btn-primary">Add Donor Type</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop