@extends('layouts.app')

@section('content')
<body class="post_index">
    

    <div class="container ">
        <form method="GET" action="{{ route('posts.index') }}">
            <div class="row justify-content-center">
                <div class="input-group col-md-4">
                    <input type="text" name="keyword" id="txt-search" class="form-control input-group-prepend row justify-content-center" placeholder="天気か釣り場で検索"></input>
                    <span class="input-group-btn input-group-append">
                        <button type="submit" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i> 検索</button>
                    </span>
                </div>
            </div>
        </form>

        <div class="new-post row justify-content-end">
            <a href="{{ route('posts.create') }}" class="btn btn-success">新規登録</a>
        </div>

        <div class="row justify-content-center">
            <div class="post-area">
                <div class="row justify-content-left pb-10">
                        @foreach($posts as $post)
                        <div class="card m-5" style="width: 18rem;">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="180" src="{{ asset('storage/'.$post['image']) }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"></img>
                            <div class="card-body">
                                <h5 class="card-title">天気：  {{ $post['weather'] }}</h5>
                                <h5 class="card-title">潮汐：  {{ $post['tide'] }}</h5>
                                <h5 class="card-title">釣り場： {{ $post['fishing_spot'] }}</h5>
                                <h5 class="card-title">釣果：@foreach( $fishes as $fish )
                                    @if($fish->post_id == $post->id)
                                    <span>
                                        {{ $fish->fish }}
                                    </span>
                                    @endif
                                    @endforeach
                                </h5>
                                <p class="card-text">{{ $post['post'] }}</p>
                                <a href="{{ route('posts.show',$post['id']) }}" class="btn btn-warning">詳細</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>


    </div>
</body>
@endsection

<style>
    .post_index{
        background-image: url(https://img.freepik.com/free-photo/fishing-tackle-fishing-spinning-fishing-line-hooks-and-lures-on-wooden-background_639032-1829.jpg?size=626&ext=jpg&ga=GA1.2.46583728.1677444019&semt=sph); 
        background-size: cover;
    }
</style>