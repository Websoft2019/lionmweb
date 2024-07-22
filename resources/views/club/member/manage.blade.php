@extends('site.template')
@section('content')
<section class="page-header">
    <div class="page-header-bg">
    </div>
    <div class="container">
        <div class="page-header__inner">
           <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <a href="{{ route('club.getAddMember') }}" class="thm-btn about-one__btn">Add Member</a>
            </div>
           </div>
        </div>
    </div>
</section>      
<section class="event-details">
    <div class="container">
        @if(session('message'))
        <div class="row">
            <div class="col-md-12">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
                  <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      {{ session('message') }}
                    </div>
                  </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="event-details__left">
                    @if($members->count())
                    <table class="table">
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Club Join Date</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($members as $member)
                            @php
                            $club_designation_enroll_check = App\Models\Member_Designation_Enroll::where('member_id', $member->id)->where('department_id', Null)->where('lion_year', env('lion_year'))->limit(1)->first();
                            
                            if($club_designation_enroll_check){
                                $club_designation = App\Models\Officer::where('id',$club_designation_enroll_check->designation_id)->limit(1)->first();
                            }
                            
                            @endphp
                        <tr>
                            <td>
                                @if($member->photo)
                                <img src="{{ asset('site/uploads/members/'.$member->photo) }}" alt="" width="50" height="50" style="border-radius:70px;">
                                @else
                                <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" class="avatar avatar-sm me-3 border-radius-lg" alt="" width="50">
                                @endif
                            </td>
                            <td>
                                {{ $member->name }}
                                <small style="display: block; line-height:20px;">
                                   <span style="display: block; line-height:25px"> Member ID : {{$member->member_membership_no}}</span>
                                    @if($club_designation_enroll_check)
                                    {{ $club_designation->title }} - {{ $club_designation_enroll_check->lion_year }}
                                    @else
                                    <form action="{{route('club.postNewDesignationofNewLionYear', $member->member_membership_no)}}" method="POST">
                                        @csrf()
                                        <select name="officer" onchange="this.form.submit()">
                                            <option value="">Select designation {{env('lion_year')}}</option>
                                            @foreach($officers as $officer)
                                            <option value="{{$officer->id}}">{{$officer->title}}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                    @endif

                                </small>
                            </td>
                            <td>
                                @if($member->club_join_date)
                                {{ date('d M, Y', strtotime($member->club_join_date)) }}
                                @else
                                    -
                                @endif
                                @if($member->charter_member == 'Y')
                                    @if($member->charter_president == 'Y')
                                        <small style="display: block; line-height:10px;">Charter President</small>
                                    @else
                                    <small style="display: block; line-height:10px;">Charter Member</small>
                                    @endif
                                @endif
                            </td>
                            <td>{{ $member->personal_contact_number }}</td>
                            <td>{{ $member->status }}</td>
                            <td><a href="{{ route('club.getMemberDetail',$member->member_membership_no) }}">Detail</a></td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        No Record found!!!
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="event-details__right">
                    <div class="event-details__info">
                        <ul class="list-unstyled event-details__info-list">
                            <li>
                                <p>{{ $club->name }} - ({{ $club->club_membership_id }})</p>
                                <small>{{ $club->address }}</small>
                            </li>
                            <li>
                                <span>Total Member</span>
                                <p>{{ $totalmembers }} <small>/members</small></p>
                            </li>
                            <li>
                                <span>Club Charter Date</span>
                                <p>{{ $club->charter_date }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="AddNewMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modal-lg">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Club</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('club.postAddNewMember') }}" method="POST">
          @csrf()
          <div class="modal-body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="donate-now__personal-info-input">
                        <label for="">Photo</label>
                        <input type="file" name="photo">
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="donate-now__personal-info-input">
                        <label for="">Full Name * </label>
                        <input type="text" placeholder="Full Name" name="fname" required>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Membership Type *</label>
                        <select name="membership_type" required>
                            <option value="Regular Member">Regular Member</option>
                            <option value="Leo Lion Member">Leo Lion Member</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="donate-now__personal-info-input">
                        <label for="">Membership ID *</label>
                        <input type="number" placeholder="Membership ID" name="club_membership_id" required>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="donate-now__personal-info-input">
                        <label for="">Designation *</label>
                        <select name="designation_id" required>
                            @foreach($officers as $officer)
                            <option value="{{ $officer->id }}">{{ $officer->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Email Address</label>
                        <input type="email" placeholder="Email address" name="email">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Gender</label>
                        <select name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dob">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Sponsor Name</label>
                        <input type="text" name="sponsor_name">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Home Phone Number</label>
                        <input type="number" name="home_number">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Office Phone Number</label>
                        <input type="number" name="office_number">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Mobile Number *</label>
                        <input type="number" name="mobile_number" required>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Address *</label>
                        <input type="text" name="address" required>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Spouse Name </label>
                        <input type="text"  name="spouse_name">
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="donate-now__personal-info-input">
                        <label for="">Occupations *</label>
                        <select name="occupation_id" required>
                           @foreach($occupations as $occupation)
                            <option value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Member</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop