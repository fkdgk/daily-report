@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('post.show', $post) }}
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between mb-3">
            <div class="btn-group">
                {!! ($prev)? '<a href="'. route('post.show', $prev) .'" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i> Prev</a>' :null !!}
                {!! ($next)? '<a href="'. route('post.show', $next) .'" class="btn btn-default btn-sm">Next <i class="fa fa-chevron-right"></i></a>' :null !!}
            </div>
            <div class="d-flex">
                    {{ Form::open(['route'=>['post.copy', $post -> id],'class'=>'copy mr-2']) }}
                        {!! Form::button('<i class="fa fa-clone"></i> 日報を複製',['type'=>'submit','class'=>'btn btn-outline-dark btn-sm']) !!}
                    {{ Form::close() }}
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

                <div class="row mb-2">
                    <dl class="col-lg-2 border-left pl-3">
                        <dt class="">出社日</dt>
                        <dd class=" mb-1">{{$post -> work_date }}</dd>
                    </dl>
                    <dl class="col-lg-2 border-left pl-3">
                        <dt class="">出勤</dt>
                        <dd class=" mb-1">{{formatTime($post -> start_time) }}</dd>
                    </dl>
                    <dl class="col-lg-2 border-left pl-3">
                        <dt class="">退勤</dt>
                        <dd class=" mb-1">{{formatTime($post -> finish_time) }}</dd>
                    </dl>
                    <dl class="col-lg-2 border-left pl-3">
                        <dt class="">勤務時間</dt>
                        <dd class=" mb-1">{{ sumTime($post -> start_time, $post -> finish_time) }}</dd>
                    </dl>
                    <dl class="col-lg-2 border-left pl-3 text-muted small">
                        <dt class="">作成</dt>
                        <dd class=" mb-1">{{$post -> created_at }}</dd>
                    </dl>
                    <dl class="col-lg-2 border-left pl-3 text-muted small">
                        <dt class="">更新</dt>
                        <dd class=" mb-1">{{$post -> updated_at }}</dd>
                    </dl>
                </div>

                <table class="responsive nowrap table table-hover table-sm mb-3 ">
                    <thead>
                        <tr>
                            <th>プロジェクト名</th>
                            <th>作業時間</th>
                            <th>進捗率</th>
                            <th>期限</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($works as $work)
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
                    @empty
                    <tr>
                        <td colspan="4" class="text-center pt-4 pb-3 text-muted"> 作業したプロジェクトはありません </td>
                    </tr>  
                    @endforelse
                    </tbody>
                </table>


                <hr class="mt-0 mb-4">
                <span class="text-bold d-block mb-1">作業内容</span>
                <div>
                    {!! nl2br(e($post -> body)) !!}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">コメント</div>
            <div class="card-body pl-4">
                @forelse ($comments as $comment)
                    <div class="row" id="a{{ $comment -> id }}">
                        <div class="col-sm-2">
                            <a href="{{ route('user.show', @$comment -> user -> id) }}" class="text-dark">
                                <img src="{{ @$comment -> user -> getImage()  }}" class="user-image user-image-m">
                                <span class="d-block small mt-1">
                                    {{ @$comment -> user -> name }}
                                </span>
                                <span class="text-muted small d-block">
                                    {{ $comment -> created_at }}
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-10 pt-2">
                            {!! nl2br(e($comment -> body)) !!}
                        </div>
                        
                    </div>
                    <hr>
                    @empty
                     <p class="small text-muted">コメントはありません</p>
                    @endforelse
                    {{ Form::open(['route'=>['comment.store',$post -> id],'id'=>'comment']) }}
                        {{ Form::textarea('body',null,
                            [
                                'class'=>'form-control' . ($errors->has('body') ? ' is-invalid' : null) ,
                                'required'=>true,
                                'rows'=>5,
                            ])
                        }}
                        <span class="invalid-feedback">{{ $errors -> first('body') }}</span>
                        {{ Form::hidden('user_id',Auth::id()) }}
                        {{ Form::hidden('post_id',$post -> id) }}
                        <div class="mt-2">
                            {{-- <img src="{{ asset('img'.'/'.Auth::user()->img) }}" class="user-image user-image-m mr-1"> --}}
                            {{-- <img src="{{ asset('img'.'/'.Auth::user()->img) }}" class="user-image user-image-m mr-1"> --}}
                            {{ Form::submit('コメントを投稿',['class'=>'btn btn-success mt-2']) }}
                        </div>
                   {{ Form::close() }}
            </div>
        </div>
        
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header">投稿者</div>
            <div class="card-body">
                <div class="text-center">
                    <a href="{{ route('user.show', $post -> user_id) }}" class="text-dark">
                        <img src="{{ @$post -> user -> getImage() }}" class="text-center rounded-circle w-25 h-25" >
                        {{-- <img src="{{ asset('img') . '/' . $post -> user -> img }}" class="text-center rounded-circle w-25 h-25" > --}}
                        <h5 class="pt-3 mb-1">{{ @$post -> user -> name }}</h5>
                        <span class="small">{{ @$post -> user -> division -> name }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
@endsection

@section('js')
<script>
    @if ($errors->has('body'))
        toastr.error('コメントが空です', 'Error!!');
        document.getElementById("comment").scrollIntoView();
    @endif
</script>
@endsection