@extends('adminlte::page')

@section('title', '新規作成')

@section('content_header')
    {{ Breadcrumbs::render('post.create', $user) }}
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route'=>'post.store']) }}
                        @include('post.form',['text'=>'新規作成'])
                    {{ Form::close() }}
                    @include('post.repeat')
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    @include('post.form-script')
@endsection