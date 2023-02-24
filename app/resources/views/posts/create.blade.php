@extends('layouts.app')

@section('content')
<form class="new-input row justify-content-center" action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group col-md-5">
        <label class="form-group col-md-5" for='weather'>天気</label>
            <input type='text' class='form-control col-xs-4' id="weather" name='weather'/>
        <label class="form-group col-md-5" for='tide'>潮汐</label>
            <input type='text' class='form-control col-xs-4' id="tide" name='tide'/>
        <label class="form-group col-md-5" for='fishing_spot'>釣り場</label>
            <input type='text' class='form-control col-xs-4' id="fishing_spot" name='fishing_spot'/>
        <label class="form-group col-md-5" for='fish'>釣果</label>
            <input type='text' class='form-control col-xs-4' id="fish" name='fish'/>
        <div class="form-group">
            <label for="image">写真</label>
            <input type="file" class="form-control-file" name="image" id="image" >
        </div>
        <label for="post">新規投稿 入力欄</label>
        <textarea class="form-control" id="post" rows="3" name='post'></textarea>
        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
    </div>
</form>
@endsection

