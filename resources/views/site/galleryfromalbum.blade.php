@extends('site.template')
@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <style>
        .img-gallery {
            height: 230px;
            width: 100%;
            object-fit: cover;
        }
    </style>


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
                @foreach ($images as $image)
                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                        @if ($image->type == 'video')
                            <a href="{{ asset('upload/gallery/' . $image->image) }}" data-lightbox="photos">
                                <iframe width="100%" height="230px"
                                    src="{{ 'https://www.youtube.com/embed/' . $image->video }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </a>
                        @else
                            <a href="{{ asset('upload/gallery/' . $image->image) }}" data-lightbox="photos"><img
                                    class="img-gallery" src="{{ asset('upload/gallery/' . $image->image) }}"></a>
                        @endif
                    </div>
                @endforeach
                {{-- {{ $images->links() }} --}}
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

@stop
