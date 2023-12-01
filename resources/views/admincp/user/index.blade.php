@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table-responsive" id='table_panigation'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mật Khẩu</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Giới Thiệu</th>
                            <th scope="col">Vai Trò</th>
                            <th scope="col">Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody class="order_position">
                        @foreach ($list as $key => $user)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ substr($user->description, 0, 100) }} ...</td>
                                <td>
                                    <img width="100%" src="{{ asset('uploads/user/' . $user->image) }}" alt="">
                                </td>
                                <td>
                                    @foreach ($user->roles as $key => $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('assign-role/' . $user->id) }}" style="margin-bottom: .5rem"
                                        class="btn btn-sm btn-success">Cấp vai trò</a>
                                    <a href="" class="btn btn-sm btn-info">Chuyển quyền</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
