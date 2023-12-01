@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table" id='table_panigation'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu Đề</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Hiển Thị/Không</th>
                            <th scope="col">Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $cate)
                            <tr id="{{ $cate->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $cate->title }}</td>
                                <td>{{ $cate->slug }}</td>
                                <td>{{ $cate->description }}</td>
                                <td>
                                    @if ($cate->status == 1)
                                        Hiển Thị
                                    @else
                                        Không Hiển Thị
                                    @endif
                                </td>
                                <td>

                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['category.destroy', $cate->id],
                                        'onsubmit' => 'return confirm("Bạn có muốn xóa?")',
                                    ]) !!}

                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
