@extends('site.template')
@section('content')
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Programme/Projects</li>
            </ul>
            <h2>Programme/Projects</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Four Start-->
<section class="about-four">
    <div class="container">
        <div class="row">
            <div class="row">
                @foreach($programs as $program)
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="causes-one__single">
                        <div class="causes-one__img">
                            <img src="{{ asset('site/uploads/program/'.$program->photo) }}" alt="">
                            <div class="causes-one__cat">
                                <p>Focused Programs</p>
                            </div>
                        </div>
                        <div class="causes-one__content">
                            <h3 class="causes-one__title"><a href="{{ route('getProgramDetail', $program->slug) }}">{{ $program->title }}</a>
                            </h3>
                            <div class="col-md-12" style="text-align:center; margin-top: 10px;">
                                <a href="{{ route('getProgramDetail', $program->slug) }}" class="thm-btn">Read Detail</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@stop