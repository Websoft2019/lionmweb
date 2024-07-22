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
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Officer</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lion Year</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($officers as $officer)
                <tr>
                  
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $officer->title }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $officer->type }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $officer->lion_year }}</span>
                  </td>
                  <td class="align-middle">
                    <a href="{{route('admin.getEditOfficer', $officer->id)}}" class="text-secondary font-weight-bold text-xs">
                      Edit
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
          <h5 class="modal-title" id="exampleModalLabel"> Add New Officer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postAddOfficer') }}" method="POST">
          @csrf()
          <div class="modal-body">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group input-group-outline focused is-focused">
                                    <label class="form-label">Officer Title</label>
                                    <input type="text" name="officertitle" class="form-control" required>
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
                                        <option value="other">Other</option>
                                        <option value="Club">Club</option>
                                        <option value="District">District</option>
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
                                    <input name="lion_year" class="form-control" value="{{env('lion_year')}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Officer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop