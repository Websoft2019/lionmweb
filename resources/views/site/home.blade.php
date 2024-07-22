@extends('site.template')
@section('css')
<style type="text/css">

#newsHeadlines {
	padding: 10px;
	border-left:#1c4f9c 4px solid;
	
}
#newsHeadlines ul {
    list-style: none;
    padding: 0;
    margin: 0;
    
}

#newsHeadlines .head {
	font-weight:bold;
	font-size:14px;
	color:#1c4f9c;
}

#newsHeadlines a {
	color:#444;
	font-size:15px;
	text-decoration:none;
}

.news_post {
	color:#F90;
}

.accordionWrapper{display:inline-block; background-color:#fff; overflow:hidden; margin-bottom:20px;}
.accordionWrapper img{vertical-align:top; border:0; margin:0; padding:0}
.accordionWrapper div{display:inline; float:left; margin:auto;}
.accordionWrapper div.title{cursor:pointer;}
.accordionWrapper div.content{display:none;}
</style>
@stop
@section('content')
{{-- <section class="main-slider clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": false,
        "effect": "fade",
        "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 5000
        }}'>
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="image-layer"
                    style="background-image: url({{ asset('site/assets/images/backgrounds/main-slider-1-1.png') }});"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1"
                    style="background-image: url({{ asset('site/assets/images/shapes/main-slider-shape-1.jpg') }});"></div>
                

                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="main-slider__content">
                                <p class="main-slider__sub-title">We Serve</p>
                                <h2 class="main-slider__title">Together We Can</h2>
                                <div class="main-slider__btn-box">
                                    <a href="" class="thm-btn main-slider__btn"> Discover more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-left-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow"></i>
            </div>
        </div>

    </div>
</section> --}}
<link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
<style>
    .swiper-container {
        height: 70vh; /* 50% of the viewport height */
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: 50% 25%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
    }
    .slide-content {
        position: relative;
        z-index: 10;
        color: white;
        padding: 20px;
        /* Removed the background color */
        border-radius: 10px;
    }
    .slide-content h2 {
        font-size: 2.5rem;
        margin: 0;
        opacity: 0;
        transform: translateY(-30px);
        animation: fadeInUp 1s 0.5s forwards;
    }
    .slide-content p {
        font-size: 1.2rem;
        margin: 1rem 0;
        opacity: 0;
        transform: translateY(-20px);
        animation: fadeInUp 1s 1s forwards;
    }
    .slide-content .btn {
        background: #1c4f9c;
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
        border-radius: 5px;
        cursor: pointer;
        opacity: 0;
        transform: translateY(10px);
        transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
        animation: fadeInUp 1s 1.5s forwards;
    }
    .slide-content .btn:hover {
        background: #1c4f9c;
        transform: translateY(0) scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }
    .slide-content .btn:active {
        transform: translateY(2px) scale(0.98);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .swiper-pagination {
        bottom: 10px;
    }
    .swiper-button-next, .swiper-button-prev {
        color: #fff;
    }
</style>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ asset('site/assets/images/slider/slider1.jpg') }}" alt="Slide 1">
            {{-- <div class="slide-content">
                <h2>Slide 1 Title</h2>
                <p>This is a description for slide 1.</p>
                <button class="btn">Learn More</button>
            </div> --}}
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('site/assets/images/slider/slider1.jpg') }}" alt="Slide 2">
            {{-- <div class="slide-content">
                <h2>Slide 2 Title</h2>
                <p>This is a description for slide 2.</p>
                <button class="btn">Learn More</button>
            </div> --}}
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('site/assets/images/slider/slider1.jpg') }}" alt="Slide 3">
            {{-- <div class="slide-content">
                <h2>Slide 3 Title</h2>
                <p>This is a description for slide 3.</p>
                <button class="btn">Learn More</button>
            </div> --}}
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 3000, // Auto-slide interval (3 seconds)
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>



@if($notices->count())
<section class="noticbox" style="margin-bottom: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 notice-list">
                <div id="newsHeadlines">
                    <div>
                        <h5>Latest Notices</h5>
                    <ul id='headlines'>
                        @foreach($notices as $notice)
                        <li>
                            <a href=" {{ route('getNoticeDetail', $notice->id) }} ">
                                {{$notice->created_at->format('d M, Y')}} ____
                                : {{$notice->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    </div>
	                
                    <p style="text-align: right;"><a href=""><u> View all Notices </u></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="about-one">
    <div class="about-one__shape-box-1">
        <div class="about-one__shape-1"
            style="background-image: url({{ asset('site/assets/images/shapes/about-one-shape-1.png') }});"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left">
                    <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms"
                        data-wow-duration="2500ms">
                        <div class="about-one__img">
                            <img src="{{ asset('site/assets/images/Chandi.jpg') }}" alt="">
                        </div>
                        <div class="about-one__img-border"></div>
                        <div class="about-one__curved-circle-box">
                            <div class="curved-circle">
                                <span class="curved-circle--item">
                                    Lions Clubs International - District 325 M, Nepal -
                                </span>
                            </div><!-- /.curved-circle -->
                            <div class="about-one__curved-circle-icon">
                                <img src="{{ asset('site/assets/images/logo-23-24.png') }}" alt="" style="width:100px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <h5>Welcome to Lions District 325 M, Nepal</h5>
                        <h6 class="" style="color:#1c4f9c;">"Together We Can"</h6>
                    </div>
                    <p class="about-one__text">
                        I would like to extend my gratitude for the privilege you have bestowed upon me to serve you through the leadership as the District Governor of Lions Club International District 325 M, Nepal for the Lion Year 2023-2024.
                        
                    </p>
                   
                    <div class="about-one__fund">
                        <p class="about-one__fund-text">
                            We know you have a lot of choices when it comes to donating, and we are so grateful that you chose to donate to our cause.<br />
                            Our main focused donation program.
                        </p>
                    </div>
                    <br />
                    <div class="row">
                        @foreach($donations as $don)
                        @php $donorcount = App\Models\Donor::where('donor_type_id', $don->id)->count(); @endphp
                            <div class="col-md-4">
                                <div class="card" style="margin-bottom: 10px">
                                    <div class="card-body">
                                        <a href="{{ route('getDonorDetail', $don->slug) }}">
                                            <div class="text">
                                                <h5>{{$don->title}}</h5>
                                                <p>{{$donorcount}}+ Contribute</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="causes-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Calendar</span>
            <h2 class="section-title__title">Districts <br> Calendar</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="july-tab" data-bs-toggle="tab" data-bs-target="#july"
                            type="button" role="tab" aria-controls="july" aria-selected="true">July</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="august-tab" data-bs-toggle="tab" data-bs-target="#august"
                            type="button" role="tab" aria-controls="august"
                            aria-selected="false">August</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="september-tab" data-bs-toggle="tab" data-bs-target="#september"
                            type="button" role="tab" aria-controls="september"
                            aria-selected="false">September</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="october-tab" data-bs-toggle="tab" data-bs-target="#october"
                            type="button" role="tab" aria-controls="october"
                            aria-selected="false">October</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="november-tab" data-bs-toggle="tab" data-bs-target="#november"
                            type="button" role="tab" aria-controls="november"
                            aria-selected="false">November</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="december-tab" data-bs-toggle="tab" data-bs-target="#december"
                            type="button" role="tab" aria-controls="december"
                            aria-selected="false">December</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="january-tab" data-bs-toggle="tab" data-bs-target="#january"
                            type="button" role="tab" aria-controls="january"
                            aria-selected="false">January</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="february-tab" data-bs-toggle="tab" data-bs-target="#february"
                            type="button" role="tab" aria-controls="february"
                            aria-selected="false">February</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="march-tab" data-bs-toggle="tab" data-bs-target="#march"
                            type="button" role="tab" aria-controls="march"
                            aria-selected="false">March</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="april-tab" data-bs-toggle="tab" data-bs-target="#april"
                            type="button" role="tab" aria-controls="april"
                            aria-selected="false">April</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="may-tab" data-bs-toggle="tab" data-bs-target="#may"
                            type="button" role="tab" aria-controls="may" aria-selected="false">May</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="june-tab" data-bs-toggle="tab" data-bs-target="#june"
                            type="button" role="tab" aria-controls="june" aria-selected="false">June</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="july" role="tabpanel"
                        aria-labelledby="july-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['july'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="august" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['august'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="september" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['september'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="october" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['october'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="november" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['november'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="december" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['december'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="january" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['january'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="february" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['february'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="march" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['march'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="april" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['april'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="may" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['may'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="june" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Event Date</th>
                                    <th>Event Title</th>
                                    <th>Event Location</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates['june'] as $date)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($date->event_date)->format('M-d-Y') }} </td>
                                        <td>{{ $date->event_title }}</td>
                                        <td> {{ $date->event_location }} </td>
                                        {{-- <td><a href="" class="btn btn-primary">Detail</a></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="causes-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Social Welfare</span>
            <h2 class="section-title__title">Districts <br> Focused Programs</h2>
        </div>
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
                            <a href="{{ route('getProgramDetail', $program->slug) }}" class="thm-btn" style="color: white;">Read Detail</a>
                        </div>
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- <section class="counter-one">
    <div class="container">
        <div class="counter-one__inner">
            <div class="counter-one-bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{ asset('site/assets/images/backgrounds/counter-one-bg.jpg') }});"></div>
            <ul class="list-unstyled counter-one__list">
                <li class="counter-one__single">
                    <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="70">00</h3>
                        <span class="counter-one__letter">m</span>
                    </div>
                    <p class="counter-one__text">Total donation</p>
                </li>
                <li class="counter-one__single">
                    <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="48">00</h3>
                        <span class="counter-one__letter">k</span>
                    </div>
                    <p class="counter-one__text">Projects funded</p>
                </li>
                <li class="counter-one__single">
                    <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="38">00</h3>
                        <span class="counter-one__letter">%</span>
                    </div>
                    <p class="counter-one__text">Kids need help</p>
                </li>
                <li class="counter-one__single">
                    <div class="counter-one__count-box">
                        <h3 class="odometer" data-count="230">00</h3>
                        <span class="counter-one__letter"></span>
                    </div>
                    <p class="counter-one__text">Our volunteers</p>
                </li>
            </ul>
        </div>
    </div>
</section> -->

<!-- <section class="events-one">
    <div class="events-one-shape-1" style="background-image: url({{ asset('site/assets/images/shapes/events-one-shape-1.png') }})">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="events-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Upcoming events</span>
                        <h2 class="section-title__title">Latest upcoming events or welfare programs</h2>
                    </div>
                    
                    <a href="" class="thm-btn events-one__btn">Discover More</a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="events-one__right">
                    <div class="events-one__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
                        "loop": true,
                        "autoplay": true,
                        "margin": 20,
                        "nav": true,
                        "dots": false,
                        "smartSpeed": 500,
                        "autoplayTimeout": 10000,
                        "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 2
                            },
                            "992": {
                                "items": 2
                            },
                            "1200": {
                                "items": 3
                            }
                        }
                    }'>
                        <div class="item">
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{ asset('site/assets/images/events/events-1-1.jpg') }}" alt="">
                                    <div class="events-one__date">
                                        <p>23 July, 2022</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                           <li>Lions Club of Pokhara Metro City</li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="">Play for the
                                                world
                                                with us</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{ asset('site/assets/images/events/events-1-2.jpg') }}" alt="">
                                    <div class="events-one__date">
                                        <p>23 July, 2022</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><li>Lions Club of Annapurna Pokhara</li></li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="">Contrary to
                                                popular belief</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{ asset('site/assets/images/events/events-1-3.jpg') }}" alt="">
                                    <div class="events-one__date">
                                        <p>23 May, 2022</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><li>Lions Club of Annapurna Pokhara</li></li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="">There are
                                                many variations of</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{ asset('site/assets/images/events/events-1-1.jpg') }}" alt="">
                                    <div class="events-one__date">
                                        <p>23 July, 2022</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><li>Lions Club of Annapurna Pokhara</li></li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="">Play for the
                                                world
                                                with us</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{ asset('site/assets/images/events/events-1-2.jpg') }}" alt="">
                                    <div class="events-one__date">
                                        <p>23 July, 2022</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><li>Lions Club of Annapurna Pokhara</li></li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="">Contrary to
                                                popular belief</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="events-one__single">
                                <div class="events-one__img">
                                    <img src="{{ asset('site/assets/images/events/events-1-3.jpg') }}" alt="">
                                    <div class="events-one__date">
                                        <p>23 July, 2022</p>
                                    </div>
                                    <div class="events-one__content">
                                        <ul class="list-unstyled events-one__meta">
                                            <li><li>Lions Club of Annapurna Pokhara</li></li>
                                        </ul>
                                        <h3 class="events-one__title"><a href="">There are
                                                many variations of</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="news-one">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">News & articles</span>
            <h2 class="section-title__title">latest news <br> and articles
            </h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{ asset('site/assets/images/blog/news-1-1.jpg') }}" alt="">
                    </div>
                    <div class="news-one__content-box">
                        <div class="news-one__content-inner">
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href=""><i class="far fa-user-circle"></i> Admin</a>
                                    </li>
                                </ul>
                                <h3 class="news-one__title"><a href="">How does the
                                        malnutrition
                                        affect children?</a></h3>
                            </div>
                            <div class="news-one__bottom">
                                <div class="news-one__read-more">
                                    <a href=""> <span class="icon-right-arrow"></span> Read
                                        More</a>
                                </div>
                                <div class="news-one__share">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="news-one__social-box">
                                <ul class="list-unstyled news-one__social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="news-one__date">
                            <p>23 May, 2022</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{ asset('site/assets/images/blog/news-1-2.jpg') }}" alt="">
                    </div>
                    <div class="news-one__content-box">
                        <div class="news-one__content-inner">
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href=""><i class="far fa-user-circle"></i> Club Name</a>
                                    </li>
                                    
                                </ul>
                                <h3 class="news-one__title"><a href="">Lorem Ipsum has been the
                                        industry's standard</a></h3>
                            </div>
                            <div class="news-one__bottom">
                                <div class="news-one__read-more">
                                    <a href=""> <span class="icon-right-arrow"></span> Read
                                        More</a>
                                </div>
                                <div class="news-one__share">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="news-one__social-box">
                                <ul class="list-unstyled news-one__social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="news-one__date">
                            <p>23 May, 2022</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                <div class="news-one__single">
                    <div class="news-one__img">
                        <img src="{{ asset('site/assets/images/blog/news-1-3.jpg') }}" alt="">
                    </div>
                    <div class="news-one__content-box">
                        <div class="news-one__content-inner">
                            <div class="news-one__content">
                                <ul class="list-unstyled news-one__meta">
                                    <li><a href=""><i class="far fa-user-circle"></i> Admin</a>
                                    </li>
                                    
                                </ul>
                                <h3 class="news-one__title"><a href="">There are many
                                        variations of passages of Lorem</a></h3>
                            </div>
                            <div class="news-one__bottom">
                                <div class="news-one__read-more">
                                    <a href=""> <span class="icon-right-arrow"></span> Read
                                        More</a>
                                </div>
                                <div class="news-one__share">
                                    <a href="#"><i class="fas fa-share-alt"></i></a>
                                </div>
                            </div>
                            <div class="news-one__social-box">
                                <ul class="list-unstyled news-one__social">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="news-one__date">
                            <p>23 May, 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
@stop
@section('js')
<script src="{{asset('site/assets/js/plug_accordion.js')}}"></script>
<script src="{{asset('site/assets/js/marquee.js')}}"></script>
<script>
	$(document).ready(function() 
	{
		$("#slides").msAccordion({defaultid:1, autodelay:4});
		var options = {
		newsList: "#headlines",
		startDelay: 2,
		placeHolder1: "_",
		stopOnHover: false,
		controls: false,
		}
		$().newsTicker(options);
	});
</script>
@stop