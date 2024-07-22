<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lions Clubs International - District 325 M, Nepal</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('site/assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('site/assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('site/assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('site/assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Lions Clubs International - District 325 M, Nepal" />

    <!-- fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com/"> --}}

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&amp;display=swap" rel="stylesheet"> --}}


    <link rel="stylesheet" href="{{ asset('site/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/oxpins-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/vendors/timepicker/timePicker.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/assets/css/style-responsive.css') }}" />
    @yield('css')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <div class="page-wrapper">
        <header class="main-header">
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="main-menu__wrapper-inner">
                       
                        <div class="main-menu__right">
                            <div class="main-menu__right-top">
                                <div class="main-menu__right-top-left">
                                    <div class="main-menu__volunteers">
                                      
                                            
                                                <a href="{{ route('getHome') }}"><img src="{{ asset('site/assets/images/logo.png') }}" alt="" width="140"></a>
                                            
                                        
                                        <img src="{{ asset('site/assets/images/logo-23-24.png') }}" alt="" width="150" style="margin-right:10px; position: relative;">
                                        <h5 style="color: #1c4f9c; position: relative; padding-top: 17px; float:right; padding-top:37px"><strong>Lions Clubs International</strong> <br />
                                            <span>District 325 M, Nepal</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="main-menu__49-top-right">
                                    <div class="main-menu__right-top-address">
                                        <ul class="list-unstyled main-menu__right-top-address-list">
                                           
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-location"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Katmandu</p>
                                                    <h5>Basundhara, Kathmandu</h5>
                                                    <h5>
                                                        <a href="tel:+97715914004"> 01-5914004, 9866025939</a>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-location"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Pokhara</p>
                                                    <h5>Newroad, Pokhara</h5>
                                                    <h5>
                                                        <a href="tel:+97761535222">061535222</a> <br />
                                                    </h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="main-menu__right-bottom">
                                <div class="main-menu__main-menu-box">
                                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                    <ul class="main-menu__list">
                                        @guest
                                        <li><a href="{{ route('getHome') }}">Home</a></li>
                                        <li class="dropdown" style="z-index: 9999;">
                                            <a href="javascript:void(0)">About Us</a>
                                            <ul style="z-index: 9999;">
                                                <li><a href="{{ route('getAboutUs') }}">Introduction</a></li>
                                                <!-- <li><a href="">Mission &amp; Vission</a></li>
                                                <li><a href="">District Official Protocal - 2022/23</a></li>
                                                <li><a href="">Division of Departments - 2022/23</a></li>
                                                <li><a href="">District Annual Calendar - 2022/23</a></li> -->
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('getClubs') }}">Clubs</a></li>
                                        <li class="dropdown megamenu">
                                            <a href="javascript:void(0)">District Officers</a>
                                            <ul>
                                                <li>
                                                    <section class="home-showcase megamenu-left">
                                                        <div class="container">
                                                            <div class="home-showcase__inner">
                                                                <div class="row">
                                                                    @php $getdepartments = App\Models\Department::where('lion_year', env('lion_year'))->where('zone', NULL)->where('region', NULL)->where('deleted', 'N')->orderby('position', 'asc')->get(); @endphp
                                                                    @foreach($getdepartments as $department)
                                                                    <div class="col-lg-3">
                                                                        <a href="{{ route('getDepartmentTeams', $department->slug) }}">
                                                                            <div class="home-showcase__item">
                                                                                <h3 class="home-showcase__title">{{$department->title}}</h3>
                                                                                <div class="home-showcase__image">
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('getProjects')}}">Programme/Projects</a></li>
                                        <li><a href="{{route('getNews')}}">News &amp; Events</a></li>
                                        <li class="dropdown">
                                            <a href="javascript:void(0)">Donors</a>
                                            <ul>
                                                @php
                                                    $donormenus = App\Models\Donortype::all();
                                                @endphp
                                                @foreach($donormenus as $donormenu)
                                                <li><a href="{{ route('getDonorDetail', $donormenu->slug) }}">{{ $donormenu->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                        <li><a href="{{ route('club.dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('club.profile') }}">Club Profile</a></li>
                                        <li><a href="{{ route('club.getManageMember') }}">Club Members</a></li>
                                        <li><a href="">Reports</a></li>
                                        <li><a href="">Notices</a></li>
                                        <li><a href="{{route('club.getRegistrationList')}}">Registration</a></li>
                                        @endguest
                                    </ul>
                                </div>
                                <div class="main-menu__main-menu-content-box">
                                    <div class="main-menu__search-cat-btn-box">
                                        <div class="main-menu__btn-box">
                                            @guest
                                            <a href="" class="main-menu__btn" style="color: #fff">Lion Year : {{env('lion_year')}}</a>
                                            @else
                                           <a href="" class="main-menu__btn" style="color: #fff;">{{ Auth::user()->name }}</a> &nbsp; &nbsp;
                                           <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                
                                            <a href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                           </a>
                                        </form>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        @yield('content')

        <!--Site Footer Start-->
        <footer class="site-footer">
            <div class="site-footer-bg" style="background-image: url({{ asset('site/assets/images/backgrounds/site-footer-bg.jpg') }});">
            </div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="row">
                        {{-- <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="{{ route('getHome') }}"><img src="{{ asset('site/assets/images/logo.png') }}" alt="" width="200"></a>
                                </div>
                                <div class="footer-widget__btn">
                                    <a href="" style="color:yellow;">Introduction</a> | <a href="" style="color:yellow;">Mission &amp; Vision</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__links clearfix">
                                <h3 class="footer-widget__title">Links</h3>
                                <ul class="footer-widget__links-list list-unstyled clearfix">
                                    <li><a href="{{ route('getAboutUs') }}">About us</a></li>
                                    <li><a href="{{ route('getClubs') }}">Our Clubs</a></li>
                                    <li><a href="{{ route('getNews') }}">News &amp; Events</a></li>
                                    <li><a href="{{ route('getProjects') }}">Programme / Projects</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__column footer-widget__non-profit clearfix">
                                <h3 class="footer-widget__title"> &nbsp; &nbsp; </h3>
                                <ul class="footer-widget__non-profit-list list-unstyled clearfix">
                                    <li><a href="{{ route('getgovernorTeams') }}">Our Team</a></li>
                                    <li><a href="{{route('getRegionzonedevision')}}">Region/Zone Division</a></li>
                                    <li><a href="">Notices</a></li>
                                    <li><a href="{{ route('getContact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title">Contact</h3>
                                <p class="footer-widget__contact-text">Pokhara
                                </p>
                                <p class="footer-widget__contact-text">New Road, Pokhara<br>Nepal
                                </p>
                                <ul class="list-unstyled footer-widget__contact-list">
                                    <li>
                                        <div class="icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="mailto:lionsdistrict325Mnepal@gmail.com">lionsdistrict325mnepal@gmail.com</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="tel:+97761535222">+977 61535222</a></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="site-footer__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title"> &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;</h3>
                                <p class="footer-widget__contact-text">Kathmandu
                                </p>
                                <p class="footer-widget__contact-text">Basundhara, Kathmandu
                                </p>
                                <ul class="list-unstyled footer-widget__contact-list">
                                    <li>
                                        <div class="icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="mailto:lionsdistrict325Mnepal@gmail.com">lionsdistrict325mnepal@gmail.com</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="tel:+97715912325">+977 15912325</a></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="site-footer__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="site-footer__bottom-inner">
                                <p class="site-footer__bottom-text"> &copy; All Copyright @php echo date('Y') @endphp by <a href="#">Lions Club International District 325M, Nepal</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box" style="text-align: center;">
                <a href="{{ route('getHome') }}" aria-label="logo image">
                    <img src="{{ asset('site/assets/images/logo-23-24.png') }}" width="70"
                        alt="" /></a>
                        Lions Clubs International - District 325 M, Nepal
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <div class="row">
                <div class="col-md-12" style="text-align:center; margin-top:10px">
                    <div>
                        <a href="{{route('login')}}" class="btn btn-primary">CLub Login</a>
                    </div>
                </div>
            </div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">mail@lionsdistrict325Mnepal.org.np</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+97761535222">+977 61535222</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>

 
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a>


    <script src="{{ asset('site/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('site/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>




    <!-- template js -->
    <script src="{{ asset('site/assets/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>