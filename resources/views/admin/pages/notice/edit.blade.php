@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">Edit News &amp; Event</h6>
                </div>
                <div class="col-6" style="text-align:right;">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddNewClubModal">Add News &amp;Event</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <div class="row">
                <div class="col-md-12" style="padding: 20px;">
                    <form action="{{ route('admin.postEditNotice', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        <div class="modal-body">
                              <div class="row" style="margin-bottom:10px;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                              <div class="input-group input-group-outline is-filled">
                                                  <label class="form-label">Program Title *</label>
                                                  <input type="text" name="title" class="form-control" value="{{$news->title}}" required>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row" style="margin-bottom:10px;">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                              <div class="input-group input-group-outline is-filled">
                                                  <label class="form-label">Detail</label>
                                                  <textarea name="detail" class="form-control">{!! $news->detail !!}</textarea>
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
                                            @if($news->photo)
                                                <img src="{{asset('site/uploads/news/'.$news->photo)}}" width="100" alt="">
                                            @endif
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Add News</button>
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