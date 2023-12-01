@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="margin-bottom: .5rem; ">Cấp quyền cho {{ $role->name }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => ['insert-permissions', $role->id], 'method' => 'POST']) !!}
                        {{ csrf_field() }}

                        @foreach ($list_permissions as $key => $list)
                            {!! Form::checkbox('permission[]', $list->id, $permissions->contains($list->id), ['id' => $list->id]) !!}
                            {!! Form::label($list->id, $list->name) !!}
                        @endforeach

                        {!! Form::submit('Cấp quyền', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
