<table class="table table-sm table-hover">
    <thead>
        <tr>
            <th>ユーザ</th>
            <th>部署</th>
            <th>出社日</th>
            <th>出勤</th>
            <th>退勤</th>
            <th>勤務時間</th>
            <th>詳細</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><img class="user-image" src="{{ asset('img') . '/' . $post -> user -> img }}">{{ $post -> user -> name }}</td>
                <td>{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</td>
                <td>{{ $post -> work_date }}</td>
                <td>{{ formatTime($post -> start_time) }}</td>
                <td>{{ formatTime($post -> finish_time) }}</td>
                <td>{{ sumTime($post -> start_time,$post -> finish_time) }}</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{ route('post.show', $post -> id) }}"> 詳細</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="p-4">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>