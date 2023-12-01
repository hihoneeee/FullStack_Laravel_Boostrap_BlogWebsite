@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Thêm mới Bài Viết</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($post))
                            {!! Form::open(['route' => 'post.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open(['route' => ['post.update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu Đề Bài Viết', []) !!}
                            {!! Form::text('title', isset($post) ? $post->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($post) ? $post->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta', 'Meta Bài Viết', []) !!}
                            {!! Form::textarea('meta', isset($post) ? $post->meta : '', [
                                'class' => 'form-control',
                                'id' => 'meta',
                                'style' => 'resize: none',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Nội Dung Bài Viết', []) !!}
                            {!! Form::textarea('description', isset($post) ? $post->description : '', [
                                'class' => 'form-control tinymce_decrisption',
                                'id' => 'description',
                                'style' => 'resize: none',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tags', 'Từ Khóa Bài Viết', []) !!}
                            {!! Form::textarea('tags', isset($post) ? $post->tags : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'tags',
                                'style' => 'resize: none',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Active', 'Nổi Bật', []) !!}
                            {!! Form::select('status', ['1' => 'Hiển thị', '2' => 'Không'], isset($post) ? $post->status : '', [
                                'class' => 'form-control',
                                'id' => 'status',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Category', 'Danh Mục Bài viết', []) !!}
                            {!! Form::select('category_id', $category, isset($post) ? $post->category_id : '', [
                                'class' => 'form-control',
                                'id' => 'category_id',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Person', 'Người Viết', []) !!}
                            {!! Form::select('person_id', $person, isset($post) ? $post->person_id : '', [
                                'class' => 'form-control',
                                'id' => 'person_id',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Hot', 'Bài viết Hot', []) !!}
                            {!! Form::select('post_hot', ['1' => 'Có', '0' => 'Không'], isset($post) ? $post->post_hot : '', [
                                'class' => 'form-control',
                                'id' => 'post_hot',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image', 'Hình Ảnh', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($post))
                                <img style="margin-top: 1rem" width="30%"
                                    src="{{ asset('uploads/post/' . $post->image) }}" alt="">
                            @endif
                        </div>

                        @if (!isset($post))
                            {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Cập Nhật', ['class' => 'btn btn-success']) !!}
                        @endif
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
