@extends('layouts.app')
@section('content')
    <div style="margin-top: 1rem" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive" style="margin-top: 1rem">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Quản Lý</th>
                                <th scope="col">Tiêu Đề Bài Viết</th>
                                {{--  <th scope="col">Slug</th>  --}}
                                <th scope="col">Meta Bài Viết</th>
                                <th scope="col">Nội Dung Bài Viết</th>
                                <th scope="col">Ảnh Đại Diện</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Người Viết</th>
                                <th scope="col">Bài Viết Hot</th>
                                <th scope="col">Từ Khóa</th>
                                <th scope="col">Hiển Thị/Không</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $post)
                                <tr id="{{ $post->id }}">
                                    <th scope="row">{{ $key }}</th>
                                    <td>

                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['post.destroy', $post->id],
                                            'onsubmit' => 'return confirm("Bạn có muốn xóa?")',
                                        ]) !!}

                                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                        <a href="{{ route('post.edit', $post->id) }}" style="margin-top: .5rem"
                                            class="btn btn-warning btn-sm">Sửa</a>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ substr($post->meta, 0, 100) }}</td>
                                    <td>{{ substr($post->description, 0, 500) }}</td>

                                    <td><img width="30%" src="{{ asset('uploads/post/' . $post->image) }}"
                                            alt="">
                                        <input type="file" data-post_id="{{ $post->id }}"
                                            id="file-{{ $post->id }}" class="form-control-static file_image_post"
                                            accept="image/*">
                                        <span id="success_image"></span>
                                    </td>
                                    <td>
                                        {!! Form::select('category_id', $category, isset($post) ? $post->category->id : '', [
                                            'class' => 'category_choose',
                                            'id' => $post->id,
                                        ]) !!}
                                    </td>
                                    <td>
                                        <span class="badge badge-primary btn-group">{{ $post->person->name }}</span>
                                    </td>
                                    <td>
                                        <select name="" id="{{ $post->id }}" class="post_hot_choose">
                                            @if ($post->post_hot == 0)
                                                <option value="">--chọn--</option>
                                                <option value="1">Có</option>
                                                <option selected value="0">không</option>
                                            @else
                                                <option value="">--chọn--</option>
                                                <option selected value="1">Có</option>
                                                <option value="0">Không</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        @if ($post->tags != null)
                                            {{ substr($post->tags, 0, 100) }}
                                        @else
                                            Chưa có từ khóa cho phim
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->status == 1)
                                            Hiển Thị
                                        @else
                                            Không Hiển Thị
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
