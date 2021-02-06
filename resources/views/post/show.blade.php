@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('post.show', $post) }}
@stop

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table id="example" class="responsive nowrap table table-hover">
                    <thead>
                        <tr>
                            <th>プロジェクト名</th>
                            <th>作業時間</th>
                            <th>進捗率</th>
                            <th>期限</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $work -> project -> name}}</td>
                            <td>{{ formatTime($work -> work_time)}}</td>
                            <td>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: {{ $work -> progress }}%;" aria-valuenow="{{ $work -> progress }}" aria-valuemin="0" aria-valuemax="100">{{ $work -> progress }}%</div>
                                </div>
                            </td>
                            <td>{{ $work -> limit }}</td>
                        </tr>    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between">
            <div class="btn-group mb-3">
                {!! ($prev)? '<a href="'. route('post.show', $prev) .'" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i> Prev</a>' :null !!}
                {!! ($next)? '<a href="'. route('post.show', $next) .'" class="btn btn-default btn-sm">Next <i class="fa fa-chevron-right"></i></a>' :null !!}
            </div>
            <div>
                {{-- @if (Auth::id()==$post->user_id) --}}
                    <a href="{{ route('post.edit', $post -> id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i> 日報を編集</a> 
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-lg-between">
                    <div class="d-flex">
                        <dl class="mr-4 mb-1">
                            <dt class=" text-center">出社日</dt>
                            <dd class=" text-center">{{ $post -> work_date }}</dd>
                        </dl>
                        <dl class="mr-4 mb-1">
                            <dt class=" text-center">出勤</dt>
                            <dd class=" text-center">{{ formatTime($post -> start_time) }}</dd>
                        </dl>
                        <dl class="mr-4 mb-1">
                            <dt class=" text-center">退勤</dt>
                            <dd class=" text-center">{{ formatTime($post -> finish_time) }}</dd>
                        </dl>
                        <dl class="mr-4 mb-1">
                            <dt class=" text-center">勤務時間</dt>
                            <dd class=" text-center">{{ sumTime($post -> start_time, $post -> finish_time) }}</dd>
                        </dl>
                    </div>
                    <div class="">
                        <dl class="mb-0 text-muted small">
                            <dt class="d-inline mr-2 ">作成</dt>
                            <dd class="d-inline">{{ $post -> created_at }}</dd>
                        </dl>
                        <dl class="mb-0 text-muted small">
                            <dt class="d-inline mr-2 ">更新</dt>
                            <dd class="d-inline">{{ $post -> updated_at }}</dd>
                        </dl>
                    </div>
                </div>
                <hr class="mt-0 mb-3">
                <table class="table table-sm mb-3">
                    <thead>
                        <tr>
                            <th>プロジェクト名</th>
                            <th>作業時間</th>
                            <th>進捗率</th>
                            <th>期限</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $work -> project -> name}}</td>
                            <td>{{ formatTime($work -> work_time)}}</td>
                            <td>
                                <div class="progress">
                                  <div class="progress-bar" role="progressbar" style="width: {{ $work -> progress }}%;" aria-valuenow="{{ $work -> progress }}" aria-valuemin="0" aria-valuemax="100">{{ $work -> progress }}%</div>
                                </div>
                            </td>
                            <td>{{ $work -> limit }}</td>
                        </tr>    
                    @endforeach
                    </tbody>
                </table>


                <hr class="mt-0 mb-4">
                <span class="text-bold d-block mb-1">作業内容</span>
                <div>
                    {{ $post -> body }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">コメント</div>
            <div class="card-body pl-4">
                @foreach ($comments as $comment)
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="{{ route('user.show', $comment -> user -> id) }}" class="text-dark">
                                <img src="{{ asset('img'). '/' . $comment -> user -> img  }}" class="user-image user-image-m">
                                <span class="d-block small mt-1">
                                    {{ $comment -> user -> name }}
                                </span>
                                <span class="text-muted small d-block">
                                    {{ $comment -> created_at }}
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-10 small pt-2">
                            {{ $comment -> body }}
                        </div>
                        
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">投稿者</div>
            <div class="card-body">
                <div class="text-center">
                    <a href="{{ route('user.show', $post -> user_id) }}" class="text-dark">
                        <img src="{{ asset('img') . '/' . $post -> user -> img }}" class="text-center rounded-circle w-25 h-25" >
                        <h5 class="pt-3 mb-1">{{ $post -> user -> name }}</h5>
                        <span class="small">{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</span>
                    </a>
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
<script>
$('#example').DataTable( {
    "responsive":true,
    "searching": false,
    "sort": false,
    "info": false,
    "paging": false,
    "order": [],
} );

</script>
@endsection