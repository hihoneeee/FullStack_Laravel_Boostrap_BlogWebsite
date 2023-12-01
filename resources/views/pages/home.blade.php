@extends('layout')
@section('content')
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">
                <div class="left-side">
                    @foreach ($post_random->take(1) as $key => $rand)
                        <div class="masonry-box post-media">
                            <img style="height: 390px; object-fit: cover" src="{{ asset('uploads/post/' . $rand->image) }}"
                                alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="{{ route('category', $rand->category->slug) }}"
                                                title="">{{ $rand->category->title }}</a></span>
                                        <h4><a href="{{ route('post', $rand->slug) }}"
                                                title="">{{ $rand->title }}</a></h4>
                                        <small><a href="{{ route('post', $rand->slug) }}"
                                                title="">{{ $rand->date_update }}</a></small>
                                        <small><a href="{{ route('person', $rand->person->slug) }}"
                                                title="">{{ $rand->person->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    @endforeach
                </div><!-- end left-side -->


                <div class="center-side">
                    @foreach ($post_hot as $key => $hot_post)
                        <div class="masonry-box small-box post-media">
                            <img style="height: 190px; object-fit: cover"
                                src="{{ asset('uploads/post/' . $hot_post->image) }}" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green"><a href="{{ route('category', $hot_post->category->slug) }}"
                                                title="">{{ $hot_post->category->title }}</a></span>
                                        <h4><a href="{{ route('post', $hot_post->slug) }}"
                                                title="">{{ $hot_post->title }}</a>
                                        </h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    @endforeach

                </div><!-- end left-side -->

                <div class="right-side hidden-md-down">
                    @foreach ($post_new->take(1) as $key => $new_post)
                        <div class="masonry-box post-media">
                            <img style="height: 390px" src="{{ asset('uploads/post/' . $hot_post->image) }}" alt=""
                                class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="{{ route('category', $new_post->category->slug) }}"
                                                title="">{{ $new_post->category->title }}</a></span>
                                        <h4><a href="{{ route('post', $new_post->slug) }}"
                                                title="">{{ $new_post->title }}</a></h4>
                                        <small><a href="{{ route('post', $new_post->slug) }}"
                                                title="">{{ $new_post->date_update }}
                                                ...</a></small>
                                        <small><a href="{{ route('person', $new_post->person->slug) }}"
                                                title="">{{ $new_post->person->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    @endforeach

                </div><!-- end right-side -->

            </div><!-- end masonry -->
        </div>
    </section>

    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    @foreach ($category_home->take(5) as $key => $cate_home)
                        <div class="blog-list clearfix">
                            <div class="section-title">
                                <h3 class="color-green"><a href="{{ route('category', $cate_home->slug) }}"
                                        title="">{{ $cate_home->title }}</a>
                                </h3>
                            </div><!-- end title -->
                            @foreach ($cate_home->post as $post_home)
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('post', $post_home->slug) }}"
                                                title="{{ $post_home->title }}">
                                                <img style="height: 255px; object-fit: cover"
                                                    src="{{ asset('uploads/post/' . $post_home->image) }}" alt=""
                                                    class="img-fluid img_respon">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="{{ route('post', $post_home->slug) }}"
                                                title="">{{ $post_home->title }}</a></h4>
                                        <p>{{ $post_home->meta }}</p>
                                        <small><a href="{{ route('category', $cate_home->slug) }}"
                                                title="">{{ $cate_home->title }}</a></small>
                                        <small><a href="{{ route('post', $cate_home->slug) }}"
                                                title="">{{ $post_home->date_create }}</a></small>
                                        <small><a href="{{ route('person', $post_home->person->slug) }}"
                                                title="">{{ $post_home->person->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
                            @endforeach

                        </div><!-- end blog-list -->
                    @endforeach
                </div><!-- end col -->
                @include('pages.include.sildebar')
            </div><!-- end row -->
            <hr class="invis1">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="{{ asset('frontend/upload/banner_02.jpg') }}" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <style>
        @media (max-width: 767px) {}
    </style>
@endsection
