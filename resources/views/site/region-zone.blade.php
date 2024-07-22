@extends('site.template')
@section('content')
<section class="page-header">
    <div class="page-header-bg">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Region &amp; Zone</li>
            </ul>
            <h2>Region &amp; Zone</h2>
        </div>
    </div>
</section>
<section class="donation">
    <div class="container">
        <div class="row">
            @if($regions->count())
            @foreach($regions as $region)
                @php
                    $countzone = App\Models\Region_zone_enroll::where('department_id_region', $region->id)->where('lion_year', env('lion_year'))->count();
                    $regionchairpersonenroll = App\Models\Member_Designation_Enroll::where('department_id', $region->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                @endphp
            <div class="col-md-12" style="padding: 0; background:#255297; margin-bottom: 40px; border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
               <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="causes-one__single1">
                        <div class="causes-one__img" style="background: #fff; text-align:center">
                            @if($regionchairpersonenroll)
                                @php $regionchairpersoninfo = App\Models\Member::where('id', $regionchairpersonenroll->member_id)->limit(1)->first(); @endphp
                            
                                @if($regionchairpersoninfo->photo)
                                <img src="{{ asset('site/uploads/members/'.$regionchairpersoninfo->photo) }}" alt="" style="width:60%">
                                @else
                                <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="" style="width:60%">
                                @endif
                            @else
                            <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="" style="width:60%">
                            @endif
                        </div>
                        <div class="causes-one__content">
                            <h3 class="causes-one__title">
                                <a href="">
                                @if($regionchairpersonenroll)
                                    {{$regionchairpersoninfo->name}}
                                @else
                                    ---
                                @endif
                                </a>
                            </h3>
                            <br />
                            <p class="causes-one__text" style="text-align: center;">
                                Region Chairperson 
                                <span style="display: block;">{{$region->title}}</span>
                            </p>
                            <div class="causes-one__progress">
                                <div class="causes-one__progress-shape"
                                    style="background-image: url({{ asset('site/assets/images/shapes/causes-one-progress-shape-1.png') }});">
                                </div>
                                <div class="causes-one__goals">
                                    <p><span>{{$countzone}}</span> Zone</p>
                                    
                                    <!-- <p style="text-align:right;"><span>count</span> Club</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @php
                            $getzones = App\Models\Region_zone_enroll::where('department_id_region', $region->id)->where('lion_year', env('lion_year'))->get();
                            
                        @endphp
                        @if($getzones->count())
                        @foreach($getzones as $zone)
                            @php
                            $zonechairpersonenroll = App\Models\Member_Designation_Enroll::where('department_id', $zone->department_id_zone)->where('lion_year', env('lion_year'))->limit(1)->first();
                            $departmentinfo = App\Models\Department::where('id',$zone->department_id_zone)->limit(1)->first();
                            @endphp
                            <div class="col-md-12" style="margin-bottom: 15px; margin-top: 15px;">
                                <div style="background: #f6ca49; padding: 10px; border-radius: 50px;">
                                    <div class="row">
                                        <div class="col-md-2" style="padding-top: 30px;">
                                            <div style="text-align: center;">
                                                <img src="{{ asset('site/lionlogo.png') }}" alt="" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-top: 30px;">
                                            <p style="text-align: left;">
                                                @if($zonechairpersonenroll)
                                                    @php
                                                        $zonechairpersoninfo = App\Models\Member::where('id', $zonechairpersonenroll->member_id)->limit(1)->first();
                                                    @endphp 
                                                    <strong style="display: block; color: #255297;">{{$zonechairpersoninfo->name}}</strong> 
                                                @else
                                                   <strong style="display: block;">---</strong> 
                                                @endif
                                                    Zone Chairperson
                                                    <small style="display: block;"><span style="display: block;">{{$departmentinfo->title}}</span></small>
                                                </p>
                                        </div>
                                        <div class="col-md-5">
                                            <strong style="color: #255297 ">Clubs</strong> <br />
                                            @php
                                                $clublists = App\Models\Zone_club_enroll::where('department_id_zone', $zone->department_id_zone)->get();
                                            @endphp
                                            <ul style="padding: 0; margin:0;">
                                                @if($clublists->count())
                                                @foreach($clublists as $clublist)
                                                @php $clubinfo = App\Models\Club::where('id', $clublist->club_id)->limit(1)->first(); @endphp
                                                <li>{{$clubinfo->name}}</li>
                                                @endforeach
                                                @else
                                                    <p>No any club assign yet!!!</p>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="col-md-12">
                                <p>No any Zone enroll yet!!!</p>
                            </div>
                        @endif
                    </div>
                </div>
               </div>
            </div>
            @endforeach
            @else
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
    
                  <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      No Any <strong> Clubs </strong> found yet!!!
                    </div>
                  </div>
            </div>
            @endif
        </div>
    </div>
</section>
<!--Donation End-->
@stop