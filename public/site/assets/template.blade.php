<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/png" href="{{asset('site/assets/images/icons/favicon.png')}}">

    @php
        $getRouteName = \Request::route()->getName();
        $checkseocontent = App\Models\Seo::where('route', $getRouteName)->limit(1)->first();
    @endphp
    @if($seocontent)
    <title>{{$seocontent->page_title}}</title>
        <meta name="keywords" content="{{$seocontent->meta_tag}}" />
        <meta name="description" content="{{$seocontent->page_description}}"/>
        {!! $seocontent->addition_script !!}
    @else
    
        @php $defaultSEO = App\Models\Seo::where('page', 'Default')->limit(1)->first(); @endphp
        <title>{{$defaultSEO->page_title}}</title>
        
        <meta name="keywords" content="{{$defaultSEO->meta_tag}}" />
        <meta name="description" content="{{$defaultSEO->page_description}}"/>
        {!! $defaultSEO->addition_script !!}
    @endif
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KMG5SLD9');</script>
    <!-- End Google Tag Manager -->

    <!--CSS bundle -->
    <link rel="stylesheet" media="all" href="{{asset('frontend/css/bundle.min.css')}}" />
    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{-- later need to comment out these 3  --}}
    <script src="https://js-sandbox.squarecdn.com/square-marketplace.js" async></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://portal.sandbox.afterpay.com/afterpay.js"></script>
    @yield('css')
    <style>
        article .text .title a {
            text-transform: none !important;
        }
        .products article .image img {
            width: 100%;
            height: 250px !important;   
            object-fit: cover;
        }
        }
    </style>
</head>

<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KMG5SLD9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <div class="page-loader"></div>
        <div class="wrapper">
            <!-- ==================  Navigation (main menu) ================== -->
          
            <!--Use class "navbar-fixed" or "navbar-default" -->
            <!--If you use "navbar-fixed" it will be sticky menu on scroll (only for large screens)-->
            <!-- ======================== Navigation ======================== -->
            <nav class="navbar-fixed">
                <div class="container">
                    <!-- ==========  Top navigation ========== -->
                    <div class="navigation navigation-top clearfix">
                        <ul>
                            <!--add active class for current page-->

                            {{-- <li><a href="https://www.facebook.com/profile.php?id=100092845840125" target="_bank"><i class="fa fa-facebook" style="font-size: 25px"></i></a></li> --}}
                            @if(Auth()->check())
                                @if(Auth()->user()->is_admin == 0)
                                   <li> <a href="{{route('getClientDashboard')}}"><i class="icon icon-user" style="font-size: 23px"></i> {{Auth()->user()->name }}</a></li>
                                @else
                                    <li> <a href="{{route('dashboard')}}"><i class="icon icon-user" style="font-size: 23px"></i> <span> {{Auth()->user()->name }} - Admin</span></a></li>
                                @endif
                            @else
                                <li><a href="javascript:void(0);" class="open-login"> <i class="icon icon-user" style="font-size: 23px"></i></a></li>
                            @endif
                            <li><a href="javascript:void(0);" class="open-search"> <i class="icon icon-magnifier" style="font-size: 23px"></i></a></li>
                            @php
                                $cartcount = App\Models\Cart::where('cartcode', Session::get('cartcode'))->count();
                                @endphp
                            <li><a href="javascript:void(0);" class="open-cart
                                @if(Session::has('cartshow') == 'true')
                                open 
                                @endif
                                "><i class="icon icon-cart" style="font-size: 30px"></i> <span>{{$cartcount}}</span></a></li>
                        </ul>
                    </div> <!--/navigation-top-->

                    <!-- ==========  Main navigation ========== -->

                    <div class="navigation navigation-main">

                        <!-- Setup your logo here-->

                        <a href="{{route('getHome')}}" class="logo"><img src="{{asset('site/assets/images/demos/site/banner/04231320230302246.png')}}" alt="" /></a>

                        <!-- Mobile toggle menu -->

                        <a href="#" class="open-menu"><i class="icon icon-menu"></i></a>

                        <!-- Convertible menu (mobile/desktop)-->

                        <div class="floating-menu">

                            <!-- Mobile toggle menu trigger-->

                            <div class="close-menu-wrapper">
                                <span class="close-menu"><i class="icon icon-cross"></i></span>
                            </div>

                            <ul>
                                <li><a href="{{route('getHome')}}">Home</a></li>
                                <li><a href="{{route('getAbout')}}">About Us</a></li>
                                <li>
                                    <a href="{{route('getProducts')}}">Products <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                    <div class="navbar-dropdown">
                                        <div class="navbar-box">
                                            <div class="box-1">
                                                <div class="image">
                                                    <img src="{{asset('frontend/assets/images/blog-2.jpg')}}" alt="Lorem ipsum" />
                                                </div>
                                                <div class="box">
                                                    <div class="h2" style="font-size: 16px; color:#ff0">Furniture and Bedding in Laverton</div>
                                                    <div class="clearfix">
                                                        <p>Welcome to Ecolife Furniture Wholesaler – your one-stop destination for exquisite wholesale furniture and bedding in Laverton and beyond. We're not just about selling furniture; we're about transforming your living spaces into havens of comfort and style. Our commitment to simplicity, elegance, affordability, and quality sets us apart as the premier choice for all furniture needs.</p>
                                                        <a class="btn btn-clean btn-big" href="{{route('getAbout')}}">Explore</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box-2">
                                                <div class="clearfix categories">
                                                    <div class="row">
                                                        @php $subcatagories = App\Models\Subcatagory::where('status', 'show')->get(); @endphp
                                                        @foreach($subcatagories as $subcatmenu)
                                                        @php $checkproductstatus = App\Models\Product::where('subcategory_id', $subcatmenu->id)->get(); @endphp
                                                        @if($checkproductstatus->count())
                                                        <div class="col-sm-3 col-xs-6">
                                                            <a href="{{route('getProductBySubCatagory', $subcatmenu->slug)}}">
                                                                <figure>
                                                                    {!!$subcatmenu->icon!!}
                                                                    <figcaption>{{$subcatmenu->name}}</figcaption>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        
                                                    </div> <!--/row-->
                                                </div> <!--/categories-->
                                            </div> <!--/box-2-->
                                        </div> <!--/navbar-box-->
                                    </div> <!--/navbar-dropdown-->
                                </li>

                                <li><a href="{{route('getFaq')}}">FAQ</a></li>
                                <li class="active"><a href="{{route('getBlogs')}}" class="active">Blogs</a></li>

                                

                                <!-- Simple menu link-->

                                <li><a href="{{route('getContact')}}">Contact Us</a></li>
                                <li><a href="{{route('getLandingPage')}}">Trade &amp; Commercial</a></li>
                            </ul>
                        </div> <!--/floating-menu-->
                    </div> <!--/navigation-main-->

                    <!-- ==========  Search wrapper ========== -->

                    <div class="search-wrapper">

                        <form action="{{route('getSearchProduct')}}" method="GET">
                        <input class="form-control" name="search" placeholder="Search..." />
                        <input type="submit" class="btn btn-main btn-search" value="Go!">
                        </form>
                    </div>

                    <!-- ==========  Login wrapper ========== -->

                    <div class="login-wrapper">
                        <form action="{{route('login')}}" method="POST">
                            @csrf()
                            <div class="h4">Sign in</div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <a href="{{route('verify')}}" class="open-popup">Forgot password?</a>
                                <a href="{{route('getClientLogin')}}" class="open-popup">Don't have an account? Register now</a>
                            </div>
                            <button type="submit" class="btn btn-block btn-main">Submit</button>
                        </form>
                    </div>

                    
                    @if($cartcount > 0)
                    <div class="cart-wrapper  @if(Session::has('cartshow') == 'true')
                    open 
                    @endif">
                        <div class="checkout">
                            <div class="clearfix">
                                <div class="row">
                                    @php
                                        $cartproducts =App\Models\Cart::where('cartcode', Session::get('cartcode'))->get();
                                        $totatcartamount = App\Models\Cart::where('cartcode', Session::get('cartcode'))->sum('totalamount');
                                    @endphp
                                    @foreach($cartproducts as $cartproduct)
                                        @php $cartproductinfo = App\Models\Product::find($cartproduct->product_id); @endphp
                                    <div class="cart-block cart-block-item clearfix">
                                        <div class="image">
                                            <a href=""><img src="{{asset('uploads/products/'.$cartproductinfo->img)}}" alt="" /></a>
                                        </div>
                                        <div class="title">
                                           
                                            <div>
                                                <a href=""> {{substr(strip_tags($cartproductinfo->pname),0,27) . "..."}}</a>
                                                <br /> <span class="final">${{$cartproductinfo->retailprice*$cartproduct->qty}}</span>
                                            </div>
                                            {{-- <small>Green corner</small> --}}
                                        </div>
                                        <div class="quantity">
                                            <form action="{{route('getCartUpdate')}}" method="POST">
                                                @csrf()
                                               Qty  <input type="number" name="qty" value="{{$cartproduct->qty}}">
                                                <input type="hidden" name="cartid" value="{{$cartproduct->id}}">
                                                <input type="submit" value="Update" style="margin-top: 5px">
                                            </form>
                                        </div>
                                        <div class="price">
                                            
                                        </div>
                                        <!--delete-this-item-->
                                        <a href="{{route('getCartRemove', $cartproduct->id)}}"><span class="icon icon-cross icon-delete"></span></a>
                                    </div>
                                    @endforeach
                                </div>

                                <hr />
                                <div class="clearfix">
                                    <div class="cart-block cart-block-footer clearfix">
                                        <div>
                                            <strong>Total</strong>
                                        </div>
                                        <div>
                                            <div class="h4 title">${{$totatcartamount}}</div>
                                        </div>
                                    </div>
                                </div>


                                <!--cart navigation -->

                                <div class="cart-block-buttons clearfix">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <a href="{{route('getCart', Session::get('cartcode'))}}" class="btn btn-clean-dark">View Cart</a>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a href="{{route('getCheckout', Session::get('cartcode'))}}" class="btn btn-main"><span class="icon icon-cart"></span> Checkout</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!--/checkout-->
                    </div>
                    @endif
                </div> <!--/container-->
            </nav>
            @php $notifications = App\Models\NotificationAlert::where('status', 'show')->get(); @endphp
            @if($notifications->count())
            <section class="banner" style="position: relative;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            padding-top: 130px;
            padding-bottom: 0;
            color: #fff;
            background-color: #1f7d89;">
                <div class="container">
                    <div class="row">
                        <marquee style="font-size: 18px;" behavior="scroll" direction="left"
                            onmouseover="this.stop();"
                            onmouseout="this.start();">
                            @foreach($notifications as $not)
                                @if($not->link != Null)
                                    <a href="{{$not->status}}">{!!$not->title !!}</a> &nbsp; &nbsp; &nbsp;
                                @else
                                    {!!$not->title !!} &nbsp; &nbsp; &nbsp; 
                                @endif
                            @endforeach
                        </marquee>
                       
                    </div>
                </div>
            </section>
            @endif

            @yield('content')

        
        <!-- ================== Footer  ================== -->

        <footer>
            <div class="container">

                <!--footer showroom-->
                <div class="footer-showroom">
                    <div class="row">
                        <div class="col-sm-8">
                            {{-- <h2>Visit our showroom</h2>
                            <p>2U2/103 Fitzgerald rd
                                Laverton North 3026,Vic</p>
                            <p>Operation Hours : Weekdays : 10am - 5pm &nbsp; &nbsp; | &nbsp; &nbsp; Saturday & Sunday : 10am - 3pm</p> --}}
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="{{route('getContact')}}" class="btn btn-clean"><span class="icon icon-map-marker"></span> Get directions</a>
                            <div class="call-us h4"><span class="icon icon-phone-handset"></span> 1300 31 02 31</div>
                        </div>
                    </div>
                </div>

                <!--footer links-->
                <div class="footer-links">
                    <div class="row">
                        <div class="col-sm-4 col-md-2">
                            <h5>Browse by</h5>
                            <ul>
                                @php $catagoriesf = App\Models\Category::where('status', '0')->where('deleted_at', Null)->get(); @endphp
                                @foreach($catagoriesf as $catf )
                                <li><a href="{{route('getProductByCatagory', $catf->slug)}}">{{$catf->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <h5>Company</h5>
                            <ul>
                                <li><a href="{{route('getAbout')}}">About Us</a></li>
                                <li><a href="{{route('getContact')}}">Contact Us</a></li>
                                <li><a href="{{route('getFaq')}}">Faq's</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <h5>My Account</h5>
                            <ul>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="{{route('getClientLogin')}}">Sign in</a></li>
                                <li><a href="#">Product Liability</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="row">
                               
                                    <h2>Visit our showroom</h2>
                                    <p>2U2/103 Fitzgerald rd
                                        Laverton North 3026,Vic</p>
                                    <p>Operation Hours : Weekdays : 10am - 5pm <br /> Saturday & Sunday : 10am - 3pm</p>
                               
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <h5 style="margin-top: 10px">We Accept</h5>
                                    <img src="{{asset('site/assets/images/payment1.jpeg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--footer social-->

                <div class="footer-social">
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="{{route('getPage', 'privacy-policy')}}" target="_blank"> Privacy Policy</a> &nbsp; | <a href="{{route('getPage', 'terms-and-conditions')}}">Term and Conditions</a> &nbsp; | &nbsp; <a href="{{route('getPage', 'refund-policy')}}">Refund Policy</a> | &nbsp; <a href="{{route('getPage', 'shipping-and-delivery')}}">Shipping and Delivery</a>
                        </div>
                        <div class="col-sm-4 links">
                            <ul>
                                <li><a href="https://www.facebook.com/p/Ecolife-Furniture-WholesalerDirect-to-Public-100092845840125/?paipv=0&eav=AfYNRR_W65eD_2cGiEJRTdr2ytP2YbFRizXyz3pU1DO-ONaX5CZATtYPe1jYkyLN3tQ&_rdr" target="_blank"><i style="font-size: 24px;" class="fa fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>




    </div> <!--/wrapper-->

    <!--JS bundle -->
    <script src="{{asset('frontend/js/bundle.min.js') }}"></script>
    
    @yield('js')
    <script>
  $(document).ready(function(){
    $('#exampleModal').modal('show');
  });
</script>
</body>
</html>































