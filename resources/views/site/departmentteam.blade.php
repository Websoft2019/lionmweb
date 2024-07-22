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
                <li class="active">Officer</li>
            </ul>
            <h2>{{$department->title}}</h2>
        </div>
    </div>
</section>
<section class="team-one">
    <div class="container">
        <div class="row">
            @foreach($teams as $team)
            
            @php
                $memberinfo = App\Models\Member::where('id', $team->member_id)->limit(1)->first();
                $memberpostinfo = App\Models\Officer::where('id', $team->designation_id)->limit(1)->first();
                $clubinfo = App\Models\Club::find($memberinfo->club_id);
                $checkdonorPMJF = App\Models\Donor::where('donor_type_id', 1)->where('membership_id',$memberinfo->id)->get();
                if($checkdonorPMJF->count()){
                    $donortitle = 'PMJF';
                }
                else{
                    $checkdonorMJF = App\Models\Donor::where('donor_type_id', 2)->where('membership_id',$memberinfo->id)->get();
                    if($checkdonorMJF->count()){
                        $donortitle = 'MJF';
                    }
                    else{
                        $donortitle = '';
                    }
                }

            @endphp
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="team-one__single">
                    <div class="team-one__img">
                        @if($memberinfo->photo)
                        <img src="{{ asset('site/uploads/members/'.$memberinfo->photo) }}" alt="">
                        @else
                        <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="">
                        @endif
                        <div class="team-one__social">
                            <a href="#">Biography</a>
                        </div>
                    </div>
                    <div class="team-one__content">
                        <h3 class="team-one__name"><a href="">{{$donortitle}} {{$clubinfo->club_type}} {{ $memberinfo->name }}</a></h3>
                        <p class="team-one__sub-title">
                            {{ $memberpostinfo->title }} - {{$team->lion_year}}<br />
                            <span style="color:#fff;">
                                {{$department->title}}
                            </span> <br />
                            <span>{{$memberinfo->personal_contact_number}}</span>
                        </p>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop