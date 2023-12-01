@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin-bottom: 1rem">
                <a href="{{ route('permission.create') }}" class="btn btn-info">Thêm Quyền</a>
            </div>

            <div class="col-md-12">
                <table class="table" id='table_panigation'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Quyền</th>
                            <th scope="col">Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $permission)
                            <tr id="{{ $permission->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['permission.destroy', $permission->id],
                                        'onsubmit' => 'return confirm("Bạn có muốn xóa?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger btn-sm', 'style' => 'margin-bottom: .5rem']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('permission.edit', $permission->id) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
