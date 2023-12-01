@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin-bottom: 1rem">
                <a href="{{ route('role.create') }}" class="btn btn-info">Thêm vai trò</a>
            </div>

            <div class="col-md-12">
                <table class="table" id='table_panigation'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Vai Trò</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_role as $key => $role)
                            <tr id="{{ $role->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $key => $permission)
                                        <span class="badge badge-info">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td style="display: flex">
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['role.destroy', $role->id],
                                        'onsubmit' => 'return confirm("Bạn có muốn xóa?")',
                                    ]) !!}
                                    <a href="{{ url('assign-permissions/' . $role->id) }}"
                                        class="btn btn-sm btn-success">Cấp quyền</a>
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-sm', 'style' => 'margin-right: .3rem']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
