@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="input-group col-md-4">
            <input type="text" id="txt-search" class="form-control input-group-prepend row justify-content-center" placeholder="キーワードを入力"></input>
            <span class="input-group-btn input-group-append">
                <submit type="submit" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i> 検索</submit>
            </span>
        </div>
    </div>

    <div class="new-post row justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">新規登録</a>
    </div>

    <div class="row justify-content-center">
        <div class="post-area">
            <div class="row justify-content-around pb-10">
                    @foreach($posts as $post)
                    <div class="card mx-3" style="width: 18rem;">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('storage/'.$post['image']) }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"></img>
                        <div class="card-body">
                            <h5 class="card-title">天気：  {{ $post['weather'] }}</h5>
                            <h5 class="card-title">潮汐：  {{ $post['tide'] }}</h5>
                            <h5 class="card-title">釣り場： {{ $post['fishing_spot'] }}</h5>
                            <h5 class="card-title">釣果： </h5>
                            <p class="card-text">{{ $post['post'] }}</p>
                            <a href="{{ route('posts.show',$post['id']) }}" class="btn btn-primary">詳細</a>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>

    <div class="top row justify-content-end">
        <button type="button" class="btn btn-primary">top</button>
    </div>

    <div class="row justify-content-center">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary">1</button>
                <button type="button" class="btn btn-secondary">2</button>
                <button type="button" class="btn btn-secondary">3</button>
                <button type="button" class="btn btn-secondary">4</button>
                <button type="button" class="btn btn-secondary">5</button>
                <button type="button" class="btn btn-secondary">6</button>
                <button type="button" class="btn btn-secondary">7</button>
                <button type="button" class="btn btn-secondary">8</button>
            </div>
        </div>
    </div>

</div>

@endsection
