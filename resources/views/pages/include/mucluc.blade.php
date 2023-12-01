<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Tìm Kiếm</h2>
            <form class="form-inline search-form" action="{{ route('tim-kiem') }}">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="nhập từ khóa...">
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

        <div class="widget post_menu"
            style="padding: 1rem; background-color: #f1f1f1; height: 30rem; border-radius: 1rem; overflow: auto;">
            <span style="text-transform: capitalize; font-size: 2rem; font-weight: 700; color: #000;">Mục Lục</span>
            <div style="width: 100%; margin: .5rem 0 .5rem 0; border-bottom: .1rem solid #000"></div>
            <div class="table-of-contents">
                @tableOfContents($post->description)
            </div>
            <script>
                $('.table-of-contents').empty();

                if (data) {
                    $('.table-of-contents').html(data);
                }
            </script>
        </div>


    </div><!-- end sidebar -->
</div><!-- end col -->

<style>
    .post_menu {
        scroll-behavior: smooth;
        scroll-padding-top: 6rem;
    }

    .post_menu a {
        color: #000;
    }

    .post_menu li a:hover {
        color: #435334;
    }

    .post_menu::-webkit-scrollbar {
        width: .75rem;
    }

    .post_menu::-webkit-scrollbar-track {
        background-color: #fff;
    }

    .post_menu::-webkit-scrollbar-thumb {
        background-color: #0f0f10;
        border-radius: 5rem;
    }
</style>
