@extends('layouts.app')

@section('content')
<div class="container">

    <img src="{{ asset('storage/'.$user->icon) }}" class="rounded-circle" width="100" higth="100">


    <div class="card-body row justify-content-center">
        <div class="comment">プロフィール:</div>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>

    <form class="row justify-content-center">
        <div class="form-group  col-md-4">
            <label for="exampleFormControlTextarea1">プロフィール入力欄</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>        
    <a href="{{ route('users.edit',1) }}" class="btn btn-primary" >プロフィール編集</a>

</div>
@endsection
