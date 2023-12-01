<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  <meta charset="UTF-8">  --}}
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="theme-color" content="#234556">
    <meta http-equiv="Content-Language" content="vi" />
    <meta content="VN" name="geo.region" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="language" content="Việt Nam">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="" type="image/x-icon" />
    <meta name="revisit-after" content="1 days" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}" />

    <link rel="canonical" href="{{ Request::url() }}">
    <link rel="next" href="" />

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="Website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:site_name" content="{{ $meta_title }}" />

    <meta property="og:image" content="{{ $meta_image }}" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="65" />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ Request::url() }}">
    <meta property="twitter:url" content="{{ Request::url() }}">
    <meta name="twitter:title" content="{{ $meta_title }}">
    <meta name="twitter:description" content="{{ $meta_description }}">
    <meta name="twitter:image" content="{{ $meta_image }}">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">

    {{--  <!-- Favicon -->  --}}
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    {{--  <!-- theme -->  --}}
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/colors.css') }}" rel="stylesheet">

    <style>
        html::-webkit-scrollbar {
            width: .75rem;
            cursor: pointer;
        }

        html::-webkit-scrollbar-track {
            background-color: #fff;
        }

        html::-webkit-scrollbar-thumb {
            background-color: #0f0f10;
            border-radius: 5rem;
        }
    </style>
</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('frontend/images/loader.gif') }}" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline" action="{{ route('tim-kiem') }}">
                        <input id="timkiem" name="search" type="text" class="form-control"
                            placeholder="Nhập từ khóa....">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                        <div class="topsocial">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                                    class="fa fa-youtube"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i
                                    class="fa fa-flickr"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i
                                    class="fa fa-google-plus"></i></a>
                        </div><!-- end social -->
                    </div><!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                        <div class="topmenu text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="blog-category-01.html"><i
                                            class="fa fa-star"></i> Trends</a></li>
                                <li class="list-inline-item"><a href="blog-category-02.html"><i
                                            class="fa fa-bolt"></i> Hot Topics</a></li>
                                <li class="list-inline-item"><a href="page-contact.html"><i
                                            class="fa fa-user-circle-o"></i> Write for us</a></li>
                            </ul><!-- end ul -->
                        </div><!-- end topmenu -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="topsearch text-right">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                        </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="{{ route('homepage') }}"><img src="{{ asset('frontend/images/logo.png') }}"
                                    alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-pink-hover" href="{{ route('homepage') }}">Home</a>
                            </li>
                            {{--  <li
                                class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                        <div class="mega-menu-content clearfix">
                                            <div class="tab">
                                                <button class="tablinks active"
                                                    onclick="openCategory(event, 'cat01')">Beauty</button>
                                                <button class="tablinks"
                                                    onclick="openCategory(event, 'cat02')">Fashion</button>
                                                <button class="tablinks"
                                                    onclick="openCategory(event, 'cat03')">Travel</button>
                                                <button class="tablinks"
                                                    onclick="openCategory(event, 'cat04')">Architecture</button>
                                                <button class="tablinks"
                                                    onclick="openCategory(event, 'cat05')">Recipes</button>
                                            </div>

                                            <div class="tab-details clearfix">
                                                <div id="cat01" class="tabcontent active">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="{{ asset('frontend/images/logo.png') }}upload/menu_01.jpg"
                                                                            alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Spa</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Top 10+
                                                                            care advice for your toenails</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat02" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="{{ asset('frontend/upload/menu_05.jpg') }}"
                                                                            alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Fashion</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">2017
                                                                            summer stamp will have design models
                                                                            here</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat03" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="{{ asset('frontend/upload/menu_09.jpg') }}"
                                                                            alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Tourism</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">I visited
                                                                            the architects of Istanbul for you</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat04" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="{{ asset('frontend/upload/menu_14.jpg') }}"
                                                                            alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Places</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">A
                                                                            collection of the most beautiful shop
                                                                            designs</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                                <div id="cat05" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="single.html" title="">
                                                                        <img src="{{ asset('frontend/upload/menu_18.jpg') }}"
                                                                            alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Vegetables</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="single.html" title="">Grilled
                                                                            vegetable with fish prepared with fish</a>
                                                                    </h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                            </div><!-- end tab-details -->
                                        </div><!-- end mega-menu-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown has-submenu">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown02"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Features</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                    <li><a class="dropdown-item" href="single.html">Single Blog <span
                                                class="hidden-md-down hidden-sm-down hidden-xs-down"><i
                                                    class="fa fa-angle-right"></i></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="single.html">Single Default</a></li>
                                            <li><a class="dropdown-item" href="single-fullwidth.html">Single
                                                    Fullwidth</a></li>
                                            <li><a class="dropdown-item" href="single-slider.html">Single Gallery</a>
                                            </li>
                                            <li><a class="dropdown-item" href="single-video.html">Single Video</a>
                                            </li>
                                            <li><a class="dropdown-item" href="single-audio.html">Single Audio</a>
                                            </li>
                                            <li><a class="dropdown-item" href="single-no-media.html">Single No
                                                    Media</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="single.html">Blog Category <span
                                                class="hidden-md-down hidden-sm-down hidden-xs-down"><i
                                                    class="fa fa-angle-right"></i></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="blog-category-01.html">Blog Category
                                                    A</a></li>
                                            <li><a class="dropdown-item" href="blog-category-02.html">Blog Category
                                                    B</a></li>
                                            <li><a class="dropdown-item" href="blog-category-03.html">Blog Category
                                                    C</a></li>
                                            <li><a class="dropdown-item" href="blog-category-04.html">Blog Category
                                                    D</a></li>
                                            <li><a class="dropdown-item" href="blog-category-05.html">Blog Category
                                                    E</a></li>
                                            <li><a class="dropdown-item" href="blog-category-06.html">Blog Category
                                                    F</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="blog-author.html">Blog Author</a></li>
                                    <li><a class="dropdown-item" href="page-contact.html">Contact Page</a></li>
                                    <li><a class="dropdown-item" href="page.html">Default Page</a></li>
                                    <li><a class="dropdown-item" href="page-fullwidth.html">Fullwidth Page</a></li>
                                    <li><a class="dropdown-item" href="page-404.html">Not Found Page</a></li>
                                    <li><a class="dropdown-item" href="page-sitemap.html">Sitemap & Archives</a></li>
                                </ul>
                            </li>  --}}
                            @foreach ($category as $key => $cate)
                                <li class="nav-item">
                                    <a class="nav-link color-pink-hover"
                                        href="{{ route('category', [$cate->slug]) }}">{{ $cate->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->

        @yield('content')


        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Bài Viết Gần Đây</h2>
                            @foreach ($post_new_footer as $key => $new_post)
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="{{ route('post', $new_post->slug) }}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img style="height: 80px; width: 100%; object-fit: cover"
                                                    src="{{ asset('uploads/post/' . $new_post->image) }}"
                                                    alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $new_post->title }}</h5>
                                                <small>{{ $new_post->date_update }}</small>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- end blog-list -->
                            @endforeach
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Bài Viết Nổi Bật</h2>
                            @foreach ($post_hot_footer as $key => $hot_post)
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="{{ route('post', $hot_post->slug) }}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img style="height: 80px; width: 100%; object-fit: cover"
                                                    src="{{ asset('uploads/post/' . $hot_post->image) }}"
                                                    alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{ $hot_post->title }}</h5>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- end blog-list -->
                            @endforeach
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Danh Mục</h2>
                            <div class="link-widget">
                                <ul>
                                    @foreach ($category as $key => $cate_slide)
                                        <li><a href="{{ route('category', [$cate_slide->slug]) }}">{{ $cate_slide->title }}
                                                <span>(21)</span></a></li>
                                    @endforeach
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="invis1">

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.html"><img src="{{ asset('frontend/images/flogo.png') }}"
                                        alt="" class="img-fluid"></a>
                                <p>{{ $info->description }}</p>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom"
                                        title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline">
                                        <input type="text" class="form-control"
                                            placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">Subscribe <i
                                                class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <div class="copyright">&copy; Cloapedia. Design: <a href="#">HTML
                                Design</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop"><i class="ri-arrow-up-line"></i>
        </div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/tether.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"
        nonce="CmKK3Yyg"></script>

</body>

</html>
