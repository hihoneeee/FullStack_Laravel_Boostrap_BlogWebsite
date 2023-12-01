@extends('layout')
@section('content')
    <div class="page-title wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-user"></i> Tác Giả {{ $person_slug->name }}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
                        <li class="breadcrumb-item active">Tác Giả {{ $person_slug->name }}</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">Giới Thiệu Về Tác Giả</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img style="height: 110px; width: 110px; object-fit: cover"
                                        src="{{ asset('uploads/person/' . $person_slug->image) }}" alt=""
                                        class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="#">{{ $person_slug->name }}</a></h4>
                                    <p>{{ $person_slug->description }}</p>

                                    <div class="topsocial">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                                class="fa fa-facebook"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                                                class="fa fa-youtube"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                                class="fa fa-pinterest"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                                class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                                class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                                                class="fa fa-link"></i></a>
                                    </div><!-- end social -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">


                        <div class="blog-custom-build">
                            @foreach ($post as $key => $per_post)
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{ route('post', $per_post->slug) }}" title="">
                                            <img style="height: 460px; object-fit: cover"
                                                src="{{ asset('uploads/post/' . $per_post->image) }}" alt=""
                                                class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                            <!-- end hover -->
                                        </a>
                                    </div>
                                    <!-- end media -->
                                    <div class="blog-meta big-meta text-center">
                                        <h4><a href="{{ route('post', $per_post->slug) }}"
                                                title="">{{ $per_post->title }}</a></h4>
                                        <p>{{ $per_post->meta }}</p>
                                        <small><a href="{{ route('category', $per_post->category->slug) }}"
                                                title="">{{ $per_post->category->title }}</a></small>
                                        <small><a href="{{ route('post', $per_post->slug) }}"
                                                title="">{{ $per_post->date_create }}</a></small>
                                        <small><a href="{{ route('person', $person_slug->slug) }}"
                                                title="">{{ $person_slug->name }}</a></small>
                                        <small><a href="" title=""><i class="fa fa-eye"></i>
                                                2291</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                            @endforeach
                        </div><!-- end blog-custom-build -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">

                    <div class="text-center my-auto">
                        {!! $post->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div><!-- end col -->
                @include('pages.include.sildebar')
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
