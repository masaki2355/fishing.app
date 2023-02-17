@extends('layouts.app')

@section('content')
<div class="container">

    <img src="{{ asset('storage/'.$user->icon) }}" class="rounded-circle" width="100" higth="100">


    <div class="card-body row justify-content-center">
        <div class="comment">プロフィール:</div>
        <p class="card-text">{{ $user->name }}</p>
    </div>

    <form class="row justify-content-center">
        <div class="form-group  col-md-4">
            <label for="exampleFormControlTextarea1">プロフィール入力欄</label>
            <p class="card-text">{{ $user->profile }}</p>
        </div>
    </form>        
    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary" >プロフィール編集</a>

</div>
@endsection
