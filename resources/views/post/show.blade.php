@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
<<<<<<< HEAD
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-9">
=======
    {{ Breadcrumbs::render('post.show', $post) }}
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="btn-group mb-3">
            {!! ($prev)? '<a href="'. route('post.show', $prev) .'" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i> Prev</a>' :null !!}
            {!! ($next)? '<a href="'. route('post.show', $next) .'" class="btn btn-default btn-sm">Next <i class="fa fa-chevron-right"></i></a>' :null !!}
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-xl-9">
>>>>>>> 0.9
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th>出社日</th>
                                <td>
                                    {{ $post -> work_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>出勤時刻</th>
                                <td>
                                    {{ ($post -> start_time)? Carbon\Carbon::parse($post -> start_time)->format('H:i') :null }}
                                </td>
                            </tr>
                            <tr>
                                <th>退勤時刻</th>
                                <td>
                                    {{ ($post -> finish_time)? Carbon\Carbon::parse($post -> finish_time)->format('H:i') :null }}
                                </td>
                            </tr>
                            <tr>
                                <th>内容</th>
                                <td>
                                    {{ $post -> body }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <div class="col-lg-3">
=======
        <div class="col-xl-3">
>>>>>>> 0.9
            <div class="card">
                <div class="card-header">投稿者</div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img') . '/' . $post -> user -> img }}" class="text-center rounded-circle w-25 h-25" >
                        <h5 class="pt-3 mb-1">{{ $post -> user -> name }}</h5>
<<<<<<< HEAD
                        <span>{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</span>
=======
                        <span class="small">{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</span>
>>>>>>> 0.9
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