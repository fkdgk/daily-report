<table class="table table-sm table-hover">
    <thead>
        <tr>
            <th>ユーザ</th>
            <th>部署</th>
            <th>出社日</th>
            <th>出勤</th>
            <th>退勤</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><img class="user-image" src="{{ asset('img') . '/' . $post -> user -> img }}">{{ $post -> user -> name }}</td>
                <td>{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</td>
                <td>{{ $post -> work_date }}</td>
<<<<<<< HEAD
                <td>{{ ($post -> start_time) ? Carbon\Carbon::parse($post -> start_time)->format('H:i') :null }}</td>
                <td>{{ ($post -> finish_time) ? Carbon\Carbon::parse($post -> finish_time)->format('H:i') :null }}</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{ route('post.show', $post -> id) }}"> 詳細</a>
                </td>
=======
<<<<<<< Updated upstream
                <td>{{ $post -> start_time }}</td>
                <td>{{ $post -> finish_time }}</td>
                <td>{!! ($post -> user_id == Auth::id())? '<a href="'. route('post.edit',$post -> id) .'" class="btn btn-xs btn-primary" >編集</a>' :null !!}</td>
=======
                <td>{{ formatTime($post -> start_time) }}</td>
                <td>{{ formatTime($post -> finish_time) }}</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{ route('post.show', $post -> id) }}"> 詳細</a>
                </td>
>>>>>>> Stashed changes
>>>>>>> 0.9
            </tr>
        @endforeach
    </tbody>
</table>

<div class="p-4">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>