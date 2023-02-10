@extends('layouts.app')

@section('content')
<form class="new-input row justify-content-center">
    <div class="form-group col-md-5">
        <label for="exampleFormControlTextarea1">新規投稿 入力欄</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
</form>
<a href="{{ route('posts.index') }}" class="btn btn-primary">投稿完了</a>

@endsection
