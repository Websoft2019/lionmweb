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
                <li><a href="{{ route('getNews') }}">News &amp; Events</a></li>
                <li class="active">{{$new->title}}</li>
            </ul>
            <h2>{{ $new->title }}</h2>
        </div>
    </div>
</section>
<section class="news-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="news-details__left">
                    <div class="news-details__img">
                        <img src="{{ asset('site/uploads/news/'.$new->photo) }}" alt="">
                        <div class="news-details__date">
                            <p>{{ $new->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>
                    <div class="news-details__content">

                        <h3 class="news-details__title">{{ $new->title }}</h3>
                        <p class="news-details__text-1">
                            {!! $new->detail !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search">
                        <form action="#" class="sidebar__search-form">
                            <input type="search" placeholder="Search here">
                            <button type="submit"><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="sidebar__single sidebar__category">
                        <div class="sidebar-shape-1"
                            style="background-image: url(assets/images/shapes/sidebar-shape-1.png);"></div>
                        <h3 class="sidebar__title">Other News</h3>
                        <ul class="sidebar__category-list list-unstyled">
                            @foreach($news as $item)
                            <li><a href="{{ route('getProgramDetail', $item->slug) }}">{{ $item->title }} <span class="icon-right-arrow"></span></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop