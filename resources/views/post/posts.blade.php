
    <table class="table table-sm table-hover responsive nowrap">
        <thead>
            <tr>
                <th class="text-nowrap">ユーザ</th>
                <th class="text-nowrap">部署</th>
                <th class="text-nowrap">出社日</th>
                <th class="text-nowrap">出勤</th>
                <th class="text-nowrap">退勤</th>
                <th class="text-nowrap">勤務時間</th>
                <th class="text-nowrap">詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="text-nowrap">
                        <a href="{{ route('post.show', $post -> id ) }}" class="text-dark">
                            <img class="user-image" src="{{ asset('img') . '/' . $post -> user -> img }}">{{ $post -> user -> name }}
                        </a>
                    </td>
                    <td class="text-nowrap">
                        <a href="{{ route('post.show', $post -> id ) }}" class="text-dark">
                            {{ ($post -> user -> division)? $post -> user -> division -> name :null }}
                        </a>
                    </td>
                    <td>{{ $post -> work_date }}</td>
                    <td>{{ formatTime($post -> start_time) }}</td>
                    <td>{{ formatTime($post -> finish_time) }}</td>
                    <td>{{ sumTime($post -> start_time,$post -> finish_time) }}</td>
                    <td>
                        <a class="btn btn-xs btn-outline-primary text-nowrap" href="{{ route('post.show', $post -> id) }}"> 詳細</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<div class="p-4">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>