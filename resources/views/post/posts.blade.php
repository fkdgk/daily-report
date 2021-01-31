<table class="table table-sm">
    <thead>
        <tr>
            <th>ユーザ</th>
            <th>部署</th>
            <th>出社日</th>
            <th>出勤</th>
            <th>退勤</th>
            <th>編集</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><img class="user-image" src="{{ asset('img') . '/' . $post -> user -> img }}">{{ $post -> user -> name }}</td>
                <td>{{ ($post -> user -> division)? $post -> user -> division -> name :null }}</td>
                <td>{{ $post -> work_date }}</td>
                <td>{{ $post -> start_time }}</td>
                <td>{{ $post -> finish_time }}</td>
                <td>{!! ($post -> user_id == Auth::id())? '<a href="'. route('post.edit',$post -> id) .'" class="btn btn-xs btn-outline-primary" ><i class="fa fa-edit"></i> 編集</a>' :null !!}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="p-4">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>