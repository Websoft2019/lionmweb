@extends('site.template')
@section('css')
<style>
    .dashboard-list{
        /* background: #ccc; */
    }
    .dashboard-list{
        color:#fff;
    }
    .dashboard-list:hover{
        color:#e3b540;
    }

    .dashboard-list i{
        font-size:70px;
        cursor: pointer;
    }
    .dashboard-list h6{
        margin-top: 15px;
        color: #fff;
    }
</style>
@stop
@section('content')
<section id="dashboard-body" style="background:#103264;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin: 20px 0;">
                <div class="cardfd">
                    <div class="card-header" style="color:#e3b540;">
                        <div class="row">
                            <div class="col-md-8">
                                @php $club = App\Models\Club::where('id', Auth::user()->club_id)->limit(1)->first(); @endphp
                                {{ __('Dashboard') }} - {{ $club->name }} ({{ $club->club_membership_id }})
                            </div>
                            <div class="col-md-4" style="text-align:right;">
                                Lion Year {{ env('lion_year') }}
                                
                            </div>
                        </div>
                    </div>
    
                    <div class="card-sdfsdbody" style="padding-top: 80px; padding-bottom: 80px;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="dashboard-items" style="text-align:center;">
                            <div class="row">
                                <div class="col-md-3">
                                   <a href="{{ route('club.profile') }}">
                                        <div class="dashboard-list">
                                            <i class="fas fa-address-card"></i>
                                            <h6>Club Profile</h6>
                                    </div>
                                   </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('club.getManageMember') }}">
                                    <div class="dashboard-list">
                                     <i class="fas fa-users"></i>
                                     <h6>Club Members</h6>
                                    </div>
                                    </a>
                                 </div>
                                 <div class="col-md-3">
                                    <a href="" style="pointer-events: none">
                                    <div class="dashboard-list">
                                        <i class="far fa-bell"></i>
                                        <h6>Notics</h6>
                                        <small style="color:yellow;">comming soon!!!</small>
                                    </div>
                                    </a>
                                 </div>
                                 <div class="col-md-3">
                                    <a href="" style="pointer-events: none">
                                    <div class="dashboard-list">
                                        <i class="fas fa-file-alt"></i>
                                        <h6>Reports</h6>
                                        <small style="color:yellow;">comming soon!!!</small>
                                    </div>
                                    </a>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
