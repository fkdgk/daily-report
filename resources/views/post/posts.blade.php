<table class="table table-sm">
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><img width="20" height="20" src="{{ asset('img') . '/' . $post -> user -> img }}"></td>
                <td>{{ $post -> user -> name }}</td>
                <td>{{ $post -> work_date }}</td>
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
            </tr>
        @endforeach
    </tbody>
</table>

<div class="p-4">
    {{ $posts->links('pagination::bootstrap-4') }}
</div>