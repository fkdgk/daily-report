@extends('adminlte::page')

@section('title', '日報システム｜TOP')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
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
                                            {{ ($user -> division) ? $user -> division -> name : null }}
                                        </span>
                                    </td>
                                    
                                    <td class="text-right">
                                       <span class="small text-nowrap">{{ count(App\Models\Post::where('user_id',$user->id)->get()) }} 投稿</span>
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
<script>
</script>
@endsection