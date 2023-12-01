@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="margin-bottom: .5rem; ">Thêm quyền: </h3>
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
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (!isset($permission))
                            {!! Form::open(['route' => 'permission.store', 'method' => 'POST']) !!}
                        @else
                            {!! Form::open(['route' => ['permission.update', $permission->id], 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('name', 'Tên quyền', []) !!}
                            {!! Form::text('name', isset($permission) ? $permission->name : '', [
                                'class' => 'form-control',
                                'placeholder' => 'Nhập dữ liệu....',
                            ]) !!}
                        </div>

                        @if (!isset($permission))
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
