@extends('site.template')
@section('css')
<style>
    .dashboard-list{
        /* background: #ccc; */
    }
    .dashboard-list{
        color:#bfbfbf;
    }
    .dashboard-list:hover{
        color:#1c4f9c;
    }

    .dashboard-list i{
        font-size:100px;
    }
    .dashboard-list h6{
        margin-top: 15px;
    }
</style>
@stop
@section('content')
<section id="dashboard-body" style="background:#103264;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin: 20px 0;">
                <div class="card" style="background:#dfb304;">
                    <div class="card-header" style="color:#000;">
                        <div class="row">
                            <div class="col-md-8">
                                {{ __('Dashboard') }}
                            </div>
                            <div class="col-md-4" style="text-align:right;">
                                {{ __('L/Y 2022/2023') }}
                                
                            </div>
                        </div>
                    </div>
    
                    <div class="card-body" style="background:#fff; padding-top: 80px; padding-bottom: 80px;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="dashboard-items" style="text-align:center;">
                            <div class="row">
                                <div class="col-md-3">
                                   <div class="dashboard-list">
                                    <i class="fas fa-address-card"></i>
                                    <h6>Club Profile</h6>
                                   </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="dashboard-list">
                                     <i class="fas fa-users"></i>
                                     <h6>Club Members</h6>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="dashboard-list">
                                        <i class="far fa-bell"></i>
                                        <h6>Notics</h6>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="dashboard-list">
                                        <i class="fas fa-file-alt"></i>
                                        <h6>Reports</h6>
                                    </div>
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
