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
                <li class="active">Departments</li>
            </ul>
            <h2>Our Departments</h2>
        </div>
    </div>
</section>
<section class="team-one">
    <div class="container">
        <div class="row">
            @foreach($teams as $team)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="team-one__single">  
                    <div class="team-one__content">
                        <a href="{{route('getDepartmentTeams', $team->slug)}}">
                            <p class="team-one__sub-title">
                                <span style="color:#fff;">
                                    {{$team->title}}
                                </span>
                            </p>
                        </a>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop