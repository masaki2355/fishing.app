@extends('layouts.app')

@section('content')
<body class="post_index">
    <div class="container">

        <img src="{{ asset('storage/'.$user->icon) }}" class="rounded-circle" width="100" higth="100">


        <div class="card-body row justify-content-center">
            <div class="comment">ユーザー名:</div>
            <p class="card-text">{{ $user->name }}</p>
        </div>

        <form class="row justify-content-center">
            <div class="form-group  col-md-4">
                <label for="exampleFormControlTextarea1">プロフィール：</label>
                <p class="card-text">{{ $user->profile }}</p>
            </div>
        </form>        
        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary" >プロフィール編集</a>
        
    </div>
</body>
@endsection
<style>
    .post_index{
        background-image: url(https://img.freepik.com/free-photo/wide-angle-shot-of-a-man-fishing-on-the-beach-under-a-clear-blue-sky_181624-10690.jpg?size=626&ext=jpg&ga=GA1.2.46583728.1677444019&semt=sph); 
        background-size: cover;
    }
</style>