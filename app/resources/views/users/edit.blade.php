@extends('layouts.app')

@section('content')
<div class="container">

    <img src="https://picsum.photos/id/237/540/540" class="rounded-circle" width="100" higth="100">


    <div class="card-body row justify-content-center">
        <div class="comment">プロフィール:</div>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>

    <form class="row justify-content-center">
        <div class="d-flex flex-column bd-highlight col-mb-3">
            <div class="form-group">
                <label for="exampleFormControlFile1">アイコン編集</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ユーザー名編集欄</label>
                <input type="name" class="form-control" id="name" placeholder="ユーザー名">
            </div>
            <div class="form-group  col-md-max">
                <label for="exampleFormControlTextarea1">プロフィール編集欄</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </form>        
    <a href="{{ route('posts.index') }}" class="btn btn-primary" >編集完了</a>

</div>
@endsection
