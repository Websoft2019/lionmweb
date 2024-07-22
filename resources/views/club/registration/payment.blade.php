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
                <li><a href="{{route('club.getRegistrationList')}}">Registration</a></li>
                <li><span>/</span></li>
                <li class="active">{{$registration->title}}</li>
            </ul>
            <h2>{{$registration->title}}</h2>
        </div>
    </div>
</section>
<section class="about-four" style="padding:60px 0 0; margin-bottom: 60px;">
    <div class="container">
        <div class="profilebox">
           
                <div class="row">
                    <div class="col-md-9">
                        <div>
                            Registration Title : {{$registration->title}} ({{$registration->lion_year}})<br />
                            Vennue : {{$registration->vennue}} | {{$registration->time}} <br />

                        </div>
                        <br />
                        <h5>Participate lion Member</h5>
                        
                        <ul style="padding:0; margin:0; list-style-type: none; columns: 2; -webkit-columns: 2; -moz-columns: 2;">
                            
                                @foreach($members as $member)
                                    @php
                                       
                                        $getmemberinfo = App\Models\Member::where('member_membership_no', $member->member_id)->limit(1)->first();
                                        $post = App\Models\Member_Designation_Enroll::where('member_id', $getmemberinfo->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                                        $degination = App\Models\Officer::where('id', $post->designation_id)->limit(1)->first(); 
                                    @endphp
                                <li>
                                    <input type="hidden" name="eventid" value="{{$registration->id}}">
                                    Lion {{$getmemberinfo->name}} | <small>{{$degination->title}}</small>
                                </li>
                            @endforeach
                            
                        </ul>
                       
                    </div>
                    <div class="col-md-3">
                            <div class="event-details1__right">
                                <div class="row"> 
                                    <h5>Participant ({{$members->count()}})</h5> 
                                    <p>
                                        <span id="countselectedmember"></span>
                                        <h4>Total Registration Cost</h4>
                                        <h1>Npr.<span id="totacost">{{$totalcost}}</span></h1>
                                    </p>
                                    <img src="{{asset('site/fonepay.jpg')}}" alt="" width="200">
                                   
                                    <form method="GET" id ="payment-form" action="{{  $paymentDevUrl }}">

                                        <input type="hidden" name="PID" value="{{  $PID }}" >
                        
                                        <input type="hidden" name="MD"   value="{{  $MD }}">
                        
                                        <input type="hidden" name="AMT" value="{{  $AMT }}">
                        
                                        <input type="hidden" name="CRN" value="{{  $CRN }}">
                        
                                        <input type="hidden" name="DT" value="{{  $DT }}">
                        
                                        <input type="hidden" name="R1" value="{{  $R1 }}">
                        
                                        <input type="hidden" name="R2" value="{{  $R2 }}">
                        
                                        <input type="hidden" name="DV" value="{{  $DV }}">
                        
                                        <input type="hidden" name="RU" value="{{  $RU }}">
                        
                                        <input type="hidden" name="PRN" value="{{  $PRN }}">
                                        <input type="submit" value="Click to Pay">
                        
                                    </form>
                                    
                                </div>
                            </div>
                    </div>
                </div>
          
        </div>
    </div>
</section>
@stop
