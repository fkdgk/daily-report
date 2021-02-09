@extends('adminlte::page')

@section('title', $post -> user -> name . 'の日報')

@section('content_header')
    {{ Breadcrumbs::render('post.edit', $user, $post) }}
@stop

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($post,['route'=>['post.update',$post -> id],'method'=>'put']) }}
                    
                    @include('post.form',['text'=>'更新'])

                    {{ Form::close() }}

                    {{ Form::open(['route'=>['post.destroy',$post->id],'method'=>'delete','class'=>'delete']) }}
                        {{ Form::submit('削除',['class'=>'btn btn-sm btn-outline-danger float-right']) }}
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