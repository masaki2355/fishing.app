@extends('layouts.app')

@section('content')
<div class="container">

    <img src="https://picsum.photos/id/237/540/540" class="rounded-circle" width="100" higth="100">
    <div class="row justify-content-center">
        <div class="comment-ard">
            <div class="col-md-8">
                <div class="card" style="width: 18rem;">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body row justify-content-center">
        <div class="comment">コメント:</div>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>

    <form class="row justify-content-center">
        <div class="form-group  col-md-4">
            <label for="exampleFormControlTextarea1">コメント入力欄</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>        
    <a href="{{ route('posts.index') }}" class="btn btn-primary" >投稿完了</a>

</div>
@endsection
