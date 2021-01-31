@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('post.show', $post) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="btn-group mb-3">
                {!! ($prev)? '<a href="'. route('post.show', $prev) .'" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i> Prev</a>' :null !!}
                {!! ($next)? '<a href="'. route('post.show', $next) .'" class="btn btn-default btn-sm">Next <i class="fa fa-chevron-right"></i></a>' :null !!}
            </div>
            <div>
                @if (Auth::id()==$post->user_id)
                    <a href="{{ route('post.edit', $post -> id) }}" class="btn btn-sm btn-success">編集</a>
                @endif
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-lg-start">
                        <dl class="mr-4 mb-1">
                            <dt>出社日</dt>
                            <dd>{{ $post -> work_date }}</dd>
                        </dl>
                        <dl class="mr-4 mb-1">
                            <dt>出勤</dt>
                            <dd>{{ formatTime($post -> start_time) }}</dd>
                        </dl>
                        <dl class="mr-4 mb-1">
                            <dt>退勤</dt>
                            <dd>{{ formatTime($post -> finish_time) }}</dd>
                        </dl>
                        <dl class="mr-4 mb-1">
                            <dt>勤務時間</dt>
                            <dd>{{ sumTime($post -> start_time,$post -> finish_time) }}</dd>
                        </dl>
                    </div>
                    <div>
                        {{ $post -> body }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">投稿者</div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img') . '/' . $post -> user -> img }}" class="text-center rounded-circle w-25 h-25" >
                        <h5 class="pt-3 mb-1">{{ $post -> user -> name }}</h5>
                        <span class="small">{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
<style>
    table.table tbody th{
        white-space: nowrap;
    }
</style>
@endsection

@section('js')
<script></script>
@endsection