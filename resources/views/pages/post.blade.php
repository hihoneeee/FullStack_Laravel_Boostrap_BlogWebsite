@extends('layout')
@section('content')
    {{--  <section id="contentSection">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="left_content">
                    <div class="single_post_content">
                        <div class="single_page">
                            <ol class="breadcrumb">
                                <li><a href="route('homepage')">Trang Chủ</a></li>
                                <li><a
                                        href="{{ route('category', [$post->category->slug]) }}">{{ $post->category->title }}</a>
                                </li>
                                <li class="active">{{ substr($post->title, 0, 50) }} ...</li>
                            </ol>
                            <h1 style="font-size: 2.5rem;text-transform: capitalize; font-weight: 700">{{ $post->title }}
                            </h1>
                            <div class="post_commentbox"> <a href="#"><i
                                        class="fa fa-user"></i>{{ $post->person->name }}</a>
                                <span><i class="fa fa-calendar"></i>{{ $post->date_create }}</span> <a
                                    href="{{ route('category', [$post->category->slug]) }}"><i
                                        class="fa fa-tags"></i>{{ $post->category->title }}</a>
                            </div>
                            <div class="single_page_content"> <img style="border-radius: 1rem; object-fit: cover;"
                                    class="img-center" src="{{ asset('uploads/post/' . $post->image) }}" alt="">
                                <blockquote>{{ $post->meta }}</blockquote>
                                <p>{!! $post->description !!}</p>
                            </div>
                            <div class="related_post">
                                <h2>Có thể bạn muốn xem <i class="fa fa-thumbs-o-up"></i></h2>
                                <ul class="spost_nav wow fadeInDown animated">
                                    @foreach ($related as $key => $related)
                                        <li>
                                            <div class="media"> <a class="media-left"
                                                    href="{{ route('post', $related->slug) }}"> <img
                                                        src="{{ asset('uploads/post/' . $related->image) }}"
                                                        alt=""> </a>
                                                <div class="media-body"> <a class="catg_title"
                                                        href="{{ route('post', $related->slug) }}">
                                                        {{ $related->title }}</a> </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.include.mucluc')
        </div>
    </section>  --}}
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('category', [$post->category->slug]) }}">{{ $post->category->title }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ $post->title }}</li>
                            </ol>

                            <span class="color-aqua"><a href="{{ route('category', [$post->category->slug]) }}"
                                    title="">{{ $post->category->title }}</a></span>

                            <h3>{{ $post->title }}</h3>

                            <div class="blog-meta big-meta">
                                <small><a href="single.html" title="">{{ $post->date_create }}</a></small>
                                <small><a href="blog-author.html" title="">by {{ $post->person->name }}</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                    <li><a href="#" class="gp-button btn btn-primary"><i
                                                class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img style="height: 390px; object-fit: cover" src="{{ asset('uploads/post/' . $post->image) }}"
                                alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">
                            <blockquote
                                style="padding: 10px 20px;
                            margin: 0 0 20px;
                            font-size: 17.5px;
                            border-left: 5px solid #eee; font-weight: 700">
                                {{ $post->meta }}
                            </blockquote>
                            <div class="pp">
                                {!! $post->description !!}
                            </div><!-- end pp -->
                        </div><!-- end pp -->
                    </div><!-- end content -->

                    <hr class="invis1">

                    <div style="display:flex; justify-content: space-between;align-items: center;">
                        @php
                            $current_url = Request::url();
                        @endphp
                        <div style="right: 0%;" class="fb-like" data-href="{{ $current_url }}" data-width=""
                            data-layout="" data-action="" data-size="" data-share="true"></div>
                        <div class="fb-save" data-uri="{{ $current_url }}" data-size="small"></div>
                    </div>
                    <hr class="invis1">

                    <div class="custombox authorbox clearfix" style="background-color: #ccc">
                        <h4 class="small-title">Bình Luận</h4>
                        @php
                            $current_url = Request::url();
                        @endphp
                        <article id="post-38424" class="item-content">
                            <div class="fb-comments" data-href="{{ $current_url }}" data-width="100%" data-numposts="10">
                            </div>
                        </article>
                    </div><!-- end author-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">Các Bài Viết Tương Tự</h4>
                        <div class="row">
                            @foreach ($related as $key => $post_related)
                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="{{ route('post', $post_related->slug) }}" title="">
                                                <img style="height: 200px; object-fit: cover;"
                                                    src="{{ asset('uploads/post/' . $post_related->image) }}"
                                                    alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="{{ route('post', $post_related->slug) }}"
                                                    title="">{{ $post_related->title }}</a></h4>
                                            <small><a href="{{ route('category', [$post_related->category->slug]) }}"
                                                    title="{{ $post_related->title }}">{{ $post_related->category->title }}</a></small>
                                            <small><a href=""
                                                    title="{{ $post_related->title }}">{{ $post_related->date_create }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                            @endforeach

                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">Leave a Reply</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper">
                                    <input type="text" class="form-control" placeholder="Your name">
                                    <input type="text" class="form-control" placeholder="Email address">
                                    <input type="text" class="form-control" placeholder="Website">
                                    <textarea class="form-control" placeholder="Your comment"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
                @include('pages.include.mucluc')
            </div><!-- end col -->

        </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
