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
                <li class="active">About Us</li>
            </ul>
            <h2>Introduction</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Four Start-->
<section class="about-four">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-four__left">
                    <div class="about-four__img-box">
                        <div class="about-four__img">
                            <img src="{{ asset('site/assets/images/resources/about-four-img-1.jpg') }}" alt="">
                        </div>
                        {{-- <div class="about-four__img-two">
                            <img src="{{ asset('site/assets/images/resources/about-four-img-2.jpg') }}" alt="">
                        </div> --}}
                        <div class="about-four__border"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-four__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">About District 325 M, Nepal</span>
                        <h2 class="section-title__title">Get to know about our organization</h2>
                    </div>
                    <p class="about-four__text">For over 100 years, Lions have served with uncommon kindness, putting the needs of our neighbors, our communities and our world first. Through the incredible work of our Lion and Leo members, and the support of our association and our global foundation, we are serving a world in need together.</p>
                        <br />
                        <p>Lions serve locally in so many different ways. We also have fully developed programs, service resources, funding opportunities for Lions and Leos, and organizational support for eight global causes and a number of special initiatives.</p> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 20px; margin-bottom: 40px;">
                    <p class="about-four__text">
                    </p><br />
                    {{-- <p class="about-four__text">
                    Leadership with empathy is necessary to achieve three pillars of Lionism:
                    Leadership, Social Service and Networking successfully. Each member of a club must demonstrate responsibility, show respect, and foster pride as a Lion.
                    Leaders must fulfill the role of leadership by honoring and respecting each
                    individual member, building relationships within a club.
                    </p> <br /> --}}
                    {{-- <p class="about-four__text">
                    A successful leader always invests on his/her peers and seeks out for ideas to
                    reach their potential, build on their capabilities, and provide time to understand
                    each other. This will help to develop strong camaraderie and trust among
                    everyone.
                    </p> --}}
                    {{-- <br /> <p class="about-four__text">
                    Therefore, empathy is a fundamental component in social service. If we make
                    time to understand those around us, feel their hunger, tears, and needs, we
                    can fully dedicate ourselves to serve them better. To be a Lion means to provide
                    selfless service - we must open our hearts and soul in social service in the
                    truest sense and that can only be attainable by leading with empathy.
                    When a leader thinks, behaves and leads with empathy and compassion, it
                    can create a ripple effect, and everyone can embrace and adapt it in their
                    actions and decisions. This then becomes a core value which is integral in our
                    social institution.</p>
                    <p class="about-four__text">
                    Come Lion friends, let us participate by giving our best for equal transformation
                    in the essence of Lead with Empathy put forward this year by us.</p>
                    <br />
                    <p class="about-four__text">Thank you, Hail Lionism!</p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@stop