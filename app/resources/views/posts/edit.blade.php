@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('storage/'.$date -> user()->icon) }}" class="rounded-circle" width="100" higth="100">
    <div class="row justify-content-center">
        <div class="comment-ard">
            <div class="form-group col-md-8">
                <div class="card" style="width: 34rem;">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"  src="{{ asset('storage/'.$date->image) }}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"></img>
                </div>
            </div>
        </div>
    </div>
    

    <form class="row justify-content-center" action="{{ route('posts.update', $date['id']) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group col-md-6 ">
            <div class="form-group col-md-max text-center">
                <label class="form-group" for="weather">天気編集欄</label>
                <input type='text' class='form-control col-xs-4' id="weather" name='weather' value="{{ $date['weather'] }}"/>
            </div>
            <div class="form-group col-md-max text-center">
                <label class="form-group" for="tide">潮汐編集欄</label>
                <input type='text' class='form-control col-xs-4' id="tide" name='tide' value="{{ $date['tide'] }}"/>
            </div>
            <div class="form-group col-md-max text-center" >
                <label class="form-group" for="fishing_spot">釣り場編集欄</label>
                <input type='text' class='form-control col-xs-4' id="fishing_spot" name='fishing_spot' value="{{ $date['fishing_spot'] }}"/>
            </div>
            <div class="my-2" id="input_pluralBox">
                <div id="input_plural">
                    @foreach( $fish as $f )
                    <input type="text" class="form-control my-2" name="fish[]" value="{{ $f['fish'] }}">
                    @endforeach
                </div>
            </div>
            <div class="form-group col-md-max text-center">
                <label class="form-group" for="post">投稿内容編集欄</label>
                <textarea class="form-control" name="post" id="post" rows="3">{{ $date['post'] }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>        

</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).on("click", ".add", function() {
        $(this).parent().clone(true).insertAfter($(this).parent());
    });
    $(document).on("click", ".del", function() {
        var target = $(this).parent();
        if (target.parent().children().length > 1) {
            target.remove();
        }
    });
</script>