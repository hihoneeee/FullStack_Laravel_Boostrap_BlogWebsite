@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Quản Lý Thông Tin BlogHay</div>
                    @if ($errors->any())
                        <div class="alert alert-danger" style="padding: 0.75rem 2.25rem; margin-bottom: 0">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! Form::open(['route' => ['info.update', $info->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu Đề Website', []) !!}
                            {!! Form::text('title', isset($info) ? $info->title : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Mô Tả Website', []) !!}
                            {!! Form::textarea('description', isset($info) ? $info->description : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'description',
                                'style' => 'resize: none',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('image', 'image', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($info))
                                <img style="margin-top: 1rem" width="30%"
                                    src="{{ asset('uploads/logo/' . $info->image) }}" alt="">
                            @endif
                        </div>
                        {!! Form::submit('Cập Nhật', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
