@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ユーザー名</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $date)
                    <tr>
                        <td scope="row"><a href="{{ route('comment.index',$date['id']) }}"><img src="{{ asset('storage/'.$date->icon) }}" class="rounded-circle" width="100" higth="auto"></a></td>
                        <td>{{ $date['name'] }}</td>
                        <td>{{ $date['email'] }}</td>
                        <td><a href="{{ route('user.delete', $date['id']) }}"><button type='button' class='btn btn-danger' onclick="return confirm('削除しますか')">削除</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

