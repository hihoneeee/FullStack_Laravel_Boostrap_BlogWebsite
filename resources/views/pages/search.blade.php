@extends('layout')
@section('content')
    <div class="page-title wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-shopping-bag bg-red"></i> Từ khóa: {{ $search }}</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
                        <li class="breadcrumb-item">
                            <ahref="">{{ $search }}</ahref=>
                        </li>
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
                        @foreach ($post as $key => $post_search)
                            <div class="blog-list clearfix">
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="{{ route('post', $post_search->slug) }}" title="">
                                                <img style="height: 200px; object-fit: cover"
                                                    src="{{ asset('uploads/post/' . $post_search->image) }}"
                                                    alt="{{ route('post', $post_search->slug) }}" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="{{ route('post', $post_search->slug) }}"
                                                title="">{{ $post_search->title }}</a></h4>
                                        <p>{{ $post_search->meta }}</p>
                                        <small><a href="{{ route('category', $post_search->category->slug) }}"
                                                title="">{{ $post_search->category->title }}</a></small>
                                        <small><a href="{{ route('post', $post_search->slug) }}"
                                                title="">{{ $post_search->date_create }}</a></small>
                                        <small><a href="{{ route('person', $post_search->person->slug) }}"
                                                title="">{{ $post_search->person->name }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <hr class="invis">
                            </div><!-- end blog-list -->
                        @endforeach
                    </div><!-- end page-wrapper -->
                    <hr class="invis">
                    <div class="text-center my-auto">
                        {!! $post->appends(['search' => $search])->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div><!-- end col -->
                @include('pages.include.sildebar')
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
