@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('storage/'.$date -> user()->icon) }}" class="rounded-circle" width="100" higth="100">
    <div class="row justify-content-center">
        <div class="comment-ard">
            <div class="col-md-8">
                <div class="card" style="width: 34rem;">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"  src="{{ asset('storage/'.$date->image) }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"></img>
                    <div class="card-body">
                        <h5 class="card-title">{{ $date->weather }}</h5>
                        <h5 class="card-title">{{ $date->tide }}</h5>
                        <h5 class="card-title">{{ $date->fishing_spot }}</h5>   
                        <h5 class="card-title">
                            @foreach( $fish as $f )
                            <span>
                                {{ $f->fish }}
                            </span>
                            @endforeach
                        </h5>   

                        <p class="card-text">{{ $date->post }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column ">
            <a href="{{ route('posts.edit', $date['id']) }}"><button type='button' class='btn btn-secondary' >編集</button></a>
            <a href="{{ route('post.delete', $date['id']) }}"><button type='button' class='btn btn-danger' >削除</button></a>
        </div>
    </div>

    <div class="ac d-flex flex-column  card-body row col-md-6 ">
        @foreach($comments as $comment)
        <div class="comment">作成日時:{{ $comment['created_at'] }}</div>
        <div class="comment">コメント:{{ $comment['body'] }}</div>
        @endforeach
    </div>

    <form class="row justify-content-center" action="{{ route('ajax.comment')}}" method="post">
        @csrf
        <div class="form-group  col-md-6">
            <label for="body">コメント入力欄</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
            <input type="hidden" id="post_id" name="post_id" value="{{ $date['id'] }}">
            <button type='button' class='btn btn-primary w-25 mt-3 cbtn'>コメント投稿</button>
        </div>
    </form>        

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $('.cbtn').click(function() {
        console.log('a');
        var post_id = $('input[name="post_id"]').val();
        var body = $('#body').val();
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/result/ajax/",
        dataType: "json",
        type: 'POST',
        data: {'body': body,
                'post_id': post_id},
        }).done(function (data) {
                console.log(data);
                var v = $("#body").val("");
                    var html = `
                                <div class="comment">作成日時:${data.comments.created_at}</div>
                                <div class="comment">コメント:${data.comments.body}</div>
                            `;
                    $(".ac").prepend(html);
        }).fail(function (jqXHR, textStatus, errorThrown) {
                //通信が失敗したときの処理
                $('#error_message').empty();
                var text = $.parseJSON(jqXHR.responseText);
                var errors = text.errors;
                for (key in errors) {
                    var errorMessage = errors[key][0];
                    $('#error_message').append(`<li>${errorMessage}</li>`);
                }
        });
    });
</script>
@endsection