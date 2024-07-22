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
                <li class="active">News &amp; Events</li>
            </ul>
            <h2>News &amp; Events</h2>
        </div>
    </div>
</section>
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="news-details__left">
                    <div class="news-details__content">
                        @if($news->count())
                            @foreach($news as $new)
                                <div class="row">
                                    <div class="col-md-4">
                                        
                                            @if($new->photo)
                                            <div class="news-details__img">
                                                <img src="{{asset('site/uploads/news/'.$new->photo)}}" alt="">
                                            </div>
                                            @else
                                            <div class="news-details__img1" style="text-align: center;">
                                            <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="" width="200">
                                            </div>
                                            @endif
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="news-details__title">{{$new->title}}</h3>
                                        <hr style="margin: 0;">
                                        <p style="text-align: right;"> <small><strong>Posted By : </strong> District Office , <strong>Published Date : </strong> {{$new->created_at->format('d M, Y')}}</small></p>
                                        <hr style="margin: 0;">
                                        <p class="news-details__text-1" style="margin-top: 10px;">
                                            {!! $new->detail !!}
                                        </p>
                                        <p style="text-align: right;">
                                            <a href="{{route('getNewsDetail', $new->slug)}}" class="btn btn-primary">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                No any news upload yet.
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop