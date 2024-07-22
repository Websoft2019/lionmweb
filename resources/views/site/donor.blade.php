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
                <li class="active">Donor</li>
                
            </ul>
            <h2>{{ $donortype->title }}</h2>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br /> <br />
            <p>We have total {{$donors->count()}} {{ $donortype->title }} contributions.</p>
        </div>
    </div>
    <div class="row">
       <div class="col-md-12" style="padding:40px 0">
        <table class="table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Club Name</th>
                    <th>Contribution</th>
                    <th>Lion Year</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                @php $sn = 0; @endphp
                @foreach($donors as $donor)

                    @php
                        $sn++;
                        $member = App\Models\Member::where('id', $donor->membership_id)->limit(1)->first();
                        $club = App\Models\Club::where('id', $member->club_id)->limit(1)->first();
                        if($donor->donor_type_id == 1){
                            $donortitle = 'PMJF';
                        }
                        elseif($donor->donor_type_id == 2){
                            $donortitle = 'MJF';
                        }
                        else{
                            $donortitle = '';
                        }
                    @endphp
                    <tr>
                        <td>{{$sn}}</td>
                        <td>
                            {{$donortitle}} {{$club->club_type}} {{ $member->name }} <br />
                        </td>
                        <td> {{ $club->name }}</td>
                        <td>{{ $donortype->title }}</td>
                        <td>{{$donor->lion_year}}</td>
                        <td>{{$donor->amount}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       </div>
    </div>
   
</div>
@stop