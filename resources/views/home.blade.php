@extends('adminlte::page')

@section('title', '日報システム｜' . config('app.title_home'))

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop



@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="float-left">日報一覧</h5>
                    @include('post.posts')
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <table class="table responsive nowrap table-sm">
                        <thead>
                            <tr>
                                <th class="text-nowrap">ユーザ</th>
                                <th class="text-nowrap pl-3">部署</th>
                                <th class="text-right text-nowrap">投稿数</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('user.show', $user -> id) }}" class="text-dark text-nowrap">
                                        <img class="user-image" src="{{ asset('img') . '/' . $user -> img }}">
                                        {{ $user -> name }}
                                        </a>
                                    </td>
                                    <td class="">
                                        <span class="small ml-2 text-nowrap">
                                            {{ @$user -> division -> name }}
                                        </span>
                                    </td>
                                    
                                    <td class="text-right">
                                       <span class="small text-nowrap">{{ $user -> posts_count }} 投稿</span> {{-- こっちを使う --}}
                                       {{-- <span class="small text-nowrap">{{ $user -> posts -> count() }} 投稿</span> --}} {{-- model -> count() は使わない --}}
                                       {{-- <span class="small text-nowrap">{{ count(App\Models\Post::where('user_id',$user->id)->get()) }} 投稿</span> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="cart-body p-2 pt-0">
                    <h6 class="p-1">最近のコメント</h6>
                    <table class="table table-sm">
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>
                                    <img src="{{ @$comment -> user -> getImage() }}" class="user-image">
                                </td>
                                <td class="small">
                                    <a class="text-dark d-block" href="{{ route('post.show', $comment -> post_id) }}">{{ $comment -> created_at }}<br>
                                    {{ truncate($comment -> body) }}</a>
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
@stop