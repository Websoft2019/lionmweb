@extends('site.template')
@section('css')
    <style>
        .profilebox{
            border: 1px solid #ccc;
            padding: 20px;
        }
        .information{
            margin-top: 30px;
        }
        ul.information-item{
            list-style: none;
        }
        .information-item b{
            margin-top: 40px;
            color: #023c8a;
        }
        ul.peronalinformation li{
            padding: 5px 0;
        }
        .actionbox {
            text-align: right;
        }
    </style>
@stop
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li><a href="{{ route('getHome') }}">{{ $club->name }}</a></li>
                <li><span>/</span></li>
                <li class="active">Member</li>
            </ul>
            <h2>{{ $member->name }}</h2>
        </div>
    </div>
</section>
<section class="about-four" style="padding:60px 0 0; margin-bottom: 60px;">
    <div class="container">
        <div class="profilebox">
        <div class="row">
           <div class="col-md-3" style="text-align:center;">
            @if($member->photo)
                <img src="{{ asset('site/uploads/members/'.$member->photo) }}" alt="" width="100%">
            @else
                <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="" width="100%">
            @endif
            <span>{{ $member->status }} Member</span>
           </div>
           <div class="col-md-9">
                        <div class="event-details1__right">
                            <div class="event-details__info">
                                <ul class="list-unstyled event-details__info-list" style="columns: 2; -webkit-columns: 2; -moz-columns: 2;">
                                    <li>
                                        <h5>{{ $member->name }} - ({{ $member->member_membership_no }})</h5>
                                            <h6>
                                                @if($designation != Null)
                                                    {{ $designation->title }}
                                                @else
                                                    -
                                                @endif
                                            </h6>
                                    </li>
                                    <li>
                                        <h5>Address</h5>
                                        <h6>{{ $member->address }}</h6>
                                    </li>
                                    <li>
                                        <h5>Date of Birth</h5>
                                        <h6>{{ date('d M, Y', strtotime($member->dob )) }}</h6>
                                    </li>
                                    <li>
                                        <h5>Gender</h5>
                                        <h6>{{ $member->gender }}</h6>
                                    </li>
                                    <li>
                                        <h5>Occupation</h5>
                                        <h6>{{ $occupation->title }}</h6>
                                    </li>
                                    <li>
                                        <h5>Spouse Name</h5>
                                        <h6>{{ $member->spouse_name }}</h6>
                                    </li>
                                    <li>
                                        <h5>Contact Number(s)</h5>
                                        <small>
                                            @if($member->home_contact_number)
                                            {{ $member->home_contact_number }} (home),
                                            @endif
                                            @if($member->office_contact_number)
                                            {{ $member->office_contact_number }} (Office),
                                            @endif
                                            {{ $member->personal_contact_number }} (Personal)
                                        </small>
                                    </li>
                                    <li>
                                        <h5>Email</h5>
                                        @if($member->email)
                                        <h6> {{ $member->email }}</h6>
                                        @else
                                        <small><a href="{{route('club.getMemberEdit', $member->member_membership_no)}}">not define</a></small>
                                        @endif
                                    </li>
                                    <li>
                                        <h5>Blood Group</h5>
                                        <h6>{{ $member->blood_group }}</h6>
                                    </li>
                                    <li>
                                        <h5>Home Club</h5>
                                        <h6>{{ $club->name }}</h6>
                                        <small style="display:block; line-height:25px">Join Date :
                                            @if($member->club_join_date == NULL)
                                            N/A
                                            @else
                                            {{ date('d M, Y', strtotime($member->club_join_date )) }}
                                            @endif
                                        </small>
                                        @if($member->charter_member == 'Y')
                                            @if($member->charter_president == 'Y')
                                                <small>Charter President</small><br />
                                            @endif
                                            <small>Charter Member</small>
                                        @endif
                                    </li>
                                    @if($member->sponsor_id)
                                    <li>
                                        <h5>Sponsor By</h5>
                                        <h6>{{ $member->sponsor_id }}</h6>
                                    </li>
                                    @endif
                                    @if($donations->count())
                                    <li>
                                        <h5>Contrubution</h5>
                                        <h6>
                                            @foreach($donations as $donation)
                                                 @php $donor_type = App\Models\Donortype::where('id', $donation->donor_type_id)->limit(1)->first(); @endphp
                                                {{ $donor_type->title }},

                                            @endforeach
                                        </h6>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
           </div>
        </div>
        </div>
    </div>
</section>
<div class="col-md-6">
    <div class="event-details1__info">
        <div class="col-md-12 actionbox">
            <a href="{{route('getPrintCard', $member->member_membership_no)}}" class="btn btn-primary">Member Card Pring</a>
            <a href="{{ route('club.getMemberEdit', $member->member_membership_no) }}" class="btn btn-primary">Modify</a>
            <a href="{{ route('club.getMemberDrop', $member->member_membership_no) }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Drop Member</a>
        </div>
    </div>
</div>
<br /> <br />
@stop