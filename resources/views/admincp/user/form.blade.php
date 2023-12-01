@extends('layouts.app')
@section('title', 'Thêm Tài Khoản')
@section('content')
    <div class="content-wrapper" style="margin-top: 1rem">
        <section class="content">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm mới tài khoản</h3>
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
                    {!! Form::open([
                        'route' => 'user.store',
                        'method' => 'POST',
                        'enctype' => 'multipart/form-data',
                    ]) !!}

                    @csrf
                    <div class="form-group">
                        {!! Form::label('name', __('Name')) !!}
                        {!! Form::text('name', old('name'), [
                            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''),
                            'required',
                            'autocomplete' => 'name',
                            'autofocus',
                        ]) !!}

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', __('Email Address')) !!}
                        {!! Form::email('email', old('email'), [
                            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''),
                            'required',
                            'autocomplete' => 'email',
                        ]) !!}

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', __('Password')) !!}
                        {!! Form::password('password', [
                            'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''),
                            'required',
                            'autocomplete' => 'new-password',
                        ]) !!}
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', __('Confirm Password')) !!}
                        {!! Form::password('password_confirmation', [
                            'class' => 'form-control',
                            'required',
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
                        {!! Form::submit('Thêm Tài Khoản', ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            {!! Form::close() !!}
        </section>
    </div>
@endsection
