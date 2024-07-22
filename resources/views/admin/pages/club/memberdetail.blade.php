@extends('admin.template')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="text-white text-capitalize ps-3">{{ $member->name }} - {{ $member->member_membership_no }}</h6>
                </div>
                <div class="col-md-6" style="text-align: right;">
                  <a href="{{route('admin.getClubDetail', $club->slug)}}" class="btn btn-primary"> << Back to Club Profile</a>
                </div>
                
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
            
                
                    
                            <div class="modal-body">
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
                                <div class="row">
                                  <div class="col-lg-8 col-md-6">
                                    <div class="card">
                                      <div class="card-header pb-0">
                                        <div class="row">
                                          <div class="col-lg-6 col-7">
                                            <h6>Member Detail</h6>
                                            
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card-body px-0 pb-2">
                                        <div class="table-responsive">
                                          <div class="row">
                                            <div class="col-md-3" style="text-align:center;">
                                             @if($member->photo)
                                                 <img src="{{ asset('site/uploads/members/'.$member->photo) }}" alt="" width="100%">
                                             @else
                                                 <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="" width="100%">
                                             @endif
                                             <span><strong>{{ $member->status }} Member</strong></span><br/>
                                             @if($member->status == 'Drop')
                                             <a href="{{route('admin.getMakeActiveMember', $member->member_membership_no)}}" class="text-sm" onclick="return confirm('Are you sure? Your want to active this member?')">active this Member?</a>
                                             @endif
                                            </div>
                                            <div class="col-md-8">
                                                         <div class="event-details1__right">
                                                             <div class="row">
                                                             <div class="col-md-6">
                                                                 <div class="event-details__info">
                                                                     <ul class="list-unstyled event-details__info-list">
                                                                         <li>
                                                                             <p style="color:#033c8a;">{{ $member->name }} - ({{ $member->member_membership_no }})</p>
                                                                             <small style="display:block; line-height:10px">
                                                                                 @if($designation != Null)
                                                                                     {{ $designation->title }}
                                                                                 @else
                                                                                     Designation not set for year {{env('lion_year')}}.
                                                                                 @endif
                                                                             </small>
                                                                         </li>
                                                                         <li>
                                                                             <p style="line-height:45px; text-decoration: underline; color:#033c8a;">Home Club</p>
                                                                             <p style="line-height:16px;">{{ $club->name }}</p>
                                                                             <small style="display:block; line-height:25px">Join Date :
                                                                                 @if($member->club_join_date == NULL)
                                                                                 N/A
                                                                                 @else
                                                                                 {{ date('d M, Y', strtotime($member->club_join_date )) }}
                                                                                 @endif
                                                                             </small>
                                                                             @if($member->charter_member == 'Y')
                                                                             @if($member->charter_president == 'Y')
                                                                                 <small style="display: block; line-height:10px;">Charter President</small>
                                                                             @else
                                                                             <small style="display: block; line-height:10px;">Charter Member</small>
                                                                             @endif
                                                                         @endif
                                                                         </li>
                                                                         <li>
                                                                             <p style="line-height:45px; text-decoration: underline; color:#033c8a;">Sponsor By</p>
                                                                             <p style="line-height:10px;">{{ $member->sponsor_id }}</p>
                                                                         </li>
                                                                         <li>
                                                                             <p style="line-height:45px; text-decoration: underline; color:#033c8a;">Contrubution</p>
                                                                             <p>
                                                                                 @foreach($donations as $donation)
                                                                                    
                                                                                         @php $donor_type = App\Models\Donortype::where('id', $donation->donor_type_id)->limit(1)->first(); @endphp
                                                                                     {{ $donor_type->title }},
                                     
                                                                                 @endforeach
                                                                             </p>
                                                                         </li>
                                                                     </ul>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-6">
                                                                 <div class="event-details1__info">
                                                                     <div class="col-md-12 actionbox">
                                                                         <a data-bs-toggle="modal" data-bs-target="#EditMemberModal" class="btn btn-primary btn-sm">Modify</a>
                                                                         @if($member->status == 'Drop')
                                                                         <a href="{{ route('admin.getMemberDeleteParmantly', $member->member_membership_no) }}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure? Your want to permanently delete member?')">Delete Permanent</a>
                                                                         @else
                                                                         <a href="{{ route('admin.getMemberDrop', $member->member_membership_no) }}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure? You want to drop this member?')">Drop Member</a>
                                                                         @endif
                                                                     </div>
                                                                     <ul class="list-unstyled peronalinformation">
                                                                         <br />
                                                                         <li><strong style="color:#033c8a;">Address :</strong> {{ $member->address }}</li>
                                                                         <li><strong style="color:#033c8a;">Date Of Birth :</strong> {{ date('d M, Y', strtotime($member->dob )) }}</li>
                                                                         <li><strong style="color:#033c8a;">Gender :</strong> {{ $member->gender }}</li>
                                                                         <li><strong style="color:#033c8a;">Occupation :</strong> {{ $occupation->title }}</li>
                                                                         <li><strong style="color:#033c8a;">Spouse Name :</strong> {{ $member->spouse_name }}</li>
                                                                         <li><strong style="color:#033c8a;">Contact Number(s) :</strong>
                                                                             @if($member->home_contact_number)
                                                                             {{ $member->home_contact_number }} (home),
                                                                             @endif
                                                                             @if($member->office_contact_number)
                                                                             {{ $member->office_contact_number }} (Office),
                                                                             @endif
                                                                             {{ $member->personal_contact_number }} (Personal)
                                                                         </li>
                                                                         <li><strong style="color:#033c8a;">Email :</strong> {{ $member->email }}</li>
                                                                         <li><strong style="color:#033c8a;">Blood Group :</strong> {{ $member->blood_group }}</li>
                                                                     </ul>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                    
                                                 </div>
                                            </div>
                                         </div>
                                         </div>
                                 
                                 
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-6">
                                    <div class="card h-100">
                                      <div class="card-header pb-0">
                                        <h6>Member History</h6>
                                        <p class="text-sm">
                                          <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                           member joined
                                           @if($member->club_join_date)
                                           {{$member->club_join_date}}
                                           @else
                                            date not define.
                                           @endif
                                        </p>
                                      </div>
                                      <div class="card-body p-3">
                                        <div class="timeline timeline-one-side">
                                          @foreach($memberPostHistories as $history)
                                          @php $post = App\Models\Officer::where('id', $history->designation_id)->limit(1)->first(); @endphp
                                          <div class="timeline-block mb-3">
                                            <span class="timeline-step">
                                              <i class="material-icons text-success text-gradient">notifications</i>
                                            </span>
                                            <div class="timeline-content">
                                              <h6 class="text-dark text-sm font-weight-bold mb-0">{{$post->title}}</h6>
                                              <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{$history->lion_year}}</p>
                                            </div>
                                          </div>
                                          
                                          @endforeach
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="EditMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Member Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.postEditMember', $member->id) }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="club_id" value="{{$club->id}}">
          <input type="hidden" name="club_slug" value="{{$club->slug}}">
          @csrf()
          <div class="modal-body">
                  <div class="row mb-4">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline @if(old('photo') != '') focused is-focused @endif">
                            <label class="form-label">Photo </label>
                            <input type="file" name="photo" class="form-control  @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="fname" class="form-control  @error('fname') is-invalid @enderror" value="{{$member->name}}" required>
                            
                              @error('fname')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div>
                        <input type="checkbox" name="charter_member" @if($member->charter_member == 'Y') checked @endif> Charter Member?
                        <input type="checkbox" name="charter_president" @if($member->charter_president == 'Y') checked @endif> Charter President?
                      </div>
                  </div>
              </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Membership No * </label>
                            <input type="text" class="form-control" name="member_membership_no" value="{{$member->member_membership_no}}">
                            @error('member_membership_no')
                              {{$message}}
                            @enderror
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline focused is-focused">
                          <label class="form-label">Club Designation * </label>
                          <select class="form-control" name="designation_id" required>
                            @php $clubdesination = App\Models\Member_Designation_Enroll::where('department_id', Null)->where('member_id', $member->id)->where('lion_year', env('lion_year'))->limit(1)->first(); @endphp
                            @if($clubdesination)
                              @foreach($officers as $officer)
                              <option value="{{ $officer->id }}" @if($clubdesination->designation_id == $officer->id) selected @endif>{{ $officer->title }}</option>
                              @endforeach
                            @else
                            <option value="">{{env('lion_year')}} Club degination</option>
                            @foreach($officers as $officer)
                            <option value="{{ $officer->id }}">{{ $officer->title }}</option>
                            @endforeach
                            @endif
                        </select>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="row mb-4">
                  <div class="col-md-6">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{$member->email}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Gender *</label>
                            <select class="form-control" name="gender" required>
                                    <option value="Male" @php if($member->gender == 'Male'){ echo 'selected'; }  @endphp>Male</option>
                                    <option value="Female" @php if($member->gender == 'Female'){ echo 'selected'; } @endphp>Female</option>
                                    <option value="Other" @php if($member->gender == 'Other'){ echo 'selected'; } @endphp>Other</option>
                            </select>
                          </div>
                        </div>
                      </div>
                  </div> 
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{$member->dob}}">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row mb-4"> 
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Sponsor Name</label>
                            <input type="text" class="form-control" name="sponsor_name" value="{{$member->sponsor_id}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Personal Phone<small style="color:red;">*</small></label>
                            <input type="number" class="form-control" name="mobile_number" required value="{{$member->personal_contact_number}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Office Phone</label>
                            <input type="number" class="form-control" name="office_number" value="{{$member->office_contact_number}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Home Phone</label>
                            <input type="number" class= "form-control" name="home_number" value="{{$member->home_contact_number}}">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row mb-4">
                  <div class="col-md-5">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="{{$member->address}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Spouse/Companion Name</label>
                            <input type="text" class="form-control" name="spouse_name" value="{{$member->spouse_name}}">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Occupation <small style="color:red;">*</small></label>
                            <select class="form-control" name="occupation_id" required>
                                @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                  </div> 
              </div>
              <div class="row mb-4">
                  <div class="col-md-4">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Club Join Date</label>
                            <input type="date" class="form-control" name="club_join_date" value="{{$member->club_join_date}}">
                          </div>
                        </div>
                      </div>
                  </div>
                 
                  <div class="col-md-4">
                      <div class="form-group">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline focused is-focused">
                            <label class="form-label">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group" value="{{$member->blood_group}}">
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
             
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit Member Information</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
@section('js')
@error('member_membership_no')
  <script>
    $(document).ready(function(){
        
        $('#EditMemberModal').modal('show');
    });
  </script>
  @enderror
@endsection
