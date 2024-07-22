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
                <li class="active">Club</li>
            </ul>
            <h2>Profile</h2>
        </div>
    </div>
</section>
<section class="about-four" style="padding:60px 0 0; margin-bottom: 60px;">
    <div class="container">
        <div class="profilebox">
        <div class="row">
           
            <div class="col-md-3" style="text-align:center;">
                @if($club->photo)
                <img src="{{ asset('site/uploads/clubs/'.$club->photo) }}" alt="" width="100%">
                @else
                <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="" width="100%">
                @endif
            </div>
            <div class="col-md-9">
             <h5 style="color:#023c8a;">{{ $club->name }}</h5>
             <small>Club ID : {{ $club->club_membership_id }}</small> | <small>Mother Club : {{ $club->mother_club }}</small>
             <div class="row">
                <div class="col-md-6">
                    <div class="information">
                        <ul class="information-item">
                            <li>
                                Total Member : {{ $totalmembers }} <small>/members</small>
                            </li>
                            <li>Charter Date : {{ date('d M, Y', strtotime($club->charter_date)) }}</li>
                            <!-- <li>Charter President : N/A</li> -->
                            <br />
                            <b>Club Contribution</b>
                            @foreach($donortypes as $donortype)
                                @php $donorcount = App\Models\Donor::where('club_id', $club->id)->where('donor_type_id', $donortype->id)->count(); @endphp
                                <li> {{ $donorcount }} {{ $donortype->title }}  <span style="margin-left: 20px;"></li> 
                            @endforeach
                        </ul>
                        
                     </div>
                </div>
                <div class="col-md-6">
                    <div class="information">
                        <div class="col-md-12" style="text-align:right;">
                            <a href="{{ route('club.getUpdateProfile') }}" class="btn btn-primary">Update Club Profile</a>
                            <a href="{{ route('club.getChangePassword') }}" class="btn btn-primary">Change Password</a>
                        </div>
                        <!-- <b>Child Club(s)</b> -->
                    </div>
                </div>
             </div>
            </div>
           </div>
        </div>
    </div>
</section>
@stop