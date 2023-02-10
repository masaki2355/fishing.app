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
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">コメント一覧</th>
                    <th scope="col">ユーザー削除</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>アリア</td>
                    <td>aria</td>
                    <td>コメント内容</td>
                    <td>削除</td>
                </tr>
            </tbody>
        </table>
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
