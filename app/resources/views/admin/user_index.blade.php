@extends('layouts.app')

@section('content')
<form method="GET" action="{{ route('user.index') }}">
    <div class="row justify-content-center">
        <div class="input-group col-md-4">
            <input type="text"name="keyword" id="txt-search" class="form-control input-group-prepend row justify-content-center" placeholder="ユーザー名を入力" value="{{ $search }}"></input>
            <span class="input-group-btn input-group-append">
                <button type="submit" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i> 検索</button>
            </span>
        </div>
    </div>
</form>

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

