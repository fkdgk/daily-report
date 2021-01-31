@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-9">
            <div class="card">
                <div class="card-header">
                    日報
                </div>
                <div class="card-body">
                    @include('post.posts')
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header">
                    ユーザ
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img class="user-image" src="{{ asset('img') . '/' . $user -> img }}">
                                        {{ $user -> name }}
                                        <span class="small ml-2">
                                            {{ ($user -> division) ? $user -> division -> name : null }}
                                        </span>
                                    </td>
                                    
                                    <td>
                                       <span class="small">{{ count(App\Models\Post::where('user_id',$user->id)->get()) }} 投稿</span>
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


@section('css')
<style></style>
@endsection

@section('js')
<script></script>
@endsection