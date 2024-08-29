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
                    <li class="active">Gallery</li>
                </ul>
                <h2>Gallery</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--About Four Start-->
    <section class="about-four">
        <div class="container">
            <div class="row">
                @foreach ($albums as $album)
                    <div class="col-12 col-lg-3">
                        <div class="causes-one__single1">
                            <div class="causes-one__img">
                                @if ($album->images->count() == 0)
                                    <img src="{{ asset('admin/assets/img/default_logo.jpg') }}" alt="">
                                @else
                                    <img src="{{ asset('upload/gallery/' . $album->images[0]->image) }}" alt="">
                                @endif
                            </div>
                            <div class="causes-one__content">
                                <h3 class="causes-one__title"><a href="{{ route('getGalleryFromAlbum', $album->slug) }}">{{ $album->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $albums->links() }}
            </div>
        </div>
    </section>
@stop
