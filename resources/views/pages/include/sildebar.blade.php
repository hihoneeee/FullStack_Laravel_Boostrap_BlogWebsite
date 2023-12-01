<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Search</h2>
            <form class="form-inline search-form" action="{{ route('tim-kiem') }}">
                <div class="form-group">
                    <input id="timkiem" name="search" type="text" class="form-control" placeholder="nhập từ khóa...">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Những Bài Viết Nổi Bật</h2>
            @foreach ($post_hot as $key => $hot_slidebar)
                <div class="blog-list-widget">
                    <div class="list-group">
                        <a href="{{ route('post', $hot_slidebar->slug) }}"
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img style="width: 100%; height: 4rem; object-fit: cover"
                                    src="{{ asset('uploads/post/' . $hot_slidebar->image) }}" alt=""
                                    class="img-fluid float-left">
                                <h5 class="mb-1">{{ substr($hot_slidebar->title, 0, 60) }} ...</h5>
                                <small>{{ $hot_slidebar->date_create }}</small>
                            </div>
                        </a>
                    </div>
                </div><!-- end blog-list -->
            @endforeach

        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Instagram Feed</h2>
            <div class="instagram-wrapper clearfix">
                @foreach ($post_random as $key => $img_slide)
                    <a href="{{ route('post', $img_slide->slug) }}"><img
                            style="height: 80px; width: 100%; object-fit: cover"
                            src="{{ asset('uploads/post/' . $img_slide->image) }}" alt="{{ $img_slide->title }}"
                            class="img-fluid"></a>
                @endforeach
            </div><!-- end Instagram wrapper -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    @foreach ($category as $key => $cate_slide)
                        <li><a href="{{ route('category', [$cate_slide->slug]) }}">{{ $cate_slide->title }}
                                <span>(21)</span></a></li>
                    @endforeach
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->
