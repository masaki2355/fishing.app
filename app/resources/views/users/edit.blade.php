@extends('layouts.app')

@section('content')
<div class="container">

    <img src="{{ asset('storage/'.auth::user()->icon) }}" class="rounded-circle" width="100" higth="100">


    <div class="card-body row justify-content-center">
        <div class="comment">プロフィール:</div>
        <p class="card-text"></p>
    </div>
    <div class='panel-body'>
        @if($errors->any())
            <div class='alert alert-danger' >
                <ul>
                    @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form class="row justify-content-center" action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="d-flex flex-column bd-highlight col-mb-3">
            <div class="form-group">
                <label for="exampleFormControlFile1">アイコン編集</label>
                <input type="file" class="form-control-file" name="icon" id="exampleFormControlFile1" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ユーザー名編集欄</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="ユーザー名" value="{{ $user->name }}">
            </div>
            <div class="form-group  col-md-max">
                <label for="exampleFormControlTextarea1">プロフィール編集欄</label>
                <textarea class="form-control" name="profile" id="exampleFormControlTextarea1" rows="3">{{ $user->profile }}</textarea>
            </div>
            <div class="form-group  col-md-max">
                <button type="submit">更新</button>
            </div>
        </div>
    </form>        
</div>
@endsection
