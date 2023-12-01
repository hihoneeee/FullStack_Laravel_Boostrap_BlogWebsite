@extends('layouts.app')
@section('title', 'Thêm Tài Khoản')
@section('content')
    <div class="content-wrapper" style="margin-top: 1rem">
        <section class="content">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin tài khoản</h3>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger" style="padding: 0.75rem 2.25rem; margin-bottom: 0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => ['user.update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="form-group">
                        {!! Form::label('name', 'Họ và Tên') !!}
                        {!! Form::text('name', isset($user) ? $user->name : '', [
                            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                            'required',
                            'autocomplete' => 'name',
                            'autofocus',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Giới Thiệu') !!}
                        {!! Form::textarea('description', isset($user) ? $user->description : '', [
                            'class' => 'form-control',
                            'placeholder' => 'nhập dữ liệu....',
                            'id' => 'description',
                            'style' => 'resize:none',
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Image', 'Hình Ảnh', []) !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                        @if (isset($user))
                            <img style="margin-top: 1rem" width="30%" src="{{ asset('uploads/user/' . $user->image) }}"
                                alt="">
                        @endif
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Cập Nhật', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection
