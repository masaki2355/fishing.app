@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">投稿日時</th>
                    <th scope="col">投稿されたコメント</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment['created_at'] }}</td>
                        <td>{{ $comment['body'] }}</td>
                        <td><a href="{{ route('comment.delete', $comment['id']) }}"><button type='button' class='btn btn-danger' onclick="return confirm('削除しますか')" >削除</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

