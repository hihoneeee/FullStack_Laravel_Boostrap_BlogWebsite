@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="margin-bottom: .5rem; ">Quản Lý Người Viết: </h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($person))
                            {!! Form::open(['route' => 'person.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @else
                            {!! Form::open([
                                'route' => ['person.update', $person->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('name', 'Tên người viết', []) !!}
                            {!! Form::text('name', isset($person) ? $person->name : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'slug',
                                'onkeyup' => 'ChangeToSlug()',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($person) ? $person->slug : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'convert_slug',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Mô Tả', []) !!}
                            {!! Form::textarea('description', isset($person) ? $person->description : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                                'id' => 'description',
                                'style' => 'resize: none',
                            ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Image', 'Hình Ảnh', []) !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if (isset($person))
                                <img style="margin-top: 1rem" width="30%"
                                    src="{{ asset('uploads/person/' . $person->image) }}" alt="">
                            @endif
                        </div>

                        @if (!isset($person))
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
