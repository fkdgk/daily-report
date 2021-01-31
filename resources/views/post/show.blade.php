@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-9">
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
                                    {{ $post -> start_time }}
                                </td>
                            </tr>
                            <tr>
                                <th>退勤時刻</th>
                                <td>
                                    {{ $post -> finish_time }}
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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">投稿者</div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img') . '/' . $post -> user -> img }}" class="text-center rounded-circle w-25 h-25" >
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