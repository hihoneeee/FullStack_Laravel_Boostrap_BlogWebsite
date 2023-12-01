@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table" id='table_panigation'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Quản Lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $person)
                            <tr id="{{ $person->id }}">
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $person->name }}</td>
                                <td>{{ $person->slug }}</td>
                                <td>{{ $person->description }}</td>

                                <td>
                                    <img width="30%" src="{{ asset('uploads/person/' . $person->image) }}"
                                        alt="">
                                    <input type="file" data-person_id="{{ $person->id }}" id="file-{{ $person->id }}"
                                        class="form-control-static file_image" accept="image/*">
                                    <span id="success_image"></span>
                                </td>

                                <td>

                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['person.destroy', $person->id],
                                        'onsubmit' => 'return confirm("Bạn có muốn xóa?")',
                                    ]) !!}

                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('person.edit', $person->id) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
