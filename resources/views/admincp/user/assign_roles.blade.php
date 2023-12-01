@extends('layouts.app')

@section('content')
    <div style="margin-top: 1rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="margin-bottom: .5rem; ">Cấp vai trò cho {{ $user->name }}</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => url('/insert-role', [$user->id]), 'method' => 'POST']) !!}
                        {{ csrf_field() }}

                        @foreach ($list_role as $key => $list)
                            {!! Form::radio('role', $list->name, optional($all_colum_roles)->id == $list->id) !!}
                            {!! Form::label($list->id, $list->name) !!}
                        @endforeach

                        {!! Form::submit('Cấp vai trò', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
