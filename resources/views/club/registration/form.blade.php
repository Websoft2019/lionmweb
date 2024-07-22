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
            <form action="{{route('club.postEventRegister')}}" method="POST" name="main">
                @csrf()
                <input type="hidden" name="eventid" value="{{$registration->id}}">
                <div class="row">
                    <div class="col-md-9">
                        <h5>Tick mark the participate lion Member</h5>
                        <br />
                        @if($members->count())
                        <ul style="padding:0; margin:0; list-style-type: none; columns: 2; -webkit-columns: 2; -moz-columns: 2;">
                                @foreach($members as $member)
                                <!-- check member already register -->
                                    @php
                                        $check = App\Models\EventRegisterMember::where('member_id', $member->member_membership_no)->where('registration_id', $registration->id)->where('payment_status', 'Y')->get();
                                    @endphp
                                <li style="line-height: 50px; padding-bottom: 20px; overflow:hidden; display:block; min-height:30px">
                                    <input type="checkbox" value="{{$member->member_membership_no}}" name="membercheckbox[]" class="membercheckbox" @if($check->count()) disabled @endif>
                                    Lion {{$member->name}} ({{$member->member_membership_no}})
                                    @php
                                    $post = App\Models\Member_Designation_Enroll::where('member_id', $member->id)->where('lion_year', env('lion_year'))->limit(1)->first();
                                    $degination = App\Models\Officer::where('id', $post->designation_id)->limit(1)->first();
                                    @endphp
                                    <small style="display: block; line-height:3px; color: blue;">&nbsp; &nbsp; &nbsp; {{$degination->title}} @if($check->count()) <span style="color: red;">Registered</span> @endif</small>
                                </li>
                            @endforeach
                            
                        </ul>
                        @else
                        <p>No any member upload, before register upload your club members.</p>
                        @endif
                       
                    </div>
                    <div class="col-md-3">
                            <div class="event-details1__right">
                                <div class="row"> 
                                    <h5>Participant </h5> 
                                    <p>
                                        <span id="countselectedmember"></span>/members <br />
                                        <h4>Total Registration Cost</h4>
                                        <h1>Npr.<span id="totacost">0.00</span></h1>
                                    </p>
                                    <div>
                                        <input type="submit" class="btn btn-primary" value="Confirm" <?php if($members->count()) {echo ''; } else{ echo 'disabled'; } ?>>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@stop
@section('js')
<script>
    $(document).ready(function() {
    $('.membercheckbox').click(function() {
        var a = document.forms["main"];
        var cost = "<?php echo $registration->cost; ?>";
        var x =a.querySelectorAll('input[type="checkbox"]:checked');
        var totalcost =  x.length*cost;
        document.getElementById("countselectedmember").innerHTML = x.length+' lion members selected';
        document.getElementById("totacost").innerHTML = totalcost;

    })
});
</script>
@stop